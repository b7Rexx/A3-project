window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import ShopComponent from './components/Login/ShopComponent.vue';
import RegisterComponent from './components/Login/RegisterComponent.vue';
import RegisterSecondComponent from './components/Login/RegisterSecondComponent.vue';

Vue.component('ShopComponent', ShopComponent);
Vue.component('RegisterComponent', RegisterComponent);
Vue.component('RegisterSecondComponent', RegisterSecondComponent);

const router = new VueRouter({
    mode: 'history',
    base: '/signup',
    routes: [
        {
            path: '/',
            component: ShopComponent,
        },
        {
            path: '/register',
            component: RegisterComponent,
        },
        {
            path: '/register/:id',
            component: RegisterSecondComponent,
        },
    ]
});


const signup = new Vue({
    router,
    el: '#signup'
});
