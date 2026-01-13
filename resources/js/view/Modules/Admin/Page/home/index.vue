<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
const props = defineProps(['data']);
</script>

<template>
    <Head title="Админ панель"></Head>
    {{ props.data }}
</template>

<style lang="scss"></style>
