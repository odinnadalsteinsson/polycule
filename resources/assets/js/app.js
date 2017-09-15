/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
import Vuelidate from 'vuelidate'
import Dropzone from 'vue2-dropzone'

Vue.use(Vuetify)
Vue.use(Vuelidate)

Vue.component('login', require('./components/Login.vue'));
Vue.component('logout', require('./components/Logout.vue'));
Vue.component('register', require('./components/Register.vue'));

const app = new Vue({
    el: '#app',
    components: {
      Dropzone
    },
    methods: {
      'showSuccess': function (file) {
        console.log('A file was successfully uploaded')
      }
    },
    data () {
      return {
        drawer: false
      }
    }
});
