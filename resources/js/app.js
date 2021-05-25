require('./bootstrap');
require( 'datatables.net-dt' )();

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import Vue from 'vue';
import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps,{
    load:{
        key:''
    }
})

const app = new Vue({
    el: '#app',
});
