// Load plugins
import $ from 'jquery';
import helper from "./helper";
import axios from "axios";
import * as Popper from "@popperjs/core";
import dom from "@left4code/tw-starter/dist/js/dom";
import Alpine from 'alpinejs'
import cash from "cash-dom";
// Set plugins globally
window.cash = cash;
window.helper = helper;
window.axios = axios;
window.Popper = Popper;
window.$ = window.jQuery = $;
window.Alpine = Alpine
Alpine.start()


// Load plugins



// Set plugins globally


// CSRF token
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

cash(document).on('DOMContentLoaded', () => {




    Livewire.hook('component.initialized', (message, component) => {
        // initializeTomSelects();
    });

    window.addEventListener('htmlPrint', event => {
        var w = window.open("about:blank");
        w.document.write(event.detail.html);
        w.print();
        w.close();
    });
    Livewire.hook('message.processed', (message, component) => {


        //   console.log('event livewire message.processed');


        initializeTomSelects();

        // initializeTailSelect();

        initializeTooltips();

        initializeFeather();

        initializeSvgLoader();

        initializeMask();

        // initializeCkEditor();

        initializeCharts();

        // Object.entries(datepickers).forEach(([key, value]) => {
        //     cash(`input#${key}`).val(value);
        // });

    });

    Livewire.on('showModal', (id) => cash(`#${id}`).modal('show'));

});

