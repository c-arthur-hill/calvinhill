@extends("app")

@section('head')
    @vite(['resources/ts/pages/shipment.ts'])
@endsection

@section('body')

    <div  class="container mt-5">
        <div class="row g-0">
            <div class="col-lg-10 offset-lg-1">
                <div class="shadow p-5" style="background-image: url({{ Storage::disk('s3')->url('img/white.png') }});">
                    <div class="row">
                        <div  class="col-lg-8">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class=""><strong>Commercial software development</strong></h1>
                                    <p class="text-secondary mt-3"><i>With Laravel & Vue</i></p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="mt-3">I'm a professional developer with six years of experience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="">
                                <div style="max-height: 400px; overflow: hidden;" class="">
                                    <img class="img-fluid" src="{{ Storage::disk('s3')->url('img/right.JPG') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-10 offset-lg-1">
                <div id="vue-app"></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-5 mx-auto mb-5">
                <h3>Shipping shirts slowly</h3>
                <p>I was doing work for an apparel printer. Customers submit pictures and illustrations through an API. The facility prints them onto T-shirts.</p>
                <p>The last step is shipping the finished product.</p>
                <p>Employees had to click through several forms to print out a packing slip and shipping label. This was slow.</p>
                <h3>Then faster</h3>
                <p>I implemented the solution above.</p>
                <p>The employee installs a third-party library, <a href="https://www.neodynamic.com/downloads/jspm" target="_blank">JSPM</a>. It finds printers attached to the computer and automatically prints the packing slip and shipping label. Without it, the files download.</p>
                <p>The employee scans a barcode on the first shirt. This brings up the art expected in the order. This is a final quality control check.</p>
                <p>Each scan highlights the item with a gray border. When the last item is scanned, the shipping label and packing slip are automatically printed. The real system purchases the cheapest label from UPS, FedEx, DHL, etc. Here I'm using an example label.</p>
                <p>Once everything is printed out, they put all the shirts in a box. They tape the label on the outside. They scan the next order.</p>
                <p class="mt-5 mb-5 clearfix">
                    <span class="float-end">
                        <a href="{{ route('media.index') }}" class="">Next<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                    </span>
                </p>
                <h3 class="">With a unique frontend</h3>
                <h5>Architecture</h5>
                <p>Professionally, I've usually written Vue applications by importing from a Content Delivery Network (CDN) and writing a unique app on each page, usually an inline script.</p>
                <p>I wanted to use Vue components for the Ship station. A component is a single file with HTML and JS. Components are useful for organizing code into smaller parts. For example, a component holds the logic for whether to add a border to a scanned item.</p>
                <p>Components require a build step. I would create several components, then I would a command using a tool called vite. It would transform these into a single javascript file I could import onto the page.</p>
                <p>I think most developers use a build step on a Single Page Application (SPA). I wanted to keep the Laravel router handling requests on other pages. I had to research how to create this app only on this page.</p>
                <h5>Laravel</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <p>Terminal command</p>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   %</span>  php artisan serve</code></pre>
                    </div>
                </div>
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
<pre><code><span class="text-secondary">   1</span> @verbatim <mark>@extends("app")</mark> @endverbatim
<span class="text-secondary">   2</span>
<span class="text-secondary">   3</span> @verbatim @section('head') @endverbatim
<span class="text-secondary">   4</span>  @verbatim     <mark>@vite(['resources/ts/pages/shipment.ts'])</mark> @endverbatim
<span class="text-secondary">   5</span>  @verbatim @endsection @endverbatim
<span class="text-secondary"> ...</span>
<span class="text-secondary">  97</span>  This is line 97</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <p>The top of the file extends "app.blade.php". That's the template for this file.</p>
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/resources/views/app.blade.php">/resources/views/app.blade.php</a>
                    </div>
                    <div class="card-body">
