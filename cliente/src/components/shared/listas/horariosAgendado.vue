<template>
    <ul class="list-group">
        <spinner v-if="loading" />
        <div v-else class="text-center">
            <span class="text-success">Agendado</span>
            <li v-for="(dado, i) in dados" :key="i">
                <p>
                    {{ dado.nome }}
                    {{ formaters.data(dado.data) }}
                </p>
            </li>
        </div>
    </ul>
</template>

<script setup lang="ts">
import { busca } from '@/core/functions'
import { formaters } from '@/core/helpers'
import spinner from '../spinner.vue'
import { ref, computed, onMounted } from 'vue'
import { useStore } from 'vuex'
import { Agendado, State } from '@/core/interfaces'
import { Actions } from '@/core/enums'
const store = useStore()
const state: State = store.state

const loading = ref<boolean>(false)
const action: string = Actions.alteraHorariosAgendados
const path: string = 'agendamento/cliente'

const dados = computed(()
    : Agendado[] =>
    state.horarios.agendados
)

onMounted(()
    : void => {
    loading.value = true
    busca(path, action, store)
        .finally(() => loading.value = false)
})
</script>