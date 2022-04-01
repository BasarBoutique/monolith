import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store/store'

import BoutiqueIndex from '../components/Home.vue'
import BoutiqueLogin from '../components/auth/login.vue'
import Dashboard from '../components/Dashboard.vue'
import BoutiqueDashboardindex from '../components/pages/charts.vue'
import BoutiqueDashboardicons from '../components/pages/icons.vue'
import BoutiqueDashboardcategories from '../components/pages/Category/CategoryTableList.vue'
import BoutiqueDashboardCourses from '../components/pages/Courses/CoursesTableList.vue'
import BoutiqueDashboardUsers from '../components/pages/Users/ManagementUsersList.vue'
import BoutiqueDashboardPerfil from '../components/pages/Users/ProfileUsers.vue'


Vue.use(VueRouter)

const routes = [{
    path: '/',
    component: BoutiqueIndex,
    name: 'boutique.index', 
    meta: {
        visitor: true
    }
},
{
    path: '/boutique/login',
    component: BoutiqueLogin,
    name: 'boutique.login', 
    meta: {
        visitor: true
    }
},
    {
        path: '/Dashboard',
        component: Dashboard,
        name: 'boutique.dashboard', 
        meta: {
            requiresAuth: true
        },
        children: [{
                path: '/boutique/dashboard/index',
                component: BoutiqueDashboardindex,
                name: 'boutique.dashboard.index', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/icons',
                component: BoutiqueDashboardicons,
                name: 'boutique.dashboard.icons', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/categories',
                component: BoutiqueDashboardcategories,
                name: 'boutique.dashboard.categories', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/Courses',
                component: BoutiqueDashboardCourses,
                name: 'boutique.dashboard.Courses', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/UsersManagement',
                component: BoutiqueDashboardUsers,
                name: 'boutique.dashboard.UsersManagement', 
        meta: {
            requiresAuth: true
        },
            },
            {
                path: '/boutique/dashboard/UsersProfile',
                component: BoutiqueDashboardPerfil,
                name: 'boutique.dashboard.UsersProfile', 
        meta: {
            requiresAuth: true
        },
            }

        ]
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.loggedIn) {
            next({
                name: 'boutique.login',
            });
        } else {
            next();
        }
    } else if(to.matched.some(record => record.meta.visitor)) {
        if (store.getters.loggedIn) {
            next({
                name: 'boutique.dashboard.index',
            });
        } else {
            next();
        }
    }else{
        next();
    }
});

export default router