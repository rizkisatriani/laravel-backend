/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 
import Vue from 'vue'
import Router from 'vue-router' 

Vue.use(Router)
 
import Resto from './components/settings/Resto.vue';
import Maps from './components/settings/GoogleMapLoader.vue';   /*
import Level from './components/settings/level.vue';   
import Merk from './components/settings/Merk.vue';   
import Type from './components/settings/Type.vue';  
import Barang from './components/master/Barang.vue';  */  
 
 
const router = new Router({ 
    mode:'history',
    routes:[{
    path : '/Resto',
    name : 'Resto',
    component : Resto
    },{
    path : '/Maps',
    name : 'Maps',
    component : Maps
    } ]});

/*router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        let auth = store.getters.isAuth

        if (!auth) {
            next({ name:'login'})
        } else {
            next()
        }
    } else {
        next()
    }
});*/

 export default router
