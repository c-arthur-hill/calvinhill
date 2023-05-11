<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calvin Hill</title><link rel="icon" type="image/x-icon" href="{{ Storage::disk('s3')->url('img/logo.ico') }}" >
    @vite(['resources/css/app.css'])
    @vite(['resources/ts/pages/shipment.ts'])
</head>
<body class="p-3 p-lg-0">
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <nav class="navbar navbar-expand">
                <a class="navbar-brand" href="/">
                    <img src="{{ Storage::disk('s3')->url('img/logo.svg') }}"  height="24" class="d-inline-block align-text-top">
                    Calvin Hill
                </a>
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}" >
                            About
                        </a>
                    </li><li class="nav-item"><a class="nav-link " href="{{ url('articles') }}" >Articles</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="min-vh-100">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-10 offset-lg-1">
                <div id="vue-app"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-5 mx-auto">
                <h3>Shipping shirts slowly</h3>
                <p>I was doing work for an apparel printer. Customers submit pictures and illustrations through an API. The facility prints them onto T-shirts.</p>
                <p>The last step is shipping the finished product.</p>
                <p>Employees clicked through several forms to print a packing slip and shipping label. That was slow.</p>
                <h3>Then faster</h3>
                <p>I implemented the solution above.</p>
                <p>An employee installs a third-party library, <a href="https://www.neodynamic.com/downloads/jspm" target="_blank">JSPM</a>. It prints files automatically. Otherwise the files download.</p>
                <p>The employee scans a barcode on the first shirt to bring up the items in the order.</p>
                <p>Each scan highlights that item with a gray border. When they scan the last item, the shipping label and packing slip print. The real system purchases the cheapest label from UPS, FedEx, DHL, etc. Here I'm using an example label.</p>
                <p>Once everything prints, the employee boxes the shirts. They attach the label. They scan the next order.</p>
                <p class="mt-5 mb-5 clearfix">
                    <span class="float-end">
                        <a href="{{ route('media.index') }}" class="">Next<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                    </span>
                </p>
                <h3 class="">With a unique frontend</h3>
                <h5>Laravel</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <p>Your browser requested this page. <a target="_blank" href="https://laravel.com/docs/10.x/routing">Laravel</a> returned a response from a template.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/routes/web.php">/routes/web.php</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">  19</span>  Route::get(<mark>'/'</mark>, function () {
<span class="text-secondary">  20</span>      return view(<mark>'shipment.create'</mark>);
<span class="text-secondary">  21</span>  })->name('shipment');</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/resources/views/shipment/create.blade.php">/resources/views/shipment/create.blade.php</a>
                    </div>
                    <div class="card-body">
<pre><code><span class="text-secondary">   8</span>  @verbatim<mark>@vite(['resources/ts/pages/shipment.ts'])</mark> @endverbatim
<span class="text-secondary"> ...</span>
<span class="text-secondary">  62</span>  &lt;div <mark>id="vue-app"</mark>>&lt;/div>
<span class="text-secondary"> ...</span>
<span class="text-secondary"> 125</span>  This is line 125</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <h5>Vite</h5>
                <p><a target="_blank" href="https://vitejs.dev/guide/">Vite</a> bundles the Vue application. It transforms the TypeScript files and Vue components into one JavaScript file.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/vite.config.js">/vite.config.js</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   1</span>  import { defineConfig } from 'vite';
