<script setup>
import { isHome } from '@/view/Composables/GlobalData.js';
import HomeStats from '@/view/Modules/Main/Layouts/Components/homeStats.vue';

</script>

<template>
    <homeStats />
    <section :class="'content' + (isHome ? ' contentHome' : '')">
        <slot />
    </section>
</template>

<style lang="scss">
.content {
    position: relative;
    display: flex;
    gap: 30px;
    flex-grow: 1;
    width: 1520px;
    padding-top: 150px;

    &.contentHome {
        padding-top: 70px;
    }
}
</style>
