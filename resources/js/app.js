require('./bootstrap');

//window.Vue = require('vue');


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

import App from './components/App.vue';
Vue.use(VueAxios, axios);


import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';

const http = axios.create({
    baseURL : "http://afternoon-brook-71877.herokuapp.com/api",
    timeout : 10000,
    headers : {
        "Access-Control-Allow-Origin": "*",
        "Content-Type" : "application/json"
    }
})

export { http }

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'create',
      path: '/create',
      component: CreateComponent
  },
  {
      name: 'list',
      path: '/list',
      component: IndexComponent
  },
  {
      name: 'edit',
      path: '/edit/:id',
      component: EditComponent
  }
];


const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');

