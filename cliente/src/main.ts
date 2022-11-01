import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index';
import store from './store/index';
import VCalendar from 'v-calendar';
import VueSmoothScroll from 'vue3-smooth-scroll'
import './plugins/axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min';

createApp(App)
    .use(router)
    .use(store)
    .use(VueSmoothScroll, {
        updateHistory: false
    })
    .use(VCalendar, {})
    .mount("#app");