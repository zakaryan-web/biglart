<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import listItem from '@/view/Modules/Main/Components/questions/listItem.vue';
import RightBar from '@/view/Modules/Main/Layouts/Components/rightBar.vue';
import NoContent from '@/view/Modules/Main/Components/noContent.vue';

const props = defineProps(['data']);

</script>

<template>
    <Head title="Вопросы"></Head>
    <div class="pageQuestions">
        <h2>Вопросы (всего {{ props.data.questions.data.length }})</h2>
        <div class="filters">

        </div>
        <div class="list">
            <template v-for="item in props.data.questions.data">
                <listItem :item="item" />
            </template>
            <noContent v-if="props.data.questions.data.length == 0" />
        </div>
    </div>
    <RightBar />
</template>

<style lang="scss">
.pageQuestions {
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
