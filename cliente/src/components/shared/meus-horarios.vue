<template>
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="meus-horarios" data-bs-toggle="dropdown"
            aria-expanded="false">
            Meus horarios
        </button>
        <ul class="dropdown-menu" aria-labelledby="meus-horarios">
            <horariosAgendado />
            <hr>
            <horariosPendente />
        </ul>
    </div>
</template>

<script setup lang="ts">
import horariosAgendado from './listas/horariosAgendado.vue';
import horariosPendente from './listas/horariosPendente.vue';
</script>