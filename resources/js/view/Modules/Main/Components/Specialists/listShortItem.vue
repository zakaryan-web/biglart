<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import favorite from '@/view/Modules/Main/Components/favorite.vue';

const props = defineProps(['item']);

</script>

<template>
    <div class="itemShortSpecialist">
        <div class="header" style="background: url(/storage/images/specialists/1.png) no-repeat center / cover">
            <favorite />
            <div class="online">
                <div class="status"></div>
                <span>Сейчас онлайн</span>
            </div>
        </div>
        <div class="body">
            <div class="title">
                <Link :href="route('main.specialists.view')">Блохина Светлана Викторовна</Link>
            </div>
            <div class="specializations">
                <Link>Ветеринар</Link>
            </div>
            <div class="footer">
                <div class="info">
                    <i class="p-button-icon material-symbols-outlined green">sentiment_satisfied</i>
                    <span>Рейтинг 5.0</span>
                </div>
                <div class="info">
                    <i class="p-button-icon material-symbols-outlined grey">help</i>
                    <span>12 432 ответа</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.itemShortSpecialist {
    display: flex;
    flex-direction: column;
    width: 300px;
    border-radius: 15px;
    background: rgba(248, 248, 248, 1);
    border: 1px solid rgba(237, 237, 237, 1);
    overflow: hidden;

    & > .header {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: end;
        width: 100%;
        height: 300px;
        gap: 10px;
        padding: 10px;

        .favorite {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .online {
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 5px;
            padding: 5px 10px;
            background: rgba(255, 255, 255, 1);

            .status {
                display: flex;
                width: 12px;
                height: 12px;
                border-radius: 100px;
                background: rgba(209, 209, 209, 1);

                &.active {
                    background: rgba(102, 176, 17, 1);
                }
            }

            span {
                display: flex;
                font-weight: 600;
                font-size: 16px;
                color: rgba(43, 42, 41, 1);
            }
        }
    }

    & > .body {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 20px;
        padding: 20px;

        .title {
            a {
                font-weight: 600;
                font-size: 20px;
                text-decoration: none;
                color: rgba(43, 42, 41, 1);
            }
        }

        .specializations {
            a {
                font-weight: 400;
                font-size: 14px;
                color: rgba(43, 42, 41, 1);
            }
        }

        & > .footer {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 10px;

            .info {
                position: relative;
                display: flex;
                align-items: center;
                gap: 5px;
                border-radius: 10px;
                padding: 5px 10px;
                background: rgba(255, 255, 255, 1);

                i {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 15px;
                    height: 15px;
                    font-size: 15px;
                    font-variation-settings: 'FILL' 1;

                    &.green {
                        color: rgba(102, 176, 17, 1);
                    }

                    &.grey {
                        color: rgba(88, 119, 113, 1);
                    }
                }

                span {
                    display: flex;
                    align-items: center;
                    font-weight: 500;
                    font-size: 16px;
                    color: rgba(43, 42, 41, 1);
                }
            }
        }
    }
}
</style>
