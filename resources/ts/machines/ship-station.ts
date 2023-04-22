import { createMachine, assign } from 'xstate';
import * as constants from "../constants/ship-station";
import useGet from "../composables/get";
import { useJSPM } from "../composables/jspm";
import {ref, toRaw, toRef, toRefs, unref} from "vue";
import useScreenShot from "../composables/screenshot";

const {startJSPM, checkJSPM, getInstalledPrinters, printImageBase64, printImageBlob} = useJSPM();
const printOrDownload = (imageFile, context, imageType) => {
    if (context.selectedPrinterIndex.value) {
        const printers = context.installedPrinters.value;
        const printerIndex = context.selectedPrinterIndex.value;
        if (imageType == constants.BLOB) {
            printImageBlob(imageFile, toRaw(printers[printerIndex]));
        }
        if (imageType == constants.BASE_64) {
            printImageBase64(imageFile, toRaw(printers[printerIndex]));
        }
    } else {
        let a = document.createElement("a"),
            url = URL.createObjectURL(imageFile);
        a.href = url;
        a.download = imageFile.name;
        document.body.appendChild(a);
        a.click();
        setTimeout(function() {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        }, 0);
    }

}


export const shipMachine = createMachine(
    {
        predictableActionArguments: true,
        initial: [constants.NO_JSPM_STATE],
        context: {},
        states: {
            [constants.NO_JSPM_STATE]: {
                on: {
                    [constants.START_JSPM_EVENT]: {
                        target: constants.STARTING_JSPM_STATE
                    }
                }
            },
            [constants.STARTING_JSPM_STATE]: {
                invoke: {
                    src: (context, event) => startJSPM(),
                    onDone: {
                        target:constants.CHECKING_JSPM_STATE
                    },
                    onError: {
                        target: constants.ERROR_STATE,
                        actions: [constants.SET_ERROR]
                    }
                }
            },
            [constants.CHECKING_JSPM_STATE]: {
                always: [
                    {
                        cond: constants.JSPM_OPEN,
                        target: constants.INSTALLING_PRINTERS_STATE,
                    },
                    {
                        target: constants.WAITING_STATE
                    }
                ]
            },
            [constants.INSTALLING_PRINTERS_STATE]: {
                invoke: {
                    src: (context, event) => getInstalledPrinters(),
                    onDone: {
                        target: constants.WAITING_STATE,
                        actions: constants.SET_INSTALLED_PRINTERS
                    },
                    onError: {
                        target: constants.ERROR_STATE,
                        actions: [constants.SET_ERROR]
                    }
                }
            },
            [constants.WAITING_STATE]: {
               on: {
                   [constants.WOI_SCAN_EVENT]: {
                       target: constants.LOADING_STATE,
                       actions: [constants.SET_LAST_SCAN]

                   }
               }
            },
            [constants.LOADING_STATE]: {
                invoke: {
                    src: (context, event) => useGet('/customerOrder', {'workOrderItem': context.lastScan.value}),
                    onDone: {
                        target: constants.CHECKING_SCAN_STATE,
                        actions: [constants.SET_CUSTOMER_ORDER],
                    },
                    onError: {
                        target: constants.ERROR_STATE,
                        actions: [constants.SET_ERROR]
                    }
                },
            },
            [constants.SCANNING_STATE]: {
                on: {
                    [constants.WOI_SCAN_EVENT]: {
                        target: constants.CHECKING_SCAN_STATE,
                        actions: [constants.SET_LAST_SCAN],
                    },
                    [constants.CANCEL_EVENT]: {
                        target: [constants.WAITING_STATE],
                        actions: [] // reset
                    }
                },
            },
            [constants.CHECKING_SCAN_STATE]: {
                always: [
                    {
                        cond: constants.WOI_FOUND,
                        target: constants.CHECKING_ALL_SCANNED_STATE,
                        actions: [constants.ADD_SCANNED_ITEM]
                    },
                    {
                        target: constants.ERROR_STATE,
                        actions: [constants.SET_ERROR]
                    }
                ]
            },
            [constants.CHECKING_ALL_SCANNED_STATE]: {
                always: [
                    {
                        cond: constants.ALL_WOI_SCANNED,
                        target: constants.FETCHING_LABEL_STATE,
                    },
                    {
                        target: constants.SCANNING_STATE
                    }
                ]

            },
            [constants.FETCHING_LABEL_STATE]: {
                invoke: {
                    src: (context, event) =>  useGet('https://bucketeer-a75cc2de-3623-44af-95fe-68274d8a91cd.s3.amazonaws.com/img/usps.png'),
                    onDone: {
                        target: constants.FETCHING_PACKING_SLIP_STATE,
                        actions: [constants.PRINT_LABEL]
                    },
                    onError: {
                        target: constants.FETCHING_PACKING_SLIP_STATE,
                        actions: [constants.SET_ERROR]
                    }
                },
            },
            [constants.FETCHING_PACKING_SLIP_STATE]: {
                invoke: {
                    src: (context, event) =>  useScreenShot('/packing_slip', '#slip'),
                    onDone: {
                        target: constants.WAITING_STATE,
                        actions: [constants.PRINT_PACKING_SLIP, constants.RESET]
                    },
                    onError: {
                        target: constants.WAITING_STATE,
                        actions: [constants.SET_ERROR]
                    }
                },

            },
            [constants.ERROR_STATE]: {
                on: {
                    [constants.WOI_SCAN_EVENT]: {
                        target: constants.CHECKING_SCAN_STATE,
                        actions: [constants.SET_LAST_SCAN],
                    },
                    [constants.CANCEL_EVENT]: {
                        target: [constants.WAITING_STATE],
                        actions: [constants.RESET]
                    }
                },

            }
        },
    },
    {
        guards: {
            [constants.JSPM_OPEN]: (context, event) => {
                return checkJSPM();
            },
            [constants.ALL_WOI_SCANNED]: (context, event) => {
                const workOrders = context.customerOrder.value.workOrders;
                for (let wo_index in workOrders) {
                    for (let woi_index in workOrders[wo_index].workOrderItems) {
                        const woi_id = workOrders[wo_index].workOrderItems[woi_index].id;
                        if (context.scannedItems.value[woi_id] === undefined) {
                            return false;
                        }

                    }
                }
                return true;
            },
            [constants.WOI_FOUND]: (context, event) => {
                const workOrders = context.customerOrder.value.workOrders;
                for (let wo_index in workOrders) {
                    for (let woi_index in workOrders[wo_index].workOrderItems) {
                        if (workOrders[wo_index].workOrderItems[woi_index].id === context.lastScan.value) {
                            return true;
                        }
                    }
                }
                return false;
            },
        },
        actions: {
            [constants.SET_ERROR]: (context, event) => {
                context.error.value = event.error;
            },
            [constants.SET_INSTALLED_PRINTERS]: (context, event) => {
                context.installedPrinters.value = event.data;
            },
            [constants.SET_LAST_SCAN]: (context, event) => {
                context.lastScan.value = parseInt(context.currentScan.value);
                context.currentScan.value = '';
            },
            [constants.SET_CUSTOMER_ORDER]: (context, event) => {
                context.customerOrder.value = JSON.parse(event.data);
            },
            [constants.ADD_SCANNED_ITEM]: (context,event) => {
                const lastScanValue = context.lastScan.value;
                context.scannedItems.value[lastScanValue] = true;
            },
            [constants.PRINT_LABEL]: (context, event) => {
                event.data.blob()
                    .then(blob => {
                        return new File([blob], 'Label.png');
                    })
                    .then(file => {
                        printOrDownload(file, context, constants.BASE_64)
                    })
            },
            [constants.PRINT_PACKING_SLIP]: (context, event) => {
                fetch(event.data)
                    .then(res => res.arrayBuffer())
                    .then(buf => new File([buf], 'Packing.png', {type: 'application/png' }))
                    .then(file => {printOrDownload(file, context, constants.BASE_64)})
            },
            [constants.RESET] : (context, event) => {
                context.scannedItems.value = {};
                context.customerOrder.value = null;
                context.packages.value = [];
                context.currentScan.value = "";
                context.lastScan.value = "";
                context.error.value = "";
            }
        },
    }
);