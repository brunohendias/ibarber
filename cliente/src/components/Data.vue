<template>
    <div v-if="barbeiro" id="dias">
        <div class="bg-dark py-5">
            <div class="container">
                <div class="row">
                    <div class="text-center text-white col-lg-6">
                        <h1 class="fw-bolder mb-3">Selecione o dia</h1>
                        <p class="lead fw-normal">
                            <v-date-picker v-model="date" color="blue" :min-date="new Date()" @dayclick="selected"
                                href="#horarios" v-smooth-scroll />
                        </p>
                    </div>
                    <listagem class="col-lg-6" :date="selectedDate" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import 'v-calendar/dist/style.css';
import listagem from './shared/listas/horarios.vue'

import { computed, ref } from 'vue'
import { useStore } from 'vuex'
import { Actions } from '@/core/enums';
import { State } from '@/core/interfaces';

const store = useStore()
const state: State = store.state
const date = null;
const selectedDate = ref<string>('')

const barbeiro = computed(()
    : number =>
    state.barbeiro.id
)

const selected = (e: any)
    : void => {
    if (!e.isDisabled) {
        selectedDate.value = e.id
        store.dispatch(Actions.alteraDiaSelecionado, e.day)
    }
}
</script>