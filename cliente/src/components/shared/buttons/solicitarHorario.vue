<template>
    <button type="button" class="btn btn-dark" @click="send">
        <spinner v-if="loading" />
        <span v-else>Solicitar horario</span>
    </button>
</template>

<script setup lang="ts">
import { cadastra } from '@/core/functions';
import { computed, ref } from 'vue';
import { useStore } from 'vuex';
import { bus, Events } from '@/core/bus';
import spinner from '../spinner.vue';
import { State } from '@/core/interfaces';
const state: State = useStore().state;

const path: string = 'pendente'
const loading = ref<boolean>(false)

const possuiAgendamento = computed(()
    : boolean =>
    state.horarios.agendados.length > 0
)

const cliente = computed(()
    : number =>
    state.cliente.id
)

const props = defineProps({
    barbeiro: {
        type: Number,
        required: true
    }
})

const send = () => {
    if (possuiAgendamento.value) {
        return;
    }
    const body = {
        cliente_id: cliente.value,
        barbeiro_id: props.barbeiro
    }
    loading.value = true
    cadastra(path, body)
        .then(() => {
            loading.value = false
            bus.emit(Events.recarrega_horarios_pendente)
        })
        .catch(() => loading.value = false)
}

</script>