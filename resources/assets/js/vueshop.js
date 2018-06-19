import VueRouter from 'vue-router';

Vue.use(VueRouter);

import AddItemComponent from './components/shop/AddItemComponent.vue';
import ItemListComponent from './components/shop/ItemListComponent.vue';

Vue.component('AddItemComponent', AddItemComponent);
Vue.component('ItemListComponent', ItemListComponent);

const router = new VueRouter({
    mode: 'history',
    base: '/shop',
    routes: [
        {
            path: '/',
            component: ItemListComponent,
        },
        {
            path: '/action/add',
            component: AddItemComponent,
        }

    ]
});


const shopItem = new Vue({
    router,
    el: '#shop-item',
});


