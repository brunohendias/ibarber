<template>
    <img src="../assets/imgs/user-default.png" alt="profilepicture" @click="router.push(Routes.Usuario)">
</template>

<script setup lang="ts">
import { busca } from '@/core/functions'
import { usuario } from '@/core/auth'
import { bus, Events } from '@/core/bus'

import { onMounted, watch } from 'vue'
import { Store, useStore } from 'vuex'
import { Actions, Routes } from '@/core/enums'
import { Router, useRouter } from 'vue-router'
const store: Store<any> = useStore()
const router: Router = useRouter()

const path: string = 'cliente/me'
const action: string = Actions.alteraCliente

onMounted(() => {
    usuario()
    busca(path, action, store)
})

watch(() => bus.on(Events.recarrega_cliente),
    (): Promise<true | void> =>
        busca(path, action, store))

</script>

<style scoped>
img {
    cursor: pointer;
}
</style>