<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Favorite from '@/view/Modules/Main/Components/favorite.vue';

const props = defineProps(['item','view']);

</script>

<template>
    <div class="itemSpecialist">
        <div class="photo" style="background: url(/storage/images/specialists/1.png) no-repeat center / cover">
            <favorite />
        </div>
        <div class="data">
            <div class="header">
                <div class="info">
                    <Link :href="route('main.specialists.view')" class="name">
                        <h3>Долгова Елена Борисовна</h3>
                    </Link>
                    <div class="online">
                        <span>Сейчас онлайн</span>
                        <span class="status active"></span>
                    </div>
                </div>
                <div>
                    <Link class="direction">Медицина</Link> ·
                    <Link class="specialization">Гастроэнтеролог</Link>,
                    <Link class="specialization">Терапевт</Link>,
                    <Link class="specialization">Диетолог</Link>
                </div>
            </div>
            <div class="body">
                <div class="statistic">
                    <div class="item">
                        <div class="value">
                            <i class="p-button-icon material-symbols-outlined green">forum</i>
                            <span>200</span>
                        </div>
                        <span class="name">Консультаций</span>
                    </div>
                    <div class="item">
                        <div class="value">
                            <i class="p-button-icon material-symbols-outlined green">help</i>
                            <span>12 432</span>
                        </div>
                        <span class="name">Ответов</span>
                    </div>
                    <div class="item">
                        <div class="value">
                            <i class="p-button-icon material-symbols-outlined green">star_rate</i>
                            <span>45</span>
                        </div>
                        <span class="name">Отзывов</span>
                    </div>
                    <div class="item">
                        <div class="value">
                            <i class="p-button-icon material-symbols-outlined green">sentiment_satisfied</i>
                            <span>4.6</span>
                        </div>
                        <span class="name">Рейтинг</span>
                    </div>
                    <div class="item">
                        <div class="value">
                            <i class="p-button-icon material-symbols-outlined green">timer</i>
                            <span>30 мин</span>
                        </div>
                        <span class="name">Время ответа</span>
                    </div>
                </div>
                <div class="info">
                    <div class="row">
                        <span class="name">Образование:</span>
                        <span>1985-1992, АГМУ, лечебный факультет. Гастроэнтеролог, диетолог</span>
                    </div>
                    <div class="row">
                        <span class="name">Общий стаж:</span>
                        <span>10 лет</span>
                    </div>
                    <div class="row">
                        <span class="name">Город:</span>
                        <span>Москва</span>
                    </div>
                </div>
            </div>
            <div class="footer">
                <Button class="darkgreen" label="Онлайн консультация 500 ₽" />
                <Button class="grey" v-if="props.view" label="Поблагодарить специалиста" />
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.itemSpecialist {
    display: flex;
    gap: 30px;
    width: 100%;
    padding: 10px;
    border-radius: 15px;
    background: rgba(248, 248, 248, 1);
    border: 1px solid rgba(240, 240, 240, 1);

    .photo {
        display: flex;
        justify-content: right;
        align-items: start;
        width: 350px;
        height: 400px;
        border-radius: 10px;
        padding: 10px;
    }

    .data {
        display: flex;
        flex-direction: column;
        gap: 23px;
        flex-grow: 1;
        padding: 20px 30px 20px 0;

        .header {
            display: flex;
            flex-direction: column;
            gap: 5px;


            .info {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: nowrap;
                gap: 10px;

                .name {
                    text-decoration: none;
                }

                .online {
                    display: flex;
                    align-items: center;
                    gap: 10px;

                    span {
                        font-weight: 600;
                        font-size: 20px;
                        color: rgba(43, 42, 41, 1);
                    }

                    .status {
                        display: flex;
                        width: 12px;
                        height: 12px;
                        border-radius: 50px;
                        background: rgba(209, 209, 209, 1);

                        &.active {
                            background: rgba(102, 176, 17, 1);
                        }
                    }
                }
            }

            .direction {
                font-weight: 600;
                font-size: 16px;
                color: rgba(0, 0, 0, 1);
            }

            .specialization {
                font-weight: 600;
                font-size: 14px;
                color: rgba(0, 0, 0, 1);
            }
        }

        .body {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .statistic {
                display: flex;
                justify-content: space-between;
                gap: 10px;
                border-radius: 10px;
                padding: 20px;
                background: rgba(255, 255, 255, 1);

                .item {
                    display: flex;
                    flex-direction: column;
                    align-items: start;

                    .value {
                        display: flex;
                        align-items: center;
                        gap: 5px;

                        i {
                            font-variation-settings: 'FILL' 1;
                            font-size: 20px;
                        }

                        span {
                            font-weight: 600;
                            font-size: 25px;
                        }
                    }

                    .name {
                        font-weight: 400;
                        font-size: 16px;
                        color: rgba(0, 0, 0, 1);
                    }
                }
            }

            .info {
                display: flex;
                flex-direction: column;
                gap: 10px;
                border-radius: 10px;
                padding: 20px;
                background: rgba(255, 255, 255, 1);

                .row {
                    display: flex;
                    justify-content: space-between;
                    gap: 10px;

                    span {
                        font-weight: 500;
                        font-size: 16px;
                        color: rgba(0, 0, 0, 1);

                        &.name {
                            font-weight: 400;
                        }
                    }
                }
            }
        }

        .footer {
            display: flex;
            gap: 10px;

            button {
                flex-grow: 1;
            }
        }
    }
}
</style>
