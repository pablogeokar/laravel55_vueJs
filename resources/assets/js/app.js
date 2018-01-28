
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/*Importação e uso do Vuex*/ 
import Vuex from 'vuex';
Vue.use(Vuex);

//Vuex store
const store = new Vuex.Store({
    state:{
        item:{}
    },
    mutations:{
        setItem(state,obj){
            state.item = obj;
        }
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('breadcrumbs', require('./components/Breadcrumbs.vue'));
Vue.component('caixa', require('./components/Caixa.vue'));
Vue.component('pagina', require('./components/Pagina.vue'));
Vue.component('topo', require('./components/Topo.vue'));
Vue.component('painel', require('./components/Painel.vue'));
Vue.component('tabela-lista', require('./components/TabelaLista.vue'));
Vue.component('modal', require('./components/Modal/Modal.vue'));
Vue.component('modallink', require('./components/Modal/ModalLink.vue'));
Vue.component('formulario', require('./components/Formulario.vue'));

const app = new Vue({
    el: '#app',
    store,
    mounted(){
        document.getElementById('app').style.display = "block";
    }
});
