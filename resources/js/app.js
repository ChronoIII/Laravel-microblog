require('./bootstrap');

import { createApp } from 'vue';
import appComponent from './components/app';
import store from './store';
import router from './router';

const app = createApp(appComponent);

app.use(store);
app.use(router);
app.mount('#app');
