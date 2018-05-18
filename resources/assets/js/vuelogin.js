window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import LoginComponent from './components/Login/LoginComponent.vue';
import UserLoginComponent from './components/Login/UserLoginComponent.vue';
import ShopLoginComponent from './components/Login/ShopLoginComponent';
import RegisterComponent from './components/Login/RegisterComponent';
import RegisterSecondComponent from './components/Login/RegisterSecondComponent';

Vue.component('LoginComponent', LoginComponent);
Vue.component('UserLoginComponent', UserLoginComponent);
Vue.component('ShopLoginComponent', ShopLoginComponent);
Vue.component('RegisterComponent', RegisterComponent);
Vue.component('RegisterSecondComponent', RegisterSecondComponent);


const router = new VueRouter({
    mode: 'history',
    base: '/login',
    routes: [
        {
            path: '/home',
            component: LoginComponent,
        },
        {
            path: '/user',
            component: UserLoginComponent
        },
        {
            path: '/shop',
            component: ShopLoginComponent
        },
        {
            path: '/register',
            component: RegisterComponent
        },
        {
            path: '/registerSecond/:id',
            component: RegisterSecondComponent
        }

    ]
});


const login = new Vue({
    router,
    el: '#login'
});
