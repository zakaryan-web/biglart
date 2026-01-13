<script setup lang="ts">
import { getComponent } from "@/view/Composables/Modules";
import { Layout } from './Layouts/index';

const props = defineProps(['data', 'page']);

const Page = getComponent('Auth', props.page);

</script>

<template>
    <Layout>
        <Page :data="props.data" />
    </Layout>
    <Toast />
</template>

<style lang="scss">
@use '@/view/Css/app';
@use './Css/layout';
</style>
