/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'
//import for vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./Store/index"

const store = new Vuex.Store(
    storeData);
//for use jque
import JQuery from 'jquery';
window.$ = JQuery;
import _ from 'lodash'
//window._ = require('lodash');

import Slick from 'vue-slick';
Vue.use(Slick)
    // import fileter js
import { filter } from './filter'
//fro multi image for lightbox show multi image
import VueLazyload from 'vue-lazyload'
Vue.use(VueLazyload);
// window.VueLazyLoad=VueLazyLoad
//for use metatag
import vueHeadful from 'vue-simple-headful';

Vue.use(vueHeadful);

new Vue({
    // your configuration
});

import vSelect from 'vue-select'
Vue.component('v-select', vSelect);
import 'vue-select/dist/vue-select.css';

// For facebook 
import VueFacebook from 'vue-facebook';
Vue.use(VueFacebook);
// For paginate
Vue.component('pagination', require('laravel-vue-pagination'));
//import v router form
import VueRouter from 'vue-router'
Vue.component('superadmin-main', require('./components/SuperAdmin/SuperAdminMaster.vue').default);
Vue.component('admin-main', require('./components/Admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/Home/En/HomeMaster.vue').default);
Vue.component('bnhome-main', require('./components/Home/Bn/HomeMaster.vue').default);
Vue.component('pagination', require('laravel-vue-pagination')); //for paginate 

//import v form
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form
    //import v form end
Vue.use(VueRouter)
import { routes } from './routes'; //for link route.js 
const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history' //for remove # in url 
});
//for sent all page token
router.beforeEach((to, from, next) => {
    //console.log(to),
    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');
    //window.superadmin =  localStorage.getItem( 'superadmininfo'); 
    next()
});




const app = new Vue({
    el: '#app',
    router,
    store,
});