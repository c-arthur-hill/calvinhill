// states
export const NO_JSPM_STATE = 'no_jspm';
export const STARTING_JSPM_STATE = 'starting_jspm';
export const CHECKING_JSPM_STATE = 'checking_jspm';
export const INSTALLING_PRINTERS_STATE = 'installing_printers'
export const WAITING_STATE = 'waiting';
export const LOADING_STATE = 'loading';
export const SCANNING_STATE = 'scanning';
export const CHECKING_SCAN_STATE = 'checking_scan';
export const CHECKING_ALL_SCANNED_STATE = 'checking_all_scanned';
export const FETCHING_LABEL_STATE = 'fetching_label';
export const FETCHING_PACKING_SLIP_STATE = 'fetching_packing_slip';
export const PRINTING_PACKING_SLIP_STATE = 'printing_packing_slip';
export const ERROR_STATE = 'error';

// events
export const START_JSPM_EVENT = 'start_jspm';
export const CANCEL_EVENT = 'cancel';
export const WOI_SCAN_EVENT = 'woi_scan';

// conditions
export const JSPM_OPEN = 'jspmOpen';
export const WOI_FOUND = 'woiFound';
export const ALL_WOI_SCANNED = 'allWoiScanned';

// actions
export const SET_ERROR = 'setError';
export const SET_INSTALLED_PRINTERS = 'setInstalledPrinters';
export const SET_LAST_SCAN = 'setLastScan';
export const SET_CUSTOMER_ORDER = 'setCustomerOrder';
export const ADD_SCANNED_ITEM = 'addScannedItem';
export const PRINT_LABEL = 'printLabel';
export const PRINT_PACKING_SLIP = 'printPackingSlip';
export const RESET = 'reset';

// JSPM file types. Keeping them different than their constants for decoupling
export const BLOB = 0;
export const BASE_64 = 1;