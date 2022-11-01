<template>
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="horario-pendente" data-bs-toggle="dropdown"
            aria-expanded="false">
            Meus horarios
        </button>
        <ul class="dropdown-menu" aria-labelledby="horario-pendente">
            <spinner v-if="loading" />
            <div v-else class="text-center">
                <span class="text-success">Agendado</span>
                <li v-for="(dado, i) in pendentes" :key="dado.nome + i">
                    <p v-if="dado.agendado">
                        {{ dado.nome }}
                        {{ formaters.data(dado.data) }}
                    </p>
                </li>
                <hr>
                <span class="text-danger">Pendente</span>
                <li v-for="(dado, j) in pendentes" :key="j">
                    <p v-if="!dado.agendado">
                        {{ dado.nome }}
                        {{ formaters.data(dado.data) }}
                    </p>
                </li>
            </div>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { busca } from '@/core/functions'
import { formaters } from '@/core/helpers'
import spinner from './spinner.vue'
import { bus, Events } from '@/core/bus'

import { ref, computed, onMounted, watch } from 'vue'
import { useStore } from 'vuex'
import { Horarios, Pendente, State } from '@/core/interfaces'
import { Actions } from '@/core/enums'
const store = useStore()
const state: State = store.state

const loading = ref<boolean>(false)
const action: string = Actions.alteraHorariosPendentes
const path: string = 'pendente/me'

const horarios = computed(()
    : Horarios =>
    state.horarios
)
const pendentes = computed(()
    : Pendente[] =>
    horarios.value.pendentes
)

onMounted(()
    : void => {
    loading.value = true
    busca(path, action, store)
        .then(() => loading.value = false)
        .catch(() => loading.value = false)
}
)

watch(() => bus.on(Events.recarrega_horarios_pendente),
    () => busca(path, action, store))

</script>

<style scoped>
.horario-pendente {
    width: 20px;
    height: 20px;
    background-color: orange;
}

.horario-agendado {
    width: 20px;
    height: 20px;
    background-color: green;
}
</style>