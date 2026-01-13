<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { checkAuthor } from '@/view/Composables/GlobalData';

const props = defineProps(['item', 'label']);
</script>

<template>
    <Link class="editArticles" :href="route('user.articles.edit', { article: props.item.id })" v-if="checkAuthor(props.item.user_id)">
        <i class="p-button-icon material-symbols-outlined">edit</i>
        <span v-if="props.label">{{ props.label }}</span>
    </Link>
</template>

<style lang="scss">

.editArticles {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 9px;
    gap: 10px;
    border-radius: 15px;
    background: rgba(43, 42, 41, 1);
    border: 1px solid rgba(236, 236, 236, 1);
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
