<template>
    <nav class="navbar navbar-expand-sm navbar-light bg-light" id="navbar">
        <div class="container">
            <span class="navbar-brand" href="#" @click="router.push(Routes.Login)">
                <img src="../assets/imgs/favicon.png" alt="icon" class="w-25">
                iBarber
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li v-for="(link, i) in links" :key="i" class="nav-item">
                        <router-link v-if="enableToShow(link)" class="nav-link" :to="link.path">
                            {{ link.name }}
                        </router-link>
                    </li>
                </ul>
                <meusHorarios />
                <user />
                <logout style="margin-left: 10px;" />
            </div>
        </div>
    </nav>
</template>

<script setup lang="ts">
import meusHorarios from './shared/meus-horarios.vue'
import user from '@/components/User.vue'
import logout from './shared/buttons/logout.vue'
import { Routes } from '@/core/enums'

import { Router, RouteRecordRaw, useRouter } from "vue-router"
const router: Router = useRouter()

const links: RouteRecordRaw[] = router.options.routes;

const routesDontShow: string[] = [
    'Login', 'Register',
    'Reset', 'Usuario'
]

const enableToShow = (link: RouteRecordRaw): boolean =>
    routesDontShow.find(route => route == link.name) == null

</script>

<style scoped>
.navbar-brand {
    cursor: pointer;
}
</style>