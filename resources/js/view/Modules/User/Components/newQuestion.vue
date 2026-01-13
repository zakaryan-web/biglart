<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="newQuestion">
        <Link :href="route('user.questions.create')">
            <i class="p-button-icon material-symbols-outlined">add</i>
            <span>Задать вопрос</span>
        </Link>
    </div>
</template>

<style lang="scss">

.newQuestion {
    display: flex;
    flex-grow: 1;

    a {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1;
        gap: 20px;
        border-radius: 15px;
        border: 2px dashed rgba(224, 224, 224, 1);
        padding: 30px;
        background: rgba(248, 248, 248, 1);
        text-decoration: none;

        span {
            font-weight: 400;
            font-size: 20px;
            color: rgba(43, 42, 41, 1);
        }

        i {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            gap: 10px;
            border-radius: 15px;
            padding: 10px 20px;
            background: rgba(232, 78, 39, 1);
            color: rgba(255, 255, 255, 1);
            font-size: 24px;
        }

        &:hover {
            background: rgba(251, 231, 226, 1);
            border-color: rgba(232, 78, 39, 1);
        }
    }
}

</style>
