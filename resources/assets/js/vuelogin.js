window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import LoginComponent from './components/Login/LoginComponent.vue';
import UserLoginComponent from './components/Login/UserLoginComponent.vue';
import ShopLoginComponent from './components/Login/ShopLoginComponent';

Vue.component('LoginComponent', require('./components/Login/LoginComponent.vue'));
Vue.component('UserLoginComponent', require('./components/Login/UserLoginComponent.vue'));
Vue.component('ShopLoginComponent', require('./components/Login/ShopLoginComponent.vue'));


const router = new VueRouter({
    mode: 'history',
    base: '/login',
    routes: [
        {
            path: '/',
            component: LoginComponent,
        },
        {
            path: '/user',
            component: UserLoginComponent,
        },
        {
            path: '/shop',
            component: ShopLoginComponent,
        }
    ]
});


const login = new Vue({
    router,
    el: '#login'
});
