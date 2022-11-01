<template>
    <button class="btn btn-primary" type="submit" @click.prevent="enviar">
        <span>Atualizar</span>
    </button>
</template>

<script setup lang="ts">
import { edita } from '@/core/functions'
import { computed } from '@vue/runtime-core'
import { useStore } from 'vuex'
import { Endereco, State } from '@/core/interfaces'

const store = useStore()
const state: State = store.state

const path: string = 'endereco'

const body = computed(()
    : Endereco =>
    state.endereco
)

const enviar = ()
    : Promise<true | void> =>
    edita(path, body.value)
</script>