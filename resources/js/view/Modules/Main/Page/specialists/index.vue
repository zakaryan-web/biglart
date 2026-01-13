<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import NoContent from '@/view/Modules/Main/Components/noContent.vue';
import Specialist from '@/view/Modules/Main/Components/Specialists/listItem.vue';
import RightBar from '@/view/Modules/Main/Layouts/Components/rightBar.vue';

const props = defineProps(['data']);

</script>

<template>
    <Head title="Специалисты"></Head>
    <div class="pageSpecialist">
        <h2>Специалисты (всего 1309)</h2>
        <div class="filters">

        </div>

        <div class="list">
            <Specialist />
            <Specialist />
            <Specialist />
            <Specialist />
            <Specialist />
            <Specialist />
            <Specialist />
            <noContent v-if="false" />
        </div>
    </div>
    <RightBar />
</template>

<style lang="scss">

.pageSpecialist {
    display: flex;
    flex-direction: column;
    gap: 30px;
    flex-grow: 1;

    .list {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }
}
</style>
