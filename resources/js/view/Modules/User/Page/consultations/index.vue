<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { userSidebar } from '@/view/Composables/GlobalData';

userSidebar.value = false;

const props = defineProps(['data']);
</script>

<template>
    <Head title="Консультации"></Head>
    {{ props.data }}
</template>

<style lang="scss"></style>
