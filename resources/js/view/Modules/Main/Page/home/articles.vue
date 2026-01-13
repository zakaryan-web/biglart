<script setup lang="ts">
import Article from '@/view/Modules/Main/Components/articles/listShortItem.vue'

</script>

<template>
    <div class="list">
        <Article />
        <Article />
        <Article />
        <Article />
    </div>
</template>

<style lang="scss" scoped>
.list {
    display: flex;
    gap: 20px;
    width: 100%;
}
</style>
