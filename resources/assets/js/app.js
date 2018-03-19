/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
import Vuelidate from 'vuelidate'
// import Dropzone from 'vue2-dropzone'
import vue2Dropzone from 'vue2-dropzone'

Vue.use(Vuetify)
Vue.use(Vuelidate)

Vue.component('login', require('./components/Login.vue'));
Vue.component('login2', require('./components/Login2.vue'));
Vue.component('logout', require('./components/Logout.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('chips', require('./components/Chips.vue'));
Vue.component('about', require('./molecules/about.vue'));

Vue.component('image-uploader', {
  components: {
    vueDropzone: vue2Dropzone
  },
  data() {
    return {
    };
  },
  methods: {
    'showSuccess': function (file) {
      console.log('A file was successfully uploaded')
    }
  }
});

const app = new Vue({
    el: '#app',
    components: {
        vueDropzone: vue2Dropzone
    },
    methods: {
      'showSuccess': function (file) {
        console.log('A file was successfully uploaded')
      }
    },
    data () {
      return {
        drawer: false,
        dropzoneOptions: {
          dictDefaultMessage: 'Drop your images here or click to choose (at least 400x400px)',
          acceptedFiles: '.jpg,.jpeg,.png',
          maxFiles: 2,
          maxFilesize: 100,
          headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
        },
      }
    }
});
