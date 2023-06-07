import Vue from 'vue';
import ExampleComponent from "./components/ExampleComponent";
//import VueRouter from 'vue-router';
//Vue.use(VueRouter);
import { createRouter, createWebHistory } from 'vue-router'

export default new ViewRouter({
    routes: [
        {path: '/', component: ExampleComponent}
    ],
    mode: 'history'
});