<template>
    <div id="horarios">
        <div class="container text-white">
            <h1 class="fw-bolder mb-3 text-center">
                Horarios Disponiveis
            </h1>
            <div v-if="date" class="row">
                <p v-if="agendados > 0">
                    Você já possui horario agendado
                </p>
                <p v-else-if="disponiveis.length == 0">
                    Não existe mais horario disponivel para essa data
                </p>
                <div v-else v-for="(horario, i) in disponiveis" :key="i" class="col-4 col-lg-3 col-xl-2">
                    <horario :horario="horario" :date="date" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import horario from '../buttons/horario.vue'
import { busca } from '@/core/functions'
import { computed, ref, watch } from 'vue'
import { useStore } from 'vuex'
import { Barbeiro, Pendente, State } from '@/core/interfaces'
import { Actions } from '@/core/enums'
const store = useStore()
const state: State = store.state

const props = defineProps({
    date: {
        type: String,
        required: true
    }
})

const disponiveis = ref<string[]>([])
const path: string = 'agendamento'
const action: string = Actions.alteraHorariosAgendados
const today: Date = new Date()

const barbeiro = computed(()
    : Barbeiro =>
    state.barbeiro
)
const diaSelecionado = computed(()
    : number =>
    state.diaSelecionado
)
const pendentes = computed(()
    : Pendente[] =>
    state.horarios.pendentes
)
const agendados = computed(()
    : number =>
    pendentes.value
        .filter(pend => pend.agendado)
        .length
)

watch((): string => props.date,
    (): void => geraHorarios())
watch((): number => barbeiro.value.id,
    (): void => geraHorarios())

const geraHorarios = ()
    : void => {
    if (agendados.value > 0 ||
        pendentes.value.length >= 3) return;

    const ini = barbeiro.value.horario_inicio.slice(0, 5)
    const fim = barbeiro.value.horario_fim.slice(0, 5)
    let horarios = [ini]
    let espaco = 30
    let horario = ini
    let hora, minuto, newDate = null
    while (horario < fim) {
        newDate = new Date(new Date(props.date + 'T' + ini)
            .setMinutes(espaco))
        hora = newDate.getHours()
        if (hora < 10) hora = '0' + hora
        minuto = newDate.getMinutes()
        if (minuto < 10) minuto = '0' + minuto

        horario = hora + ':' + minuto
        horarios.push(horario)
        espaco += 30
    }

    if (today.getDate() == diaSelecionado.value) {
        let hora = today.getHours()
        let horaAtual = `${hora < 10 ? '0' + hora : hora}:${today.getMinutes()}`
        disponiveis.value = horarios.filter(hora => horaAtual < hora)
    } else {
        disponiveis.value = horarios
    }

    if (disponiveis.value.length > 0)
        busca(path, action, store)
}
</script>