import {createRouter, createWebHistory } from 'vue-router';

import Home from './pages/Home.vue';
import Contacts from './pages/Contacts.vue';
import About from './pages/About.vue';
import Projects from './pages/Projects.vue';
import Error404 from './pages/Error404.vue';

const router = createRouter({
    history : createWebHistory(),
    linkExactActiveClass: 'active',
    routes : [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/contatti',
            name: 'contacts',
            component: Contacts
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About
        },
        {
            path: '/progetti',
            name: 'projects',
            component: Projects
        },
        {
            path:'/:pathMatch(.*)*',
            component : Error404
        }

    ]
});

export { router };
