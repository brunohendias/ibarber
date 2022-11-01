<template>
    <button class="btn btn-primary" @click.prevent="enviar">
        <span>Cadastrar</span>
    </button>
</template>

<script setup lang="ts">
import { cadastra } from '@/core/functions'
import { bus, Events } from '@/core/bus'
import { computed } from 'vue'
import { useStore } from 'vuex'
import { Endereco, State } from '@/core/interfaces'

const store = useStore()
const state: State = store.state

const path: string = 'cliente'

const body = computed(()
    : Endereco =>
    state.endereco
)

const enviar = ()
    : Promise<true | void> =>
    cadastra(path, body.value)
        .then(() => bus.emit(Events.recarrega_cliente))
</script>