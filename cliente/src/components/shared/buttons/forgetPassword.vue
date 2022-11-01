<template>
    <a href="#" @click="send"> Esqueceu sua senha? </a>
</template>

<script setup lang="ts">
import { forgetPassword } from '@/core/auth'
import { bus, Events } from '@/core/bus'

const props = defineProps({
    email: {
        type: String,
        default: ''
    }
})

const send = () => {
    if (!props.email)
        return bus.emit(Events.error_auth,
            'Por favor digite o email da sua conta para resetar a senha.')
    forgetPassword(props.email)
}
</script>