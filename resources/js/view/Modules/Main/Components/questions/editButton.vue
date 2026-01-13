<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { checkAuthor } from '@/view/Composables/GlobalData';

const props = defineProps(['item', 'label']);
</script>

<template>
    <Link class="editQuestions" :href="route('user.questions.edit', { question: props.item.id })" v-if="checkAuthor(props.item.user_id) && props.item.status != 2 && !props.item.answers_count">
        <i class="p-button-icon material-symbols-outlined">edit</i>
        <span v-if="props.label">Редактировать</span>
    </Link>
</template>

<style lang="scss">

.editQuestions {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 9px;
    gap: 10px;
    border-radius: 15px;
    background: rgba(232, 78, 39, 1);
    text-decoration: none;

    i {
        width: 20px;
        height: 20px;
        font-size: 20px;
        color: rgba(255, 255, 255, 1);
    }

    span {
        font-weight: 500;
        font-size: 20px;
        color: rgba(255, 255, 255, 1);
    }
}
</style>
