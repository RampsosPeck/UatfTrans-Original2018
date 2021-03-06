
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform'

import swal from 'sweetalert2' 
window.swal = swal;

const toast = swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 4000
}); 

window.toast = toast;

window.Form =Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: '#011620',
  failedColor: 'red',
  height: '2px'
})

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue') },
    { path: '/users', component: require('./components/User.vue') },
    { path: '/developer', component: require('./components/Developer.vue') },
    { path: '/scan', component: require('./components/Scan.vue') }, 
    { path: '/report', component: require('./components/Report.vue') },
    { path: '/help', component: require('./components/Help.vue') },
    { path: '/android', component: require('./components/Android.vue') }
  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
 })

Vue.filter('upText', function(text){ 
	return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate', function(created){
	return moment(created).lang("es").format('MMMM Do YYYY, h:mm:ss a'); // October 19th 2018, 3:26:36 pm
});

window.Fire = new Vue();


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('users', require('./components/User.vue'));
Vue.component('developer', require('./components/Developer.vue'));
Vue.component('scan', require('./components/Scan.vue')); 
Vue.component('report', require('./components/Report.vue'));
Vue.component('help', require('./components/Help.vue'));
Vue.component('android', require('./components/Android.vue')); 

const app = new Vue({
    el: '#app',
    data : {
        menu : 0
    }
});
