<template>
    <button type="button" class="btn" :class="atual" href="#dias" v-smooth-scroll @click="seleciona">
        Horarios disponiveis
    </button>
</template>

<script setup lang="ts">
import { computed } from "vue"
import { useStore } from "vuex"
import { Actions } from "@/core/enums";
import { State } from "@/core/interfaces";

const store = useStore()
const state: State = store.state

const props = defineProps({
    options: {
        type: Object,
        required: true
    }
})

const barbeiro = computed(()
    : number =>
    state.barbeiro.id
)
const atual = computed(()
    : string =>
    props.options.id == barbeiro.value
        ? 'bg-dark text-white'
        : 'btn-outline-dark'
)

const seleciona = ()
    : Promise<any> =>
    store.dispatch(Actions.alteraBarbeiro, props.options)
</script>