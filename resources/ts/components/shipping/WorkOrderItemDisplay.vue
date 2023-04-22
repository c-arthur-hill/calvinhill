<script setup lang="ts">
import {shipStore} from "../../stores/ship-station";
import {computed} from "vue";

const props = defineProps(['workOrder', 'workOrderItem']);
const cardClassObject = computed(() => ({
  'border border-secondary': props.workOrderItem.id in shipStore.scannedItems,
}));
const cardHeaderClassObject = computed(() => ({
  'border-bottom border-secondary': props.workOrderItem.id in shipStore.scannedItems,
}));
</script>

<template>
    <div class="card rounded-0 bg-light" :class="cardClassObject">
      <div class="card-header text-center rounded-0" :class="cardHeaderClassObject">
        <b>{{ workOrderItem.id }}</b>
      </div>
      <div class="card-img text-center p-3">
        <img :src="workOrder.media.thumbnailUrl" class="img-fluid"/>
      </div>
      <div class="card-body">
        <p class="text-center text-capitalize">{{ workOrderItem.workflowState }}</p>
      </div>
    </div>
</template>