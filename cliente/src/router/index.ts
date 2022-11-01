import { createRouter, createWebHistory, Router } from "vue-router";
import { authenticated } from '@/core/auth';
import { Routes } from '@/core/enums';

const router: Router = createRouter({
    history: createWebHistory(),
    routes: [{
        path: Routes.Home,
        name: 'Home',
        component: () => import('@/views/Home.vue')
    },
    {
        path: Routes.Register,
        name: 'Register',
        component: () => import('@/views/Register.vue')
    },
    {
        path: Routes.Login,
        name: 'Login',
        component: () => import('@/views/Login.vue')
    },
    {
        path: Routes.Reset,
        name: 'Reset',
        component: () => import('@/views/ResetPassword.vue')
    },
    {
        path: Routes.Usuario,
        name: 'Usuario',
        component: () => import('@/views/Usuario.vue')
    }]
})

router.beforeEach((to): object | void => {
    if (!authenticated) {
        if (to.name != 'Login' &&
            to.name != 'Register' &&
            to.name != 'Reset')
            return { name: 'Login' }
    } else if (
        to.name == 'Login' ||
        to.name == 'Register')
        return { name: 'Home' }
})

export default router