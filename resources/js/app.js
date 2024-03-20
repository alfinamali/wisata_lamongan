import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from './routes'

require('./bootstrap');

window.Vue = require('vue').default;




Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('hed-component', require('./components/HedComponent.vue').default);
Vue.component('about-component', require('./components/AboutComponent.vue').default);
Vue.component('porto-component', require('./components/PortoComponent.vue').default);

Vue.component('/', require('./components/Wisata/LandingPage.vue').default);
Vue.component('login', require('./components/Wisata/Login.vue').default);
Vue.component('home', require('./components/Wisata/Home.vue').default);
Vue.component('data-wisata', require('./components/Wisata/DataWisata.vue').default);
Vue.component('create-wisata', require('./components/Wisata/CreateWisata.vue').default);
Vue.component('update-wisata', require('./components/Wisata/UpdateWisata.vue').default);

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});


const app = new Vue({
    el: '#app',
    router
});