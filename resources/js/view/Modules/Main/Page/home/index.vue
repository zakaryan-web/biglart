<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Questions from './questions.vue';
import Articles from './articles.vue';
import FAQ from './faq.vue';
import Specialist from './specialist.vue';
import Directions from './directions.vue';
const props = defineProps(['data']);

</script>

<template>
    <Head title="Главная"></Head>
    <div class="pageHome">
        <div class="homeBlock">
            <h2>Направления</h2>
            <Directions />
        </div>
        <div class="homeBlock">
            <h2>Как стать специалистом</h2>
            <Specialist />
        </div>
        <div class="homeBlock">
            <h2>
                Вопросы (всего {{ props.data.questions_count }})
                <Link :href="route('main.questions.index')">Смотреть все вопросы</Link>
            </h2>
            <Questions :questions="props.data.questions.data" />
        </div>
        <div class="homeBlock">
            <h2>
                Статьи (всего 312)
                <Link :href="route('main.articles.index')">Смотреть все статьи</Link>
            </h2>
            <Articles />
        </div>
        <div class="homeBlock">
            <h2>Ответы на часто задаваемые вопросы</h2>
            <FAQ />
        </div>
    </div>
</template>

<style lang="scss">
.pageHome {
    display: flex;
    flex-direction: column;
    gap: 100px;
    width: 100%;

    .homeBlock {
        display: flex;
        flex-direction: column;
        gap: 30px;

        h2 {
            justify-content: space-between;

            a {
                font-weight: 600;
                font-size: 30px;
                color: rgba(43, 42, 41, 1);
            }
        }
    }
}
</style>
