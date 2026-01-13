<script setup lang="ts">
import Specialist from '@/view/Modules/Main/Components/Specialists/listShortItem.vue'
</script>

<template>
    <div class="rightBar">
        <div class="rightSpecialistsList">
            <h4>Топ специалистов</h4>
            <Specialist />
            <Specialist />
            <Specialist />
            <Specialist />
            <Specialist />
        </div>
    </div>
</template>

<style lang="scss">
.rightBar {
    display: flex;
    gap: 100px;
    width: 300px;
    min-width: 300px;

    .rightSpecialistsList {
        display: flex;
        flex-direction: column;
        gap: 30px;

    }
}
</style>
