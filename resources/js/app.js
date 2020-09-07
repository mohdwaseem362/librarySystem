/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./formulate.css');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('addbook-component', require('./components/AddBookComponent.vue'));
Vue.component('form-component', require('./components/vueFormlateComponent.vue').default);
Vue.component('update-modal-component', require('./components/ModalComponent.vue').default);
Vue.component('listButton-component', require('./components/listButtonComponent.vue').default);
Vue.component('show-table-component', require('./components/tableComponent.vue').default);
Vue.component('update-book-component', require('./components/UpdateComponent.vue').default);
Vue.component('show-editModal-component', require('./components/editModalComponent.vue'));
Vue.component('edit-Page-component', require('./components/editPageComponent.vue').default);
//user component
Vue.component('user-home-component', require('./components/UserHomeComponent.vue').default);
Vue.component('user-table-component', require('./components/UserTableComponent.vue').default);
Vue.component('user-return-component', require('./components/userReturnComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

