import {
    JSPrintManager as JSPM,
    WSStatus,
    FileSourceType,
    ClientPrintJob,
    PrintFile,
    InstalledPrinter
} from "jsprintmanager";

export function useJSPM () {
    const startJSPM = () =>  {
        //JSPM.auto_reconnect = true;
        return new Promise((resolve, reject) => {
            try {
                let a = JSPM.start();
                JSPM.WS.onError = () => {reject('Unable to open socket');};
                return a.then(resolve).catch(reject);
            } catch (e) {
                reject('Unable to open socket caught');
            }
        })
    }

    const checkJSPM = () => {
        return new Promise<string>((resolve, reject) => {
            if (JSPM.websocket_status == WSStatus.Open) {
                resolve('');
            } else if (JSPM.websocket_status == WSStatus.Closed) {
                reject('JS Print Manager is not installed or not running');
            } else if (JSPM.websocket_status == WSStatus.Blocked) {
                reject('JS Print Manager has blocked this website');
            }
        });
    }

    const getInstalledPrinters = () => {
        return JSPM.getPrintersInfo()
    }

    const printImage = (image, printer, img_type) => {
        let cpj = new ClientPrintJob();
        cpj.clientPrinter = new InstalledPrinter(printer.name);
        let print_file = new PrintFile(image, img_type, image.name, 1);
        cpj.files.push(print_file);
        cpj.sendToClient();
    }
    const printImageBlob = (image, printer, img_type = FileSourceType.BLOB) => {
        printImage(image, printer, img_type);
    }

    const printImageBase64 = (image, printer, img_type = FileSourceType.Base64) => {
        printImage(image, printer, img_type);
    }

    return {
        startJSPM,
        checkJSPM,
        getInstalledPrinters,
        printImageBlob,
        printImageBase64
    };
}

