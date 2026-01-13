<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import actions from '@/view/Modules/Main/Components/actions.vue';
import favorite from '@/view/Modules/Main/Components/favorite.vue';
import Status from '@/view/Modules/Main/Components/status.vue';

const props = defineProps(['item', 'specialist']);
</script>

<template>
    <div class="itemShortArticles">
        <div class="header" style="background: url(/storage/images/articles/images.png) no-repeat center / cover">
            <favorite />
        </div>
        <div class="body">
            <div class="content">
                <Link :href="route('main.articles.view')">
                    <span>Как понять результаты общего анализа крови Как понять результаты общего анализа крови</span>
                </Link>
                <div class="shortDesc">Что есть, что исключить и зачем пить воду перед исследованием. Что есть, что исключить и зачем пить воду перед исследованием.</div>
            </div>
            <div class="footer">
                <div class="author" v-if="!props.specialist">
                    <Avatar image="/storage/images/avatars/1.png" shape="circle" class="avatar" />
                    <Link :href="route('main.specialists.view')" class="name">Соколова Наталья Викторовна</Link>
                </div>
                <actions :item="{
                    comments_count: 0,
                    likes_count: 0,
                    reposts_count: 0
                }" />
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.itemShortArticles {
    display: flex;
    flex-direction: column;
    width: 365px;
    border-radius: 15px;
    background: rgba(251, 251, 251, 1);
    border: 1px solid rgba(231, 231, 231, 1);
    overflow: hidden;

    & > .header {
        display: flex;
        justify-content: right;
        align-items: start;
        width: 365px;
        height: 150px;
        gap: 10px;
        padding: 10px;
        border-radius: 15px 15px 0 0;
    }

    & > .body {
        display: flex;
        flex-direction: column;
        gap: 35px;
        padding: 30px;

        & > .content {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin: 0;
            padding: 0;
            gap: 10px;

            a {
                display: flex;
                text-decoration: none;

                span {
                    font-weight: 700;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 1);
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
            }

            .shortDesc {
                display: flex;
                font-weight: 400;
                font-size: 16px;
                color: rgba(43, 42, 41, 0.5);
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }
        }

        & > .footer {
            display: flex;
            flex-direction: column;
            gap: 20px;

            .author {
                display: flex;
                align-items: center;
                gap: 10px;

                .avatar {
                    width: 26px;
                    height: 26px;
                }

                .name {
                    font-weight: 500;
                    font-size: 16px;
                    color: rgba(43, 42, 41, 1);
                    text-decoration: none;
                }
            }
        }
    }
}
</style>
