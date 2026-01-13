<script setup lang="ts">
import Question from '@/view/Modules/Main/Components/questions/listItem.vue'
const props = defineProps(['questions']);

</script>

<template>
    <div class="list">
        <Question v-for="item in props.questions" :item="item" />
    </div>
</template>

<style lang="scss" scoped>
.list {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
}
</style>
