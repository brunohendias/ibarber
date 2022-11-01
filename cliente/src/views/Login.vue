<template>
    <auth title="Entrar">
        <form @submit.prevent="login">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" v-model="body.email" class="form-control form-control-lg"
                placeholder="example@example.com" required />

            <label class="form-label mt-2" for="password">Senha</label>
            <input type="password" id="password" v-model="body.password" class="form-control form-control-lg"
                placeholder="********" required minlength="8" />

            <div class="mt-2">
                <forgetPassword :email="body.email" />
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-primary" type="submit" :disabled="disabled">
                    <spinner v-if="loading" />
                    <span v-else> Entrar </span>
                </button>
                <p class="mt-2">
                    Você não possui uma conta?
                    <router-link :to="Routes.Register"> Cadastrar </router-link>
                </p>
            </div>
        </form>
    </auth>
</template>

<script setup lang="ts">
import auth from '@/templates/auth.vue'
import { action } from '@/core/auth'
import spinner from '@/components/shared/spinner.vue'
import forgetPassword from '@/components/shared/buttons/forgetPassword.vue'
import { computed, reactive, ref } from 'vue'
import { Routes } from '@/core/enums'

const body = reactive({
    email: '',
    password: ''
})

const path: string = '/login'
const loading = ref<boolean>(false)

const disabled = computed(()
    : boolean =>
    loading.value || !body.password || !body.email
)

const login = (): void => {
    if (!disabled.value)
        loading.value = true
    action(path, body)
        .then(() => loading.value = false)
        .catch(() => loading.value = false)
}
</script>