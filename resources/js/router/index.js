import { createWebHistory, createRouter } from "vue-router";

import login from '../pages/login.vue';
import register from '../pages/register.vue';
import store from '../pages/store.vue';
import pos from '../pages/pos.vue';
import report from '../pages/report.vue';
import transection from '../pages/transection.vue';
import nopage from '../pages/nopage.vue';
import homes from '../pages/homes.vue';
import tables from '../pages/tables.vue';
import ppdet from '../pages/ppdet.vue';
import storecal from '../pages/storecal.vue';

export const routes = [

      {
        path:'/',
        redirect:'/homes'
    },
    {
        name: 'homes',
        path: '/homes',
        component: homes
    },
     {
        name: 'login',
        path: '/login',
        component: login
    },
       {
        name:'register',
        path: '/register',
        component: register
    },
       {
        name:'store',
        path: '/store',
        component: store
    },
       {
        name: 'pos',
        path: '/pos',
        component: pos
    },
       {
        name:'report',
        path: '/report',
        component: report
    },
       {
        name: 'transection',
        path: '/transection',
        component: transection
    },
       {
        name: 'nopage',
        path: '/:pathMatch(.*)*',
        component: nopage
    },
       {
        name: 'tables',
        path: '/tables',
        component: tables
    },
    {
        name: 'ppdet',
        path: '/ppdet',
        component: ppdet
    },
    {
        name:'storecal',
        path: '/storecal',
        component: storecal
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    scrollBehavior(){
        window.scrollTo(0,0)
    }
});

export default router;