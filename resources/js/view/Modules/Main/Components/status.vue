<script setup lang="ts">
const props = defineProps(['label', 'type']);

</script>

<template>
    <div class="status">
        <Chip :class="props.type" :label="props.label" />
    </div>
</template>

<style lang="scss">
.status {
    display: flex;
    align-items: start;
    gap: 10px;
}
</style>
