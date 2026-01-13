<script setup lang="ts">
const props = defineProps(['label']);

</script>

<template>
    <div class="noContent">
        <span class="p-button-icon material-symbols-outlined">sentiment_dissatisfied</span>
        <span>{{ props.label ? props.label : 'Пусто' }}</span>
    </div>
</template>

<style lang="scss">
.noContent {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    width: 100%;
    padding: 25px;
    border-radius: 15px;
    background: rgba(248, 248, 248, 1);

    & > span {
        font-weight: 500;
        font-size: 20px;
        color: rgba(43, 42, 41, 0.4);

    }
}
</style>
