<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { userSidebar } from '@/view/Composables/GlobalData';

userSidebar.value = false;

const props = defineProps(['data']);

</script>

<template>
    <Head title="Уведомления"></Head>

    <div class="userPageNotifications">
        <div class="header">
            <h2>Уведомления (5)</h2> <Button class="textStyle blackText" label="Очистить список" />
        </div>
        <div class="list">

            <div class="item">
                <span class="new"></span>
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

            <div class="item">
                <span class="new"></span>
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

            <div class="item">
                <span class="new"></span>
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

            <div class="item">
                <span class="new"></span>
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

            <div class="item">
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

            <div class="item">
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

            <div class="item">
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

            <div class="item">
                <span class="close">
                    <Button class="nostyle">
                        <template #icon>
                            <i class="p-button-icon material-symbols-outlined">close</i>
                        </template>
                    </Button>
                </span>
                <div class="notification">
                    Специалист <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link> ответил на ваш вопрос <Link>«Проблемы с животом»</Link>
                </div>
                <div class="date">1 минуту назад</div>
            </div>

        </div>
    </div>
</template>

<style lang="scss">

.userPageNotifications {
    display: flex;
    flex-direction: column;
    gap: 20px;

    .header {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .list {
        display: flex;
        flex-direction: column;
        gap: 20px;

        .item {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid rgba(240, 240, 240, 1);
            background: rgba(248, 248, 248, 1);

            .notification, .notification a {
                font-weight: 400;
                font-size: 20px;
                color: rgba(43, 42, 41, 1);
            }

            .date {
                font-weight: 400;
                font-size: 20px;
                color: rgba(43, 42, 41, 0.5);
            }

            .close {
                position: absolute;
                top: 35px;
                right: 35px;
                display: flex;
                align-items: center;
                justify-content: center;

                button {

                    i {
                        font-weight: 400;
                        font-size: 24px;
                        color: rgba(0, 0, 0, 1);
                    }
                }
            }

            .new {
                position: absolute;
                top: -8px;
                left: -8px;
                display: flex;
                width: 15px;
                height: 15px;
                border-radius: 15px;
                background: rgba(255, 54, 60, 1);
            }
        }
    }
}
</style>
