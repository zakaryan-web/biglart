<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Status from '@/view/Modules/Main/Components/status.vue'
import { userSidebar } from '@/view/Composables/GlobalData';

userSidebar.value = true;

const props = defineProps(['data']);
</script>

<template>
    <Head title="Финансы"></Head>
    <div class="userPageFinance">
        <div class="header">
            <div class="info">
                <div class="infoBlock black">
                    <span class="title">Ваш основной баланс</span>
                    <div class="data">
                        <span class="icon"><i class="p-button-icon material-symbols-outlined">credit_card</i></span>
                        <span>0.00 ₽</span>
                    </div>
                </div>
                <div class="infoBlock">
                    <span class="title">Ваш реферальный баланс</span>
                    <div class="data">
                        <span>500.00 ₽</span>
                    </div>
                </div>
            </div>
            <div class="actions">
                <Button class="orange" label="Пополнить баланс">
                    <template #icon>
                        <i class="p-button-icon material-symbols-outlined">add_2</i>
                    </template>
                </Button>
                <Button class="lightgrey" label="Вывести средства">
                    <template #icon>
                        <i class="p-button-icon material-symbols-outlined">remove</i>
                    </template>
                </Button>
            </div>
        </div>
        <div class="history">
            <h2>История операций</h2>
            <div class="list">
                <div class="header">
                    <span class="date">Дата операции</span>
                    <span class="event">Событие</span>
                    <span class="sum">Сумма</span>
                    <span class="status">Статус</span>
                </div>
                <div class="item" >
                    <div class="date">
                        <span>28.08.2025</span>
                        <span>09:25</span>
                    </div>
                    <div class="event">
                        <span>Покупка пакета откликов</span>
                    </div>
                    <div class="sum">
                        <span class="green">+1500 ₽</span>
                    </div>
                    <Status type="f-16 success" label="Исполнено" />
                </div>
                <div class="item" >
                    <div class="date">
                        <span>28.08.2025</span>
                        <span>09:25</span>
                    </div>
                    <div class="event">
                        <span>Покупка пакета откликов</span>
                    </div>
                    <div class="sum">
                        <span class="green">+1500 ₽</span>
                    </div>
                    <Status type="f-16 moderation" label="На модерации" />
                </div>
                <div class="item" >
                    <div class="date">
                        <span>28.08.2025</span>
                        <span>09:25</span>
                    </div>
                    <div class="event">
                        <span>Покупка пакета откликов</span>
                    </div>
                    <div class="sum">
                        <span class="red">-500 ₽</span>
                    </div>
                    <Status type="f-16 error" label="Отклонено" />
                </div>

            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.userPageFinance {
    display: flex;
    flex-direction: column;
    gap: 50px;

    & > .header {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 25px;

        .info {
            display: flex;
            gap: 20px;
        }

        .actions {
            display: flex;
            gap: 20px;
        }
    }

    .history {
        display: flex;
        flex-direction: column;
        gap: 20px;

        .list {
            display: flex;
            flex-direction: column;
            gap: 20px;

            .header {
                display: flex;
                gap: 50px;
            }

            .header, .item {
                .date, .event, .sum, .status {
                    display: flex;
                    width: 150px;
                    font-weight: 500;
                    font-size: 20px;
                    color: rgba(173, 173, 173, 1);
                }

                .sum, .status {
                    justify-content: right;
                }

                .event {
                    flex-grow: 1;
                }
            }

            .item {
                display: flex;
                gap: 50px;
                padding-bottom: 20px;
                border-bottom: 1px solid rgba(208, 208, 208, 1);

                .date {
                    display: flex;
                    flex-direction: column;
                    font-weight: 400;
                }

                .event {
                    color: rgba(43, 42, 41, 1);
                }

                .sum {

                    .red {
                        font-weight: 500;
                        font-size: 20px;
                        color: rgba(255, 54, 60, 1);
                    }

                    .green {
                        font-weight: 500;
                        font-size: 20px;
                        color: rgba(44, 120, 0, 1);
                    }
                }
            }
        }
    }
}

</style>
