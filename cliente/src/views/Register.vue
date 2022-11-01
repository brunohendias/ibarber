<template>
    <auth title="Cadastre-se">
        <form @submit.prevent="register">
            <label class="form-label" for="name">Nome</label>
            <input type="text" id="name" v-model="body.name" class="form-control form-control-lg"
                placeholder="Digite seu nome" required minlength="5" />

            <label class="form-label mt-2" for="email">Email</label>
            <input type="email" id="email" v-model="body.email" class="form-control form-control-lg"
                placeholder="example@example.com" required />

            <label class="form-label mt-2" for="password">Senha</label>
            <input type="password" id="password" v-model="body.password" class="form-control form-control-lg"
                placeholder="********" required minlength="8" />

            <div class="text-center mt-3">
                <button class="btn btn-primary" type="submit" :disabled="disabled">
                    <spinner v-if="loading" />
                    <span v-else> Cadastrar </span>
                </button>
                <p class="mt-2">
                    Já possui uma conta?
                    <router-link :to="Routes.Login"> Entrar </router-link>
                </p>
            </div>
        </form>
    </auth>
</template>

<script setup lang="ts">
import auth from '@/templates/auth.vue'
import { action } from '@/core/auth'
import spinner from '@/components/shared/spinner.vue'
import { ref, computed, reactive } from 'vue'
import { Routes } from '@/core/enums'

const body = reactive({
    name: null,
    email: null,
    password: null
})

const path: string = '/register'
const loading = ref<boolean>(false)

const disabled = computed(()
    : boolean =>
    loading.value || !body.password || !body.email || !body.name
)

const register = ()
    : void => {
    if (!disabled.value)
        loading.value = true
    action(path, body)
        .then(() => loading.value = false)
        .catch(() => loading.value = false)
}
</script>