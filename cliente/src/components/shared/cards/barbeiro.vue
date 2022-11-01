<template>
    <div class="card">
        <img src="@/assets/imgs/card/padrao.jpg" />
        <div class="card-body">
            <p>
                <strong>Nome: </strong>
                {{ options.nome }}
            </p>
            <p>
                <strong>Cidade: </strong>
                {{ options.cidade }}
            </p>
            <p>
                <strong>Rua: </strong>
                {{ options.rua }} -
                {{ options.numero }}
            </p>
            <p>
                <strong>Bairro: </strong>
                {{ options.bairro }}
            </p>
            <p>
                <strong>CEP: </strong>
                {{ options.cep }}
            </p>
        </div>
        <div class="card-footer border-top-0 bg-transparent">
            <div class="text-center">
                <solicitarHorario v-if="options.semAgenda" :barbeiro="options.id" />
                <horarioDisponivel v-else :options="options" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import horarioDisponivel from '../buttons/horario-disponivel.vue'
import solicitarHorario from '../buttons/solicitarHorario.vue'

defineProps({
    options: {
        type: Object,
        required: true
    }
})
</script>

<style scoped lang="css">
.card {
    flex: none;
    margin: 10px;
    width: 220px;
}
</style>