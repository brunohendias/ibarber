<template>
    <button type="submit" class="btn btn-sm btn-danger" @click="logout">
        Sair
    </button>
</template>

<script setup lang="ts">
import { logout } from '@/core/auth'
</script>