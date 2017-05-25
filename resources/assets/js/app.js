
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('user', require('./components/User.vue'));
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

const userd = new Vue({
    el: '#app',
    data: {
        // seen: true,
        tabs: [
            { name: 'First' },
            { name: 'Second' }
        ]
    },
    components: {
        'my-comp': {
            template: "#mycomp",
            props: ['tabs'],
        }
    }
});

// const app = new Vue({
//     el: '#app'
// });

// var app = new Vue({
//     el: '#app',
//     data: {
//         message: 'Hello Vue!'
//     }
// });

