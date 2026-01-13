<script setup>
import { getComponent } from '@/view/Composables/Modules';
import { Layout } from './Layouts/index';

const props = defineProps(['data', 'page']);

const Page = getComponent('Admin', props.page);

</script>

<template>
    <Layout>
        <Page :data="props.data" />
    </Layout>
</template>

<style lang="scss">
    @use './Css/app.scss';
</style>
