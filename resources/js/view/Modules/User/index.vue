<script setup lang="ts">
import { getComponent } from "@/view/Composables/Modules";
import { Layout } from '../Main/Layouts/index';
import { Layout as userLayout } from './Layouts/index';

const props = defineProps(['data', 'page']);

const Page = getComponent('User', props.page);

</script>

<template>
    <Layout>
        <userLayout>
            <Page :data="props.data" />
        </userLayout>
    </Layout>
</template>

<style lang="scss">
@use '@/view/Css/app';
@use './Css/layout';
</style>
