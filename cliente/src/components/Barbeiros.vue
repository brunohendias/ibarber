<template>
    <div id="barbeiros" class="py-5">
        <div class="text-center text-dark">
            <h2 class="display-5 fw-bolder">Selecione a barbearia</h2>
        </div>
        <spinner v-if="loading" />
        <esteira v-else-if="dados.length > 0" :style="{ width }">
            <card v-for="(barbeiro, i) in dados" :key="i" :options="barbeiro" />
        </esteira>
        <div v-else class="text-center h4">
            <p v-if="!cliente">
                Para mostrar as barbearias por favor <br>
                cadastre seu endereco no formulario clicando na foto de perfil acima
            </p>
            <p v-else>
                Ainda não temos barbearias disponiveis na sua cidade
            </p>
        </div>
    </div>
</template>

<script setup lang="ts">
import card from './shared/cards/barbeiro.vue'
import spinner from './shared/spinner.vue'
import esteira from './shared/esteira.vue'

import { computed, ref, onMounted } from 'vue'
import { useStore } from 'vuex'
import { busca } from '@/core/functions'
import { Barbeiro, State } from '@/core/interfaces'
import { Actions } from '@/core/enums'
const store = useStore()
const state: State = store.state

const path: string = 'barbeiro'
const action: string = Actions.alteraBarbeiros
const loading = ref<boolean>(false)
const width = ref<string>('')

const dados = computed(()
    : Barbeiro[] =>
    state.barbeiros
)
const cliente = computed(()
    : number =>
    state.cliente.id
)

onMounted(()
    : void => {
    loading.value = true
    busca(path, action, store)
        .then(() => {
            let larguraTotalCards = dados.value.length * 240
            if (window.screen.width > larguraTotalCards) {
                width.value = larguraTotalCards + 'px'
            }
            loading.value = false
        })
        .catch(() => loading.value = false)
})

</script>

<style scoped lang="css">
button:hover {
    background-color: #555;
    border-radius: 10px;
}
</style>