<template>
    <auth title="Criar nova senha">
        <form @submit.prevent="reset">
            <label class="form-label" for="password">Nova senha</label>
            <input type="password" id="password" v-model="body.password" class="form-control form-control-lg"
                placeholder="********" required minlength="8" />

            <label class="form-label mt-2" for="password">Repetir nova senha</label>
            <input type="password" id="password" v-model="body.repetpassword" class="form-control form-control-lg"
                placeholder="********" required minlength="8" />
            <div class="text-center mt-2">
                <button class="btn btn-primary" type="submit" :disabled="disabled">
                    <span> Resetar </span>
                </button>
            </div>
        </form>
    </auth>
</template>

<script setup lang="ts">
import auth from '@/templates/auth.vue'
import { validaTokenReset, resetPassword } from '@/core/auth'
import { computed, onMounted, reactive } from 'vue'
import { useStore } from 'vuex'
import { useRoute } from 'vue-router'

const store = useStore()
const route = useRoute()

const body = reactive({
    password: null,
    repetpassword: null
})

const disabled = computed(()
    : boolean =>
    !body.password ||
    body.password != body.repetpassword
)

onMounted(() =>
    validaTokenReset(
        route.params.id.toString(),
        route.params.token.toString(),
        store
    ))

const reset = ()
    : void => {
    if (!disabled.value) {
        resetPassword({
            id: route.params.id,
            password: body.password,
            token: route.params.token
        })
    }
}
</script>