<span class="text-secondary">   2</span>  import laravel from 'laravel-vite-plugin';
<span class="text-secondary">   3</span>  import vue from '@vitejs/plugin-vue';
<span class="text-secondary">   4</span>
<span class="text-secondary">   5</span>  export default defineConfig({
<span class="text-secondary">   6</span>      plugins: [
<span class="text-secondary">   7</span>          laravel({
<span class="text-secondary">   8</span>              input: [
<span class="text-secondary">   9</span>                  'resources/css/app.css',
<span class="text-secondary">  10</span>                  'resources/ts/bootstrap.ts',
<span class="text-secondary">  11</span>                  <mark>'resources/ts/pages/shipment.ts',</mark>
<span class="text-secondary">  12</span>              ],
<span class="text-secondary">  13</span>              refresh: true,
<span class="text-secondary">  14</span>          }),
<span class="text-secondary">  15</span>          vue({
<span class="text-secondary">  16</span>              template: {
<span class="text-secondary">  17</span>                  transformAssetUrls: {
<span class="text-secondary">  18</span>                      base: null,
<span class="text-secondary">  19</span>                      includeAbsolute: false,
<span class="text-secondary">  20</span>                  }
<span class="text-secondary">  21</span>              }
<span class="text-secondary">  22</span>          })
<span class="text-secondary">  23</span>      ],
<span class="text-secondary"> ...</span></code></pre>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <h5>Vue</h5>
                <p>Vue mounts the ShipStation component to the "#vue-app" element.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/resources/ts/pages/shipment.ts">/resources/ts/pages/shipment.ts</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   1</span>  import { createApp } from "vue";
<span class="text-secondary">   2</span>  import ShipStation from "@/components/shipping/ShipStation.vue";
<span class="text-secondary">   3</span>
<span class="text-secondary">   4</span>  createApp(<mark>ShipStation</mark>).mount(<mark>"#vue-app"</mark>);</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <p>The <a target="_blank" href="https://vuejs.org/guide/introduction.html">Vue</a> documentation explains the ShipStation component. I use the composition API. Some notable lines:</p>
                <ol>
                    <li value="9">Reactivity (complex)</li>
                    <li value="10">Template ref (also see 13 and 46)</li>
                    <li value="11">Lifecycle hook</li>
                    <li value="18">Computed property</li>
                    <li value="21">Event handling (also see 47)</li>
                    <li value="36">Template syntax</li>
                    <li value="41">Component v-model</li>
                    <li value="46">V-model</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/resources/ts/components/shipp/ShipStation.vue">/resources/ts/components/shipping/ShipStation.vue</a>
                    </div>
                    <div class="card-body">
@verbatim
<pre ><code><span class="text-secondary">   1</span>  &lt;script setup lang="ts">
<span class="text-secondary">   2</span>  import Printer from './Printer.vue';
<span class="text-secondary">   3</span>  import CustomerOrderDisplay from './CustomerOrderDisplay.vue';
<span class="text-secondary">   4</span>  import {shipStore} from "@/stores/ship-station";
<span class="text-secondary">   5</span>  import {useMachine} from "@xstate/vue";
<span class="text-secondary">   6</span>  import {shipMachine} from "../../machines/ship-station";
<span class="text-secondary">   7</span>  import {computed, onMounted, ref, toRefs} from "vue";
<span class="text-secondary">   8</span>  import * as constants from "@/constants/ship-station";
<span class="text-secondary">   9</span>  <mark>const { state, send } = useMachine(shipMachine, {context: <mark>toRefs(shipStore)</mark>});</mark>
<span class="text-secondary">  10</span>  const scan = ref(null);
<span class="text-secondary">  11</span>  onMounted(() => {
<span class="text-secondary">  12</span>      <mark>send(constants.START_JSPM_EVENT);</mark>
<span class="text-secondary">  13</span>      scan.value.focus();
<span class="text-secondary">  14</span>  })
<span class="text-secondary">  15</span>  function capitalizeFirstLetter(string) {
<span class="text-secondary">  16</span>      return string.charAt(0).toUpperCase() + string.slice(1);
<span class="text-secondary">  17</span>  }
<span class="text-secondary">  18</span>  const stateMessage = computed(() => {
<span class="text-secondary">  19</span>      return capitalizeFirstLetter(state.value.value.replace('_', ' '));
<span class="text-secondary">  20</span>  })
<span class="text-secondary">  21</span>  function handleScanSubmit() {
<span class="text-secondary">  22</span>      <mark>send(constants.WOI_SCAN_EVENT);</mark>
<span class="text-secondary">  23</span>      scan.value.focus();
<span class="text-secondary">  24</span>  }
<span class="text-secondary">  25</span>  &lt;/script>
<span class="text-secondary">  26</span>
<span class="text-secondary">  27</span>  &lt;template>
<span class="text-secondary">  28</span>    &lt;div class="bg-light border p-5">
<span class="text-secondary">  29</span>      &lt;div class="row">
<span class="text-secondary">  30</span>        &lt;div class="col-12">
<span class="text-secondary">  31</span>          &lt;h3>Shipping station&lt;/h3>
<span class="text-secondary">  32</span>        &lt;/div>
<span class="text-secondary">  33</span>      &lt;/div>
<span class="text-secondary">  34</span>      &lt;div class="row">
<span class="text-secondary">  35</span>        &lt;div class="col-12">
<span class="text-secondary">  36</span>          &lt;p class="text-secondary">  {{ stateMessage }}&lt;/p>
<span class="text-secondary">  37</span>        &lt;/div>
<span class="text-secondary">  38</span>      &lt;/div>
<span class="text-secondary">  39</span>      &lt;div class="row mt-3">
<span class="text-secondary">  40</span>        &lt;div class="col-lg-4">
<span class="text-secondary">  41</span>          <mark>&lt;Printer :installed-printers="shipStore.installedPrinters" v-model="shipStore.selectedPrinterIndex">&lt;/Printer></mark>
<span class="text-secondary">  42</span>        &lt;/div>
<span class="text-secondary">  43</span>        &lt;div class="col-lg-8">
<span class="text-secondary">  44</span>            &lt;label for="lastScan" class="form-label">Work Order Item Scan&lt;/label>
<span class="text-secondary">  45</span>            &lt;div class="input-group input-group-sm">
<span class="text-secondary">  46</span>              &lt;input id="lastScan" ref="scan" class="form-control form-control-sm rounded-0 " <mark>v-model="shipStore.currentScan"</mark> />
<span class="text-secondary">  47</span>              &lt;button class="btn btn-sm btn-secondary rounded-0" <mark>@click="handleScanSubmit"</mark>Submit&lt;/button>
<span class="text-secondary">  48</span>            &lt;/div>
<span class="text-secondary">  49</span>        &lt;/div>
<span class="text-secondary">  50</span>      &lt;/div>
<span class="text-secondary">  51</span>      &lt;hr>
<span class="text-secondary">  52</span>      &lt;div class="row ">
<span class="text-secondary">  53</span>        &lt;div class="col-12">
<span class="text-secondary">  54</span>          &lt;CustomerOrderDisplay>&lt;/CustomerOrderDisplay>
<span class="text-secondary">  55</span>        &lt;/div>
<span class="text-secondary">  56</span>      &lt;/div>
<span class="text-secondary">  57</span>
<span class="text-secondary">  58</span>    &lt;/div>
<span class="text-secondary">  59</span>  &lt;/template></code></pre>
    @endverbatim
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <h5>State store</h5>
                <p>A state store is a reactive object holding properties common to several components.</p>
                <p>The ShipStation component unwraps the store using toRefs when passing the context into the statechart. This avoids losing reactivity. Per the docs, "When a ref is accessed or mutated as a property of a reactive object, it is also automatically unwrapped so it behaves like a normal property".</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/resources/ts/stores/ship-station.ts">/resources/ts/stores/ship-station.ts</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   1</span>  import { reactive } from 'vue';
<span class="text-secondary"> ...</span>
<span class="text-secondary">  85</span>  export const shipStore: Store = <mark>reactive</mark>({
<span class="text-secondary">  86</span>      error: "",
<span class="text-secondary">  87</span>      currentScan: "1",
<span class="text-secondary">  88</span>      lastScan: "",
<span class="text-secondary">  89</span>      customerOrder: null,
<span class="text-secondary">  90</span>      scannedItems: {},
<span class="text-secondary">  91</span>      installedPrinters: [],
<span class="text-secondary">  92</span>      selectedPrinterIndex: null,
<span class="text-secondary">  93</span>      packages: [],
<span class="text-secondary">  94</span>      state: '',
<span class="text-secondary">  95</span>  });</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <h5>Statechart</h5>
                <p>A statechart is like a flowchart. It defines an initial state the application is in, transitions each state can take and guards to prevent or allow transitions. <a href="">Xstate</a> standardizes implementation.</p>
                <p>startJSPM is a composable that returns a promise. The invoke configuration calls this. If there's an error it updates the context in the SET_ERROR action. After promise resolution, the machine transitions to the CHECKING_JSPM_STATE. This has a guard to handle promise rejection.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/resources/ts/machines/ship-station.ts">/resources/ts/machines/ship-station.ts</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   1</span>  import { createMachine, assign } from 'xstate';
<span class="text-secondary">   2</span>  import * as constants from "../constants/ship-station";
<span class="text-secondary">   3</span>  import useGet from "../composables/get";
<span class="text-secondary">   4</span>  import { useJSPM } from "../composables/jspm";
<span class="text-secondary">   5</span>  import {ref, toRaw, toRef, toRefs, unref} from "vue";
<span class="text-secondary">   6</span>  import useScreenShot from "../composables/screenshot";
<span class="text-secondary">   7</span>
<span class="text-secondary">   8</span>  const {startJSPM, checkJSPM, getInstalledPrinters, printImageBase64, printImageBlob} = useJSPM();
<span class="text-secondary"> ...</span>
<span class="text-secondary">  35</span>  export const shipMachine = createMachine(
<span class="text-secondary">  36</span>      {
<span class="text-secondary">  37</span>          predictableActionArguments: true,
<span class="text-secondary">  38</span>          <mark>initial</mark>: [constants.NO_JSPM_STATE],
<span class="text-secondary">  39</span>          context: {},
<span class="text-secondary">  40</span>          <mark>states</mark>: {
<span class="text-secondary">  41</span>              [constants.NO_JSPM_STATE]: {
<span class="text-secondary">  42</span>                  on: {
<span class="text-secondary">  43</span>                      [constants.START_JSPM_EVENT]: {
<span class="text-secondary">  44</span>                          target: constants.STARTING_JSPM_STATE
<span class="text-secondary">  45</span>                      }
<span class="text-secondary">  46</span>                  }
<span class="text-secondary">  47</span>              },
<span class="text-secondary">  48</span>              [constants.STARTING_JSPM_STATE]: {
<span class="text-secondary">  49</span>                  invoke: {
<span class="text-secondary">  50</span>                      <mark>src: (context, event) => startJSPM(),</mark>
<span class="text-secondary">  51</span>                      onDone: {
<span class="text-secondary">  52</span>                          target:constants.CHECKING_JSPM_STATE
<span class="text-secondary">  53</span>                      },
<span class="text-secondary">  54</span>                      onError: {
<span class="text-secondary">  55</span>                          target: constants.ERROR_STATE,
<span class="text-secondary">  56</span>                          actions: [constants.SET_ERROR]
<span class="text-secondary">  57</span>                      }
<span class="text-secondary">  58</span>                  }
<span class="text-secondary">  59</span>              },
<span class="text-secondary"> ...</span>
<span class="text-secondary"> 186</span>          <mark>guards</mark>: {
<span class="text-secondary"> 187</span>              [constants.JSPM_OPEN]: (context, event) => {
<span class="text-secondary"> 188</span>                  return checkJSPM();
<span class="text-secondary"> 189</span>              },
<span class="text-secondary"> 190</span>              [constants.ALL_WOI_SCANNED]: (context, event) => {
<span class="text-secondary"> 191</span>                  const workOrders = context.customerOrder.value.workOrders;
<span class="text-secondary"> 192</span>                  for (let wo_index in workOrders) {
<span class="text-secondary"> 193</span>                      for (let woi_index in workOrders[wo_index].workOrderItems) {
<span class="text-secondary"> 194</span>                          const woi_id = workOrders[wo_index].workOrderItems[woi_index].id;
<span class="text-secondary"> 195</span>                          if (context.scannedItems.value[woi_id] === undefined) {
<span class="text-secondary"> 196</span>                              return false;
<span class="text-secondary"> 197</span>                          }
<span class="text-secondary"> 198</span>
<span class="text-secondary"> 199</span>                      }
<span class="text-secondary"> 200</span>                  }
<span class="text-secondary"> 201</span>                  return true;
<span class="text-secondary"> 202</span>              },
<span class="text-secondary"> 203</span>              [constants.WOI_FOUND]: (context, event) => {
<span class="text-secondary"> 204</span>                  const workOrders = context.customerOrder.value.workOrders;
<span class="text-secondary"> 205</span>                  for (let wo_index in workOrders) {
<span class="text-secondary"> 206</span>                      for (let woi_index in workOrders[wo_index].workOrderItems) {
<span class="text-secondary"> 207</span>                          if (workOrders[wo_index].workOrderItems[woi_index].id === context.lastScan.value) {
<span class="text-secondary"> 208</span>                              return true;
<span class="text-secondary"> 209</span>                          }
<span class="text-secondary"> 210</span>                      }
<span class="text-secondary"> 211</span>                  }
<span class="text-secondary"> 212</span>                  return false;
<span class="text-secondary"> 213</span>              },
<span class="text-secondary"> 214</span>          },
<span class="text-secondary"> 215</span>          <mark>actions</mark>: {
<span class="text-secondary"> 216</span>              [constants.SET_ERROR]: (context, event) => {
<span class="text-secondary"> 217</span>                  context.error.value = event.error;
<span class="text-secondary"> 218</span>              },
<span class="text-secondary"> 219</span>              [constants.SET_INSTALLED_PRINTERS]: (context, event) => {
<span class="text-secondary"> 220</span>                  context.installedPrinters.value = event.data;
<span class="text-secondary"> 221</span>              },
<span class="text-secondary"> 222</span>              [constants.SET_LAST_SCAN]: (context, event) => {
<span class="text-secondary"> 223</span>                  context.lastScan.value = parseInt(context.currentScan.value);
<span class="text-secondary"> 224</span>                  context.currentScan.value = '';
<span class="text-secondary"> 225</span>              },</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="p-3">
    <p class="mt-3 text-center text-secondary">calvin@calvinhill.com</p>
</div>

</body>
</html>
