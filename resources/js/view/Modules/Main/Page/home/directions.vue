<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const Directions = [
    { label: 'Медицина', image: '/storage/images/directions/med.png', url: route('main.questions.index', { direction: 1 }) },
    { label: 'Юриспруденция', image: '/storage/images/directions/ur.png', url: route('main.questions.index', { direction: 2 }) },
    { label: 'Бухгалтерия', image: '/storage/images/directions/buh.png', url: route('main.questions.index', { direction: 3 }) },
    { label: 'Ветеринария', image: '/storage/images/directions/vet.png', url: route('main.questions.index', { direction: 4 }) },
    { label: 'Госзаказы', image: '/storage/images/directions/gos.png', url: route('main.questions.index', { direction: 5 }) },
    { label: 'Другое', image: '/storage/images/directions/other.png' },
]
</script>

<template>
    <div class="homeDirections">
        <Link v-for="item in Directions" :href="item.url" class="item">
            <img v-if="item.image" :src="item.image" :alt="item.label" :title="item.label">
            <Chip class="white f-16" :label="'12 245 вопросов'" />
            {{ item.label }}
        </Link>
    </div>
</template>

<style lang="scss" scoped>
.homeDirections {
    display: flex;
    gap: 20px;
    width: 100%;

    .item {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: start;
        gap: 30px;
        width: 236px;
        height: 300px;
        border-radius: 15px;
        padding: 20px;
        text-decoration: none;
        font-size: 20px;
        font-weight: 600;
        color: rgba(255, 255, 255, 1);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(43, 42, 41, 0.4) 100%);
        overflow: hidden;

        img {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    }
}
</style>
