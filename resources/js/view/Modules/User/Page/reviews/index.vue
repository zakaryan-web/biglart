<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Review from '@/view/Modules/Main/Components/Reviews/listItem.vue';
import { userSidebar } from '@/view/Composables/GlobalData';

userSidebar.value = true;

const props = defineProps(['data']);
</script>

<template>
    <Head title="Отзывы"></Head>
    <div class="userPageReviews">
        <h2>Отзывы</h2>
        <div class="list">
            <Review :item="{ rating: 1}" />
            <Review :item="{ rating: 5}" />
            <Review :item="{ rating: 3}" />
            <Review :item="{ rating: 4}" />
            <Review :item="{ rating: 2}" />
            <Review :item="{ rating: 3}" />
        </div>
    </div>
</template>

<style lang="scss">
.userPageReviews {
    display: flex;
    flex-direction: column;
    gap: 20px;

    .list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
}

</style>
