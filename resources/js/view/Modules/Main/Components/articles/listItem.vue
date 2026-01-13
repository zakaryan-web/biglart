<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import actions from '@/view/Modules/Main/Components/actions.vue';
import Status from '@/view/Modules/Main/Components/status.vue';
import Edit from '@/view/Modules/Main/Components/articles/editButton.vue';

const props = defineProps(['item']);

</script>

<template>
    <div class="itemArticles">
        <div class="header">
            <div class="title">
                <img src="/storage/images/articles/images.png" alt="" title="">
                <Link :href="route('main.articles.view')">
                    <h3>Как понять результаты общего анализа крови</h3>
                </Link>
                <Status />
            </div>
            <Edit />
        </div>
        <div class="footer">
            <actions />
            <div class="date">19.02.1998</div>
        </div>
    </div>
</template>

<style lang="scss">
.itemArticles {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 20px;
    border-radius: 15px;
    padding: 10px;
    border: 1px solid rgba(240, 240, 240, 1);
    background: rgba(248, 248, 248, 1);

    & > .header,
    & > .footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
        width: 100%;

        .title {
            display: flex;
            align-items: center;
            gap: 20px;

            a {
                text-decoration: none;
            }

            h3 {
                max-width: 70%;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            img {
                width: 60px;
                height: 60px;
                border-radius: 15px;
            }
        }

        .date {
            font-weight: 500;
            font-size: 20px;
            color: rgba(43, 42, 41, 0.5);
        }
    }
}
</style>
