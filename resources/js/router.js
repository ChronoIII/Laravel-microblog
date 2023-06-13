import { createWebHistory, createRouter } from 'vue-router';

import auth from './components/auth/auth';
import home from './components/home/home';

const routes = [
    {
        path: '/',
        name: 'Authentication',
        component: auth
    },
    {
        path: '/home',
        name: 'Home',
        component: home
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
