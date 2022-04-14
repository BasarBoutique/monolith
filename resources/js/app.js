require('./bootstrap');
import '../../public/assets/scss/app.scss'

window.Vue = require('vue').default;

window.toastr = require('toastr');

import Multiselect from 'vue-multiselect';
Vue.component('multiselect', Multiselect);

import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
Vue.use(VueSweetalert2);

import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);

import { BootstrapVue } from 'bootstrap-vue';
Vue.use(BootstrapVue)

import Va from 'vue-atlas'
import 'vue-atlas/dist/vue-atlas.css'
Vue.use(Va, 'en') 
import { VaDatepicker } from 'vue-atlas/src/Datepicker'

Vue.use(VaDatepicker)

import App from './components/App.vue'
import router from './router/routes'
import store from './store/store.js'
import ArgonDashboard from './components/plugins/argon-dashboard'
Vue.use(ArgonDashboard);
import '@mdi/font/css/materialdesignicons.css'

Vue.config.productionTip = false

new Vue({
    router,
    store,
    VueSweetalert2: new VueSweetalert2(),
    vuetify: new Vuetify(),
    render: h => h(App),
}).$mount('#app')



