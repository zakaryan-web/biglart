<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Favorite from '@/view/Modules/Main/Components/favorite.vue';
import Report from '@/view/Modules/Main/Components/report.vue';
import Actions from '@/view/Modules/Main/Components/actions.vue';
import RightBar from '@/view/Modules/Main/Layouts/Components/rightBar.vue';

const props = defineProps(['data']);
</script>

<template>
    <Head title="Статья"></Head>
    <div class="pageArticle">
        <div class="headerArticle">
            <h2>Как понять результаты общего анализа крови</h2>
            <div class="data">
                <div class="photo" style="background: url(/storage/images/articles/images.png) no-repeat center / cover">
                    <favorite />
                </div>
                <div class="info">
                    <div class="header">
                        <div class="field">
                            <div class="left">Дата публикации:</div>
                            <div class="right">20 июля 2025</div>
                        </div>
                        <div class="field">
                            <div class="left">Время чтения:</div>
                            <div class="right">7 мин</div>
                        </div>
                        <div class="field">
                            <div class="left">Автор:</div>
                            <div class="right">
                                <Link :href="route('main.specialists.view')">Соколова Наталья Викторовна</Link>
                                <Avatar image="/storage/images/avatars/1.png" shape="circle" class="avatar" />
                            </div>
                        </div>
                        <div class="field">
                            <div class="left">Направление:</div>
                            <div class="right">
                                <Link class="name">Медицина</Link>
                            </div>
                        </div>
                        <div class="field">
                            <div class="left">Специализация:</div>
                            <div class="right">
                                <Link>Гастроэнтерология</Link>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <actions :item="{
                            comments_count: 0,
                            likes_count: 0,
                            reposts_count: 0,
                            view_count: 0
                        }" />
                        <Report :item="{ user_id: 0 }" />
                    </div>
                </div>
            </div>
        </div>

        <div class="bodyArticle">
            <p>Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </p>
            <p>Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </p>
            <p>Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </p>
        </div>

        <div class="footerArticle">
            <actions :item="{
                            comments_count: 0,
                            likes_count: 0,
                            reposts_count: 0,
                            view_count: 0
                        }" />
            <Report :item="{ user_id: 0 }" />
        </div>

        <div class="comments">
            <div class="headerComments">
                <h2>Комментарии (5)</h2>
                <div class="form">
                    <Textarea class="grey" placeholder="Написать свой комментарий" rows="5"></Textarea>
                    <Button class="black f-16" label="Отправить">
                        <template #icon>
                            <span class="p-button-icon p-button-icon-right material-symbols-outlined">send</span>
                        </template>
                    </Button>
                </div>
            </div>

            <div class="listComments">
                <div class="item">
                    <section class="data">
                        <div class="name">
                            <Avatar image="/storage/images/avatars/1.png" shape="circle" class="avatar" />
                            <Link>Соколова Наталья Викторовна</Link>
                        </div>
                        <div class="date">10 минут назад</div>
                    </section>
                    <section>
                        adsdsdasd asddsd sd sad
                    </section>
                </div>
                <div class="item">
                    <section class="data">
                        <div class="name">
                            <Avatar image="/storage/images/avatars/1.png" shape="circle" class="avatar" />
                            <Link>Соколова Наталья Викторовна</Link>
                        </div>
                        <div class="date">10 минут назад</div>
                    </section>
                    <section>
                        adsdsdasd asddsd sd sad
                    </section>
                </div>
                <div class="item">
                    <section class="data">
                        <div class="name">
                            <Avatar image="/storage/images/avatars/1.png" shape="circle" class="avatar" />
                            <Link>Соколова Наталья Викторовна</Link>
                        </div>
                        <div class="date">10 минут назад</div>
                    </section>
                    <section class="body">
                        adsdsdasd asddsd sd sad
                    </section>
                </div>
            </div>
        </div>
    </div>
    <RightBar />
</template>

<style lang="scss">

.pageArticle {
    display: flex;
    flex-direction: column;
    gap: 40px;
    flex-grow: 1;

    .headerArticle {
        display: flex;
        flex-direction: column;
        gap: 20px;

        .data {
            display: flex;
            align-items: start;
            gap: 20px;

            .photo {
                display: flex;
                align-items: start;
                justify-content: right;
                gap: 20px;
                width: 350px;
                height: 230px;
                border-radius: 15px;
                padding: 10px;
            }

            .info {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                gap: 20px;

                .header {
                    display: flex;
                    flex-direction: column;
                    gap: 5px;
                    border-radius: 5px;
                    padding: 20px;
                    background: rgba(248, 248, 248, 1);

                    .field {
                        display: flex;
                        justify-content: space-between;
                        gap: 20px;

                        .left {
                            font-weight: 400;
                            font-size: 20px;
                            color: rgba(43, 42, 41, 0.5);
                        }

                        .right {
                            display: flex;
                            align-items: center;
                            gap: 5px;
                            font-weight: 500;
                            font-size: 20px;
                            color: rgba(43, 42, 41, 1);

                            a {
                                font-weight: 500;
                                font-size: 20px;
                                color: rgba(43, 42, 41, 1);
                            }

                            .avatar {
                                width: 20px;
                                height: 20px;
                            }
                        }
                    }
                }

                .footer {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 20px;
                }
            }
        }
    }

    .bodyArticle {
        display: flex;
        flex-direction: column;
        gap: 20px;

        p {
            font-weight: 400;
            font-size: 20px;
            color: rgba(43, 42, 41, 1);
        }
    }

    .footerArticle {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding-top: 40px;
        border-top: 1px solid rgba(231, 231, 231, 1);
    }

    .comments {
        display: flex;
        flex-direction: column;
        gap: 30px;

        .headerComments {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .form {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
        }

        .listComments {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .item {
                display: flex;
                flex-direction: column;
                gap: 20px;
                border-radius: 15px;
                padding: 20px;
                background: rgba(248, 248, 248, 1);

                .data {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 20px;

                    .name {
                        display: flex;
                        align-items: center;
                        gap: 10px;

                        a {
                            font-weight: 700;
                            font-size: 20px;
                            color: rgba(43, 42, 41, 1);
                            text-decoration: none;
                        }

                        .avatar {
                            width: 30px;
                            height: 30px;
                        }
                    }

                    .date {
                        font-weight: 500;
                        font-size: 16px;
                        color: rgba(43, 42, 41, 1);
                    }
                }

                .body {
                    font-weight: 500;
                    font-size: 16px;
                    color: rgba(43, 42, 41, 1);
                }
            }
        }
    }
}

</style>
