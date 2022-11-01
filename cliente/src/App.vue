<template>
	<div id="app">
		<Navbar v-if="checkAutenticated()" />
		<router-view />
	</div>
</template>

<script setup lang="ts">
import Navbar from './components/Navbar.vue'
import { authenticated } from './core/auth'

const checkAutenticated = (): boolean => authenticated
</script>

<style>
body {
	overflow-x: hidden
}
</style>