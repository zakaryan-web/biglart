<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
const props = defineProps(['status']);

</script>

<template>
    <Head :title="'Ошибка ' + props.status "></Head>
    <div class="gap-4 w-full h-full flex-col flex items-center justify-center">
        <h1>{{ props.status }}</h1>
    </div>
</template>
