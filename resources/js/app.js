
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('post-form', require('./components/postForm.vue'));
Vue.component('post-item', require('./components/postItem.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        onlyFav: false,
        url: document.querySelector('meta[name="req-url"]').getAttribute('content'),
        posts: {},
        favorites: {},
        user: {}
    },
    methods: {
        toggleFav(id) {
            index = this.favorites.indexOf(id);
            if (index > -1) {
                this.favorites.splice(index, 1);
            }
            else {
                this.favorites.push(id);
            }
        },
        verifyURL: function() {
            console.log(this.$route);
        }
    },
    mounted() {
        axios
        .get(this.url + '/post')
        .then(response => {
            this.posts = response.data.posts;
            this.favorites = response.data.favorites;
            this.user = response.data.user;
            console.log(response.data);
        })
    }
});
