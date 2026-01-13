<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { userSidebar } from '@/view/Composables/GlobalData';

userSidebar.value = true;

const props = defineProps(['data']);
</script>

<template>
    <Head title="Рефералы"></Head>
    <div class="userPageFinance">
        <div class="header">
            <div class="info">
                <div class="infoBlock">
                    <span class="title">Ваш общий реферальный баланс</span>
                    <div class="data">
                        <span>0.00 ₽</span>
                    </div>
                </div>
            </div>
            <div class="actions">
                <span>Вывести средства можно в разделе <Link :href="route('user.finance.index')">Баланс</Link></span>
            </div>
        </div>

        <section>
            <h2>Рефералы</h2>
            <div class="filed">
                <div class="column">
                    <div class="line">
                        <div class="info">
                            <span class="title">Приведено клиентов</span>
                            <div class="data">
                                <span>0</span>
                            </div>
                        </div>
                        <div class="info">
                            <span class="title">Заработано с клиентов</span>
                            <div class="data">
                                <span>0.00 ₽</span>
                            </div>
                        </div>
                        <Button class="pearl" label="Скопировать ссылку для приглашения" fluid>
                            <template #icon>
                                <i class="p-button-icon material-symbols-outlined">content_copy</i>
                            </template>
                        </Button>
                    </div>
                </div>
                <div class=column>
                    <div class="line">
                        <div class="info">
                            <span class="title">Приведено специалистов</span>
                            <div class="data">
                                <span>0</span>
                            </div>
                        </div>
                        <div class="info">
                            <span class="title">Заработано со специалистов</span>
                            <div class="data">
                                <span>0.00 ₽</span>
                            </div>
                        </div>
                        <Button class="grey" label="Скопировать ссылку для приглашения" fluid>
                            <template #icon>
                                <i class="p-button-icon material-symbols-outlined">content_copy</i>
                            </template>
                        </Button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2>Виджет на сайт</h2>
            <div class="filed">
                <div class="column">
                    <div class="line">
                        <h4>Если у вас есь сайт, вы можете скопирать наш виджет. Просто вставьте код ниже на ваш сайт</h4>
                        <Textarea rows="5" fluid>
                            @media not all and (hover: hover) {
                              abbr::after {
                                content: " (" attr(title) ")";
                              }
                            }
                        </Textarea>
                        <Button class="black" label="Скопировать код">
                            <template #icon>
                                <i class="p-button-icon material-symbols-outlined">content_copy</i>
                            </template>
                        </Button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2>Как это работает?</h2>
            <div class="filed">
                <div class="column">
                    <div class="line">
                        <h4>Приглашённые клиенты</h4>
                        <span>Если у вас есть знакомый, у которого есть вопрос, вы можете скопировать ссылку и отправить ему. За каждый заданный платный вопрос вашим приведённым клиентом, вы будете получать 3% от стоимости его вопроса.</span>
                    </div>
                    <div class="line">
                        <h4>Приглашённые специалисты</h4>
                        <span>Если у вас есть знакомый специалист, вы можете скопировать ссылку и отправить ему. За каждый выигранный им ответ, вы будете получать 3%, от суммы вопроса или приватной консультации.</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<style lang="scss" scoped>
.userPageFinance {
    display: flex;
    flex-direction: column;
    gap: 50px;
    width: 100%;

    .header {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 25px;
        width: 100%;

        .info {
            display: flex;
            gap: 20px;
        }

        .actions {
            display: flex;
            gap: 20px;

            span {
                font-weight: 500;
                font-size: 20px;
                color: rgba(43, 42, 41, 1);

                a {
                    font-weight: 500;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 1);
                }
            }
        }
    }

    section {
        display: flex;
        flex-direction: column;
        gap: 20px;

        .filed {
            display: flex;
            gap: 20px;

            .column {
                display: flex;
                flex-direction: column;
                gap: 30px;
                flex-grow: 1;
                border-radius: 15px;
                padding: 30px;
                background: rgba(248, 248, 248, 1);

                .line {
                    display: flex;
                    flex-direction: column;
                    gap: 20px;

                    & > span {
                        font-weight: 400;
                        font-size: 20px;
                        color: rgba(43, 42, 41, 1);
                    }

                    .info {
                        display: flex;
                        flex-direction: column;
                        gap: 10px;

                        .title {
                            font-weight: 500;
                            font-size: 20px;
                        }

                        .data {
                            display: flex;
                            align-items: center;
                            gap: 10px;

                            .icon {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 35px;
                                height: 35px;
                                padding: 3px 7px;
                                border-radius: 15px;
                                background: rgba(255, 255, 255, 0.3);

                                i {
                                    font-size: 20px;
                                    color: rgba(255, 255, 255, 1);
                                }
                            }

                            span {
                                font-weight: 600;
                                font-size: 30px;
                            }
                        }
                    }

                    button {
                        width: 100%;
                    }
                }
            }
        }
    }
}
</style>
