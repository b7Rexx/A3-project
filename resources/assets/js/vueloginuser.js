window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import UserComponent from './components/LoginUser/UserComponent.vue';
import RegisterComponent from './components/LoginUser/RegisterComponent.vue';
import RegisterSecondComponent from './components/LoginUser/RegisterSecondComponent.vue';

Vue.component('UserComponent', UserComponent);
Vue.component('RegisterComponent', RegisterComponent);
Vue.component('RegisterSecondComponent', RegisterSecondComponent);

const router = new VueRouter({
    mode: 'history',
    base: '/user/signup',
    routes: [
        {
            path: '/',
            component: UserComponent,
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


const signupuser = new Vue({
    router,
    el: '#signupuser'
});
