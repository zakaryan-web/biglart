<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import NoContent from '@/view/Modules/Main/Components/noContent.vue';
import Article from '@/view/Modules/Main/Components/articles/listShortItem.vue';

const props = defineProps(['data']);
</script>

<template>
    <Head title="Статьи"></Head>
    <div class="pageArticles">
        <h2>Статьи (всего 1309)</h2>
        <div class="filters">

        </div>

        <div class="list">
            <Article />
            <Article />
            <Article />
            <Article />
            <Article />
            <Article />
            <Article />
            <Article />
            <Article />
            <Article />
            <noContent v-if="false" />
        </div>
    </div>
</template>

<style lang="scss">

.pageArticles {
    display: flex;
    flex-direction: column;
    gap: 30px;
    flex-grow: 1;

    .list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        width: 100%;
    }
}

</style>