@verbatim
<pre ><code><span class="text-secondary">   1</span>  &lt;!DOCTYPE html>
<span class="text-secondary">   2</span>  &lt;html>
<span class="text-secondary">   3</span>  &lt;head>
<span class="text-secondary">   4</span>      &lt;meta charset="UTF-8">
<span class="text-secondary">   5</span>      &lt;title>Calvin Hill&lt;/title>
<span class="text-secondary">   6</span>      @vite(['resources/css/app.css'])
<span class="text-secondary">   7</span>      @vite(['resources/ts/bootstrap.ts'])
<span class="text-secondary">   8</span>      @yield('head')
<span class="text-secondary">   9</span>  &lt;/head>
<span class="text-secondary">  10</span>  &lt;body>
<span class="text-secondary">  11</span>      &lt&lt;div class="container">
<span class="text-secondary">  12</span>        &lt;div class="row">
<span class="text-secondary"> ...</span>
<span class="text-secondary">  33</span>            @yield('body')
<span class="text-secondary"> ...</span>
<span class="text-secondary">  38</span>  &lt;div class="row mt-5">
<span class="text-secondary">  39</span>     &lt;div class="col-lg-10 offset-lg-1">
<span class="text-secondary">  40</span>         &lt;div <mark>id="vue-app"</mark>&lt;/div>
<span class="text-secondary">  41</span>     &lt;/div>
<span class="text-secondary">  42</span>  &lt;/div></code></pre>@endverbatim
                    </div>
                </div>
                <h5>Vue</h5>
                <p>I'd start studying this codebase with the package.json file in the <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill">application root directory</a>. In that file ,there's a "scripts" key. It has an entries for "dev" and "build". When I'm developing the site, I run a command "npm run dev". That runs the script under the "dev" key, which is vite. When deploying the site, I run "npm run build". The development version is slower, but I see my changes reflected in real time. Production bundles everything together, so it returns a response faster but the website doesn't reflect changes to the code.</p>
                <p>"Vite" and "Vite build" are commands to a tool called ... "vite". Vite is responsible for bundling and serving Vue applications. In the vite.config.js file, there's a plugin for laravel that specifies what to include. The main focus is the laravel plugin resources. These specify where vite should look for files to transform.</p>
                <p>This page is build with the 'resources/ts/pages/shipment.ts' file. It says 'ts' instead of 'js' because I use TypeScript. That file imports "vue" and the ShipStation.vue component. Then it mounts the ShipStation component to an html element on the page.</p>
                <p>In the vite config, there's an entry at the bottom to resolve the alias "vue" to "vue/dist/vue.esm-bundle.js". That file is in a directory called node_modules. Similarly the '@' resolves to '/resources/ts'.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/package.json">/package.json</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">   3</span>  "scripts": {
<span class="text-secondary">   4</span>    "dev": "vite",
<span class="text-secondary">   5</span>    "build": "vite build"
<span class="text-secondary">   6</span>  },</code></pre>
                    </div>
                </div>
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
<span class="text-secondary">  23</span>      ],</code></pre>
                    </div>
                </div>
                <p>Then the "resources/ts/pages/shipment.ts" file from the last section is imported in the head.</p>
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
                <p>You can see in that file that it mounts the component "ShipStation" to an element with an id of "#app". That element is on line 40 of this file.</p>

                <p>I read through the Vue documentation to learn it. It explains each part of the ShipStation.vue component.</p>

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
                <h5>State store</h5>
                <p>Each component in a Vue application can have some Javascript or TypeScript, in my case. These use variables. Sometimes different components want to use the same variables.</p>
                <p>It can be a problem to keep these all in sync.</p>
                <p>My approach can be seen in the stores/ship-station.ts file. ShipStation.vue imports this file. The file exports a single object with all the data tracked in the ship station. It has the scanned items, customer order, etc.</p>

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
                <p>The shipStore is reactive (line 85). In the Vue components, I can display different values from the store like @verbatim{{shipStore.state}}@endverbatim. When the shipStore "state" property changes from "Waiting" to "Scanning", the message shown on the screen will change automatically.</p>
                <h5>Statechart</h5>
                <p>As frontend applications grow, it becomes complex to manage the different interactions on the screen.</p>
                <p>For example, if the user hasn't installed JSPM, then scanning a work order item produces different effects. Or if a user has already scanned several items in a customer order, then they scan an item in a different order, the system throws an error.</p>
                <p>A useful way to manage this complexity is with a state machine or statechart.</p>
                <p>A statechart is a more featureful version of a statemachine. I used a library called xstate to implement a statechart in machines/ship-station.ts.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/package.json">/package.json</a>
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
<span class="text-secondary">  50</span>                      src: (context, event) => startJSPM(),
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
                <p>This is like a flowchart. I defined the different "states" the application could be in. These are imported from the constants/ship-station.ts file.</p>
                <p>In the machine, I define when different transitions happen to new states. For example, if all the items are scanned, then the shipping label and packing slip print out.</p>
                <p>The statechart forced me to think through how to handle promises failing. For example, a network error disrupting an ajax request.</p>
            </div>
        </div>
    </div>
@endsection
