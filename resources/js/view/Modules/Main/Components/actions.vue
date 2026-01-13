<script setup lang="ts">

const props = defineProps(['item', 'grey']);
</script>

<template>
    <div class="actions">
        <Button v-if="typeof props.item.comments_count != 'undefined'" class="item">
            <template #default>
                <div>
                    <i class="p-button-icon material-symbols-outlined">mode_comment</i>
                    <span>{{ props.item.comments_count }}</span>
                </div>
            </template>
        </Button>
        <Button v-if="typeof props.item.likes_count != 'undefined'" class="item">
            <template #default>
                <div>
                    <i class="p-button-icon material-symbols-outlined">thumb_up</i>
                    <span>{{ props.item.likes_count }}</span>
                </div>
            </template>
        </Button>
        <Button v-if="typeof props.item.reposts_count != 'undefined'" class="item">
            <template #default>
                <div>
                    <i class="p-button-icon material-symbols-outlined">reply</i>
                    <span>{{ props.item.reposts_count }}</span>
                </div>
            </template>
        </Button>
        <Button v-if="typeof props.item.favorites_count != 'undefined'" class="item">
            <template #default>
                <div>
                    <i class="p-button-icon material-symbols-outlined">favorite</i>
                    <span>{{ props.item.favorites_count }}</span>
                </div>
            </template>
        </Button>
        <div v-if="typeof props.item.view_count != 'undefined'" class="item">
            <div>
                <i class="p-button-icon material-symbols-outlined">visibility</i>
                <span>{{ props.item.view_count }}</span>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.actions {
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

        &:hover {
            background: rgba(225, 225, 225, 1);
            border: 1px solid rgba(198, 198, 198, 1);
        }

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
