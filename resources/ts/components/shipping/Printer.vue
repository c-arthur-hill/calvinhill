<script setup lang="ts">

const props = defineProps(['modelValue', 'installedPrinters']);
defineEmits(['update:modelValue']);
</script>

<template>
  <label for="printerSelect" class="form-label">Shipping Label Printer</label>
  <select id="printerSelect" class="form-select form-select-sm rounded-0" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)">
    <option class="form-control-sm" :value="null" disabled selected hidden>Download</option>
    <option v-for="(installedPrinter, index) in installedPrinters" :value="index">
      {{ installedPrinter.name }}
    </option>
  </select>
</template>