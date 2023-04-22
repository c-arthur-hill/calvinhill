<script setup lang="ts">
import Printer from './Printer.vue';
import CustomerOrderDisplay from './CustomerOrderDisplay.vue';
import {shipStore} from "@/stores/ship-station";
import {useMachine} from "@xstate/vue";
import {shipMachine} from "../../machines/ship-station";
import {computed, onMounted, ref, toRefs} from "vue";
import * as constants from "@/constants/ship-station";

const { state, send } = useMachine(shipMachine, {context: toRefs(shipStore)});

const scan = ref(null);

onMounted(() => {
  send(constants.START_JSPM_EVENT);
  scan.value.focus();
})
function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

const stateMessage = computed(() => {
  return capitalizeFirstLetter(state.value.value.replace('_', ' '));
})

function handleScanSubmit() {
  send(constants.WOI_SCAN_EVENT);
  scan.value.focus();
}

</script>

<template>
  <div class="bg-light border p-5">
    <div class="row">
      <div class="col-12">
        <h3>Shipping station</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p class="text-secondary">{{ stateMessage }}</p>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-4">
        <Printer :installed-printers="shipStore.installedPrinters" v-model="shipStore.selectedPrinterIndex"></Printer>
      </div>
      <div class="col-lg-8">
          <label for="lastScan" class="form-label">Work Order Item Scan</label>
          <div class="input-group input-group-sm">
            <input id="lastScan" ref="scan" class="form-control form-control-sm rounded-0 " v-model="shipStore.currentScan" />
            <button class="btn btn-sm btn-secondary rounded-0" @click="handleScanSubmit">Submit</button>
          </div>
      </div>
    </div>
    <hr>
    <div class="row ">
      <div class="col-12">
        <CustomerOrderDisplay></CustomerOrderDisplay>
      </div>
    </div>

  </div>
</template>