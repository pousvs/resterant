import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import menu from './components/Menusidebar.vue';
import router from './router';
import Pagination from './components/Pagination.vue';


import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import { createPinia } from 'pinia';
const pinia = createPinia();

const app = createApp(App)
app.use(VueSweetalert2)
app.component('menusidebar', menu);
app.component('Pagination',Pagination)
app.use(pinia);
app.use(router);
app.mount('#app-vue');
