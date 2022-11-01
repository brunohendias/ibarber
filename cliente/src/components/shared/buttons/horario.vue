<template>
    <button class="btn mb-3 text-white w-100" @click="marcar()" :disabled="disabled"
        :class="pendente() ? 'border-success' : 'border-light'">
        <spinner v-if="loading" />
        <span v-else> {{ horario }} </span>
    </button>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue'
import { useStore } from 'vuex'
import { cadastra } from '@/core/functions'
import spinner from '../spinner.vue'
import { bus, Events } from '@/core/bus'
import { Barbeiro, Pendente, State } from '@/core/interfaces'
const store = useStore()
const state: State = store.state

const props = defineProps({
    horario: {
        type: String,
        required: true
    },
    date: {
        type: String,
        default: ""
    }
})
const path: string = 'pendente'
const limite: number = 3
const loading = ref<boolean>(false)

const cliente = computed(()
    : number =>
    state.cliente.id
)
const barbeiro = computed(()
    : Barbeiro =>
    state.barbeiro
)
const pendentes = computed(()
    : Pendente[] =>
    state.horarios.pendentes
)
const data = computed(()
    : string =>
    props.date + " " + props.horario + ":00"
)
const disabled = computed(()
    : boolean =>
    loading.value || pendente() || pendentes.value.length >= limite)

const pendente = ()
    : boolean =>
    pendentes.value
        .find(pend => pend.nome == barbeiro.value.nome
            && pend.data == data.value) != null

const marcar = ()
    : void => {
    if (!disabled.value) {
        const body = {
            data: data.value,
            cliente_id: cliente.value,
            barbeiro_id: barbeiro.value.id
        }
        loading.value = true
        cadastra(path, body)
            .then(() => {
                loading.value = false
                bus.emit(Events.recarrega_horarios_pendente)
            })
            .catch(() => loading.value = false)
    }
}
</script>