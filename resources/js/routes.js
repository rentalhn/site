import VueRouter from 'vue-router';
import Home from './components/home.vue';
import ProductsList from './components/Products/Products.vue';
import Cart from './components/Cart.vue';
//import PageTwo from './views/PageTwo.vue';

let routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/Products/',
        name: 'Products',
        component: ProductsList,
        props:true 
    },
    {
        path: '/Cart',
        name: 'Cart',
        component: Cart,
        props:true
    },
    

];

const router = new VueRouter({
    routes: routes,
    mode: 'history'
});

export default router;