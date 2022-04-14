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
import BoutiqueDashboardLessons from '../components/pages/Lesson/LessonTableList.vue'
import BoutiqueDashboardUsers from '../components/pages/Users/ManagementUsersList.vue'
import BoutiqueDashboardPerfil from '../components/pages/Users/ProfileUsers.vue'
import BoutiqueDashboardComments from '../components/pages/Comment/CommentTableList.vue'

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
                name: 'Index', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/icons',
                component: BoutiqueDashboardicons,
                name: 'Icons', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/categories',
                component: BoutiqueDashboardcategories,
                name: 'Category Management', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/Courses',
                component: BoutiqueDashboardCourses,
                name: 'Course Management', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/Lessons',
                component: BoutiqueDashboardLessons,
                name: 'Lesson Management', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/UsersManagement',
                component: BoutiqueDashboardUsers,
                name: 'User Management', 
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/UsersProfile',
                component: BoutiqueDashboardPerfil,
                name: 'User Profile',  
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/boutique/dashboard/Comments',
                component: BoutiqueDashboardComments,
                name: 'Calification Management',  
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
                name: 'Index',
            });
        } else {
            next();
        }
    }else{
        next();
    }
});

export default router