require('./bootstrap');
import Vue from 'vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'
import CreateComponent from './components/CreateComponent';
import ExampleComponent from './components/ExampleComponent';
import GetComponent from './components/GetComponent';
import EditComponent from './components/EditComponent';
// import vuetify from './plugins/vuetify'
Vue.use(VueAxios, axios);
Vue.use(VueRouter);
Vue.component('font-awesome-icon', FontAwesomeIcon) // Register component globally
library.add(fas)
Vue.use(Vuetify)
const vuetify= new Vuetify({
    theme: {
        primary: '#ee44aa',
        secondary: '#424242',
        accent: '#82B1FF',
        error: '#FF5252',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FFC107',
      },
      icons: {
        iconfont: 'faSvg',
      },
      options: {
        customProperties: true,
      },
      iconfont: 'md',
})

const routes = [
    {
        path: "/",
        name: "Example",
        component: ExampleComponent
    },
    {
        path: "/create",
        name: "Create",
        component: CreateComponent
    },
    {
        path: "/get-all-user",
        name: "Get All User",
        component: GetComponent
    },
    {
        path: "/edit-user/:id",
        name: "Edit User",
        component: EditComponent
    },
    
]

const router = new VueRouter({
    mode: 'hash',
    routes
})

const app = new Vue({
    el: '#app',
    router,
    vuetify:vuetify,
});






