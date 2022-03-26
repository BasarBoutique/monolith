require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter);

import VueSweetalert2 from "vue-sweetalert2"
Vue.use(VueSweetalert2)
import "sweetalert2/dist/sweetalert2.min.css"

import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify);

import Auth from './auth.js'
Vue.use(Auth);

import ArgonDashboard from './components/Base/BaseTable.vue'
Vue.use(ArgonDashboard);

import Transitions from 'vue2-transitions'
Vue.use(Transitions);

import App from './components/App.vue'
import BoutiqueIndex from './components/Home.vue'
import BoutiqueLogin from './components/auth/login.vue'
import Dashboard from './components/Dashboard.vue'
import BoutiqueDashboardindex from './components/pages/charts.vue'
import BoutiqueDashboardicons from './components/pages/icons.vue'
import BoutiqueDashboardcategories from './components/pages/Category/CategoryTableList.vue'


const router = new VueRouter({
    linkExactActiveClass: 'active',
    mode:'history',
    routes :[
        {
            path:'/',
            component: BoutiqueIndex,
            name: 'boutique.index',
            children:[
                {
                    path:'/boutique/login',
                    component: BoutiqueLogin,
                    name: 'boutique.login'
                }
            ]
        },
        {
            path:'/Dashboard',
            component: Dashboard,
            name: 'boutique.dashboard',
            children:[
                {
                    path:'/boutique/dashboard/index',
                    component: BoutiqueDashboardindex,
                    name: 'boutique.dashboard.index',
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path:'/boutique/dashboard/icons',
                    component: BoutiqueDashboardicons,
                    name: 'boutique.dashboard.icons',
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path:'/boutique/dashboard/categories',
                    component: BoutiqueDashboardcategories,
                    name: 'boutique.dashboard.categories',
                    meta: {
                        requiresAuth: true
                    }
                }
            ],
            meta: {
                requiresAuth: true
            }
        },
    ]
});



router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth) ) {
        if (Auth.check()) {
            next();
            return;
        } else {
            router.push('/boutique/login');
        }
    } else {
        next();
    }
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    vuetify: new Vuetify(),
    render: h => h(App)
});
