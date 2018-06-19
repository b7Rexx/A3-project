import VueRouter from 'vue-router';

Vue.use(VueRouter);

import ShopComponent from './components/Login/ShopComponent.vue';
import SRegisterComponent from './components/Login/SRegisterComponent.vue';
import SRegisterSecondComponent from './components/Login/SRegisterSecondComponent.vue';

Vue.component('ShopComponent', ShopComponent);
Vue.component('SRegisterComponent', SRegisterComponent);
Vue.component('SRegisterSecondComponent', SRegisterSecondComponent);

const router = new VueRouter({
    mode: 'history',
    base: '/shop/signup',
    routes: [
        {
            path: '/',
            component: ShopComponent,
        },
        {
            path: '/register',
            component: SRegisterComponent,
        },
        {
            path: '/register/:id',
            component: SRegisterSecondComponent,
        },
    ]
});


const signup = new Vue({
    router,
    el: '#signup'
});
