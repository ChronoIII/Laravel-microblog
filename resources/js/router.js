import { createWebHistory, createRouter } from 'vue-router';

import index from './components/auth/auth';
import home from './components/home/home';

const routes = [
    {
        path: '/',
        name: 'Welcome to Anchor',
        component: index
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
