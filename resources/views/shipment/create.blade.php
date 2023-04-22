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
                <div id="app"></div>
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
                <h6>Prerequisites</h6>
                <p>This section assumes learned basic PHP, JavaScript and understands what a web application is.</p>
                <p>To follow along, I'd first read:</p>
                <h6>Architecture overview</h6>
                <p>Professionally, I've usually written Vue applications by importing from a Content Delivery Network (CDN) and writing a unique app on each page, usually an inline script.</p>
                <p>I wanted to use Vue components for the Ship station. A component is a single file with HTML and JS. Components are useful for organizing code into smaller parts. For example, a component holds the logic for whether to add a border to a scanned item.</p>
                <p>Components require a build step. I would create several components, then I would a command using a tool called vite. It would transform these into a single javascript file I could import onto the page.</p>
                <p>I think most developers use a build step on a Single Page Application (SPA). I wanted to keep the Laravel router handling requests on other pages. I had to research how to create this app only on this page.</p>
                <h6>Starting with Vue</h6>
                <p>I'd start studying this codebase with the package.json file in the <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill">application root directory</a>. In that file ,there's a "scripts" key. It has an entries for "dev" and "build". When I'm developing the site, I run a command "npm run dev". That runs the script under the "dev" key, which is vite. When deploying the site, I run "npm run build". The development version is slower, but I see my changes reflected in real time. Production bundles everything together, so it returns a response faster but the website doesn't reflect changes to the code.</p>
                <p>"Vite" and "Vite build" are commands to a tool called ... "vite". Vite is responsible for bundling and serving Vue applications. In the vite.config.js file, there's a plugin for laravel that specifies what to include. The main focus is the laravel plugin resources. These specify where vite should look for files to transform.</p>
                <p>This page is build with the 'resources/ts/pages/shipment.ts' file. It says 'ts' instead of 'js' because I use TypeScript. That file imports "vue" and the ShipStation.vue component. Then it mounts the ShipStation component to an html element on the page.</p>
                <p>Back in the vite config, there's an entry at the bottom to resolve the alias "vue" to "vue/dist/vue.esm-bundle.js". That file is in a directory called node_modules. Similarly the '@' resolves to '/resources/ts'.</p>
                <h6>Putting it together with Laravel</h6>
                <p>In the "routes/web.php" file, the first route maps the url "/" to return a template called "shipment.create".</p>
                <p>I'm currently writing this in "resources/views/shipment/create.blade.php". This is line 73 of the file in the repository.</p>
                <p>The top of the file extends "app.blade.php". That's the template for this file.</p>
                <p>Then the "resources/ts/pages/shipment.ts" file from the last section is imported in the head.</p>
                <p>You can see in that file that it mounts the component "ShipStation" to an element with an id of "#app". That element is on line 40 of this file.</p>
                <p>I read through the Vue documentation to learn it. It explains each part of the ShipStation.vue component.</p>
                <h6>State store</h6>
                <p>Each component in a Vue application can have some Javascript or TypeScript, in my case. These use variables. Sometimes different components want to use the same variables.</p>
                <p>It can be a problem to keep these all in sync.</p>
                <p>My approach can be seen in the stores/ship-station.ts file. ShipStation.vue imports this file. The file exports a single object with all the data tracked in the ship station. It has the scanned items, customer order, etc.</p>
                <p>The shipStore is reactive (line 85). In the Vue components, I can display different values from the store like @verbatim{{shipStore.state}}@endverbatim. When the shipStore "state" property changes from "Waiting" to "Scanning", the message shown on the screen will change automatically.</p>
                <h6>Statechart</h6>
                <p>As frontend applications grow, it becomes complex to manage the different interactions on the screen.</p>
                <p>For example, if the user hasn't installed JSPM, then scanning a work order item produces different effects. Or if a user has already scanned several items in a customer order, then they scan an item in a different order, the system throws an error.</p>
                <p>A useful way to manage this complexity is with a state machine or statechart.</p>
                <p>A statechart is a more featureful version of a statemachine. I used a library called xstate to implement a statechart in machines/ship-station.ts.</p>
                <p>This is like a flowchart. I defined the different "states" the application could be in. These are imported from the constants/ship-station.ts file.</p>
                <p>Back in the machine, I define when different transitions happen to new states. For example, if all the items are scanned, then the shipping label and packing slip print out.</p>
                <p>The statechart forced me to think through how to handle promises failing. For example, a network error disrupting an ajax request.</p>
            </div>
        </div>
    </div>
@endsection
