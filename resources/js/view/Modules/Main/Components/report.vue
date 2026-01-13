<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { User, checkAuthor } from '@/view/Composables/GlobalData';
const props = defineProps(['item']);


</script>

<template>
    <div class="report">
        <Button v-if="!checkAuthor(props.item.user_id)" class="item">
            <template #default>
                <div>
                    <i class="p-button-icon material-symbols-outlined">error</i>
                    <span>Пожаловаться</span>
                </div>
            </template>
        </Button>
    </div>
</template>

<style lang="scss">
.report {
    display: flex;
    align-items: center;
    gap: 5px;

    .item {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 9px;
        height: 35px;
        border-radius: 10px;
        background: rgba(248, 248, 248, 1);
        border: 1px solid rgba(238, 238, 238, 1);

        & > div {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;

            i {
                width: 15px;
                height: 15px;
                font-size: 15px;
                color: rgba(43, 42, 41, 1);
            }

            span {
                font-weight: 500;
                font-size: 16px;
                color: rgba(43, 42, 41, 1);
            }
        }
    }
}
</style>
