<script setup lang="ts">
import {shipStore} from "../../stores/ship-station";
import WorkOrderItemDisplay from "./WorkOrderItemDisplay.vue";

</script>

<template>
  <template v-if="shipStore.customerOrder">
    <div class="card-group">

      <template v-for="workOrder in shipStore.customerOrder.workOrders">
          <WorkOrderItemDisplay v-for="workOrderItem in workOrder.workOrderItems" :work-order="workOrder" :work-order-item="workOrderItem"></WorkOrderItemDisplay>
      </template>
    </div>
  </template>
</template>
