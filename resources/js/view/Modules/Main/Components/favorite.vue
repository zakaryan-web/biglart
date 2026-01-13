<script setup lang="ts"></script>

<template>
    <Button class="favorite">
        <template #default>
            <i class="p-button-icon material-symbols-outlined">favorite</i>
        </template>
    </Button>
</template>

<style lang="scss" scoped>
.favorite {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    height: auto;
    border-radius: 10px;
    padding: 5px;
    background: rgba(255, 255, 255, 1);
    border: 1px solid rgba(237, 237, 237, 1);

    i {
        width: 15px;
        height: 15px;
        font-size: 15px;
        color: rgba(43, 42, 41, 1);
    }

    &:hover,
    &.active {
        background: rgba(255, 225, 226, 1);
        border: 1px solid rgba(255, 203, 204, 1);

        i {
            font-variation-settings: 'FILL' 1;
            color: rgba(255, 54, 60, 1);
        }
    }
}
</style>
