import { reactive } from 'vue';
import {InstalledPrinter} from "jsprintmanager";

interface User {
    id: number,
    name: string,
}

interface Media {
    id: number
    originalUrl: string
    thumbnailUrl: string
}

interface ManufacturerProduct {
    id: number
    name: string
}

interface ManufacturerProductVariation {
    manufacturerProduct: ManufacturerProduct
    size: string // this should be an enum
    color: string // this should be an enum
}

interface WorkOrderItem {
    id: number
    workflowState: string // this should be an enum
    workOrder: WorkOrder

}
interface WorkOrder {
    id: number
    workOrderItems: WorkOrderItem[]
    workflowState: string // this should be an enum
    fromFirstName: string
    fromLastName: string
    fromAddress1: string
    fromAddress2: string
    fromCity: string
    fromZip: string
    fromState: string
    toFirstName: string
    toLastName: string
    toAddress1: string
    toAddress2: string
    toCity: string
    toZip: string
    toState: string
    manufacturerProductVariation: ManufacturerProductVariation
    media: Media
    merchant: User
    requestedShippingMethod: int // some type of enum
}

interface CustomerOrder {
    id: number,
    workOrders: WorkOrder[]
}

interface Package {
    id: number
    customerOrder: CustomerOrder
    trackingNumber: string
    deletedAt: bigint | null
}



interface Store {
    errors: string[],
    currentScan: string,
    lastScan: string
    customerOrder: CustomerOrder | null
    scannedItems: number[]
    installedPrinters: InstalledPrinter[]
    selectedPrinterIndex: number | null // defaults to download
    state: string
}



export const shipStore: Store = reactive({
    error: "",
    currentScan: "1",
    lastScan: "",
    customerOrder: null,
    scannedItems: {},
    installedPrinters: [],
    selectedPrinterIndex: null,
    packages: [],
    state: '',
});


