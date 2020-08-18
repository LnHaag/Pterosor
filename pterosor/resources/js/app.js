/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import VueRouter from 'vue-router';
import Vuex from 'vuex'
import storeData from "./store/index"

import Software from './components/Software.vue';
import Publications from './components/Publications.vue';
import page from './components/page.vue';
import Presentations from './components/Presentations.vue';
import People from './components/People.vue';
import Data from  './components/Data.vue';
require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter);



const routes = [
    {
        path :'/people/:person',
        component: People
    },
    {
        path : '/Software',
        component : Software
    },
    
     {
        path :'/',
        component: page,
        name: 'page'
    }, 
    
    {
        path :'/Presentations',
        component: Presentations
    },
    {
        path :'/Publications',
        component: Publications
    },
    {
        path :'/Data',
        component: Data
    },

];

const router = new VueRouter({routes});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/* Vue.component('page', require('./components/page.vue')); */ 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    
    /* components: {
        page
    }, */
    router : router,
        
});
