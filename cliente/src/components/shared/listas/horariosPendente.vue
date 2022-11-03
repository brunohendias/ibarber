<template>
    <ul class="list-group">
        <spinner v-if="loading" />
        <div v-else class="text-center">
            <span class="text-primary">Solicitado</span>
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
import { bus, Events } from '@/core/bus'
import { ref, computed, onMounted, watch } from 'vue'
import { useStore } from 'vuex'
import { Pendente, State } from '@/core/interfaces'
import { Actions } from '@/core/enums'
const store = useStore()
const state: State = store.state

const loading = ref<boolean>(false)
const action: string = Actions.alteraHorariosPendentes
const path: string = 'pendente/me'

const dados = computed(()
    : Pendente[] =>
    state.horarios.pendentes
)

onMounted(()
    : void => {
    loading.value = true
    busca(path, action, store)
        .finally(() => loading.value = false)
})

watch(() => bus.on(Events.recarrega_horarios_pendente),
    () => busca(path, action, store))

</script>

<style>
.horario-pendente {
    width: 20px;
    height: 20px;
    background-color: orange;
}
</style>