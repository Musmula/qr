
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('qr', require('./components/QrCode.vue'));
Vue.component('vcard', require('./components/vCard.vue'));

const app = new Vue({
    el: '#app',
    data: {
        mobileNav: false,
        QrContent: '',
        vCardString: ''
    },
    methods: {
        signOut() {
            document.querySelector('#sign-out').submit()
        },
        toggleMobileMenu() {
            this.mobileNav = ! this.mobileNav
        }
    },

    created() {
        window.app = this
        this.$on('newCard', (data) => {
            console.log(data)
            app.vCardString = data
        })
    }
});
