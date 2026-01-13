<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Article from '@/view/Modules/Main/Components/articles/listShortItem.vue';
import Specialist from '@/view/Modules/Main/Components/Specialists/listShortItem.vue';
import Question from '@/view/Modules/Main/Components/questions/listItem.vue';
import NoContent from '@/view/Modules/Main/Components/noContent.vue';

const props = defineProps(['data']);

const question = { "id": 3, "user_id": 6, "direction_id": 4, "specialization_id": 29, "question": "adsadsdsadsad", "description": "adsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsad", "publish_at": "2025-10-14T11:29:49.000000Z", "award": 222, "status": 1, "answers_count": 0, "likes_count": 0, "reposts_count": 0, "favorites_count": 0, "user": { "id": 6, "username": null, "email": "dom.klim.skss@ya.ru", "email_verified_at": null, "phone": null, "phone_verified_at": null, "language": null, "balance": 0, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-24T16:58:35.000000Z", "personal": { "id": 6, "user_id": 6, "avatar": "/storage/images/avatars/9.png", "nick_name": "Тест 1", "first_name": null, "last_name": null, "middle_name": null, "age": 23, "gender": 1, "about": null, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-24T19:28:31.000000Z" }, "social": { "id": 6, "user_id": 6, "vk_id": null, "tg_id": null, "google_id": null, "yandex_id": null, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-13T09:44:21.000000Z" } } };

</script>

<template>
    <Head title="Поиск"></Head>
    <div class="pageSearch">
        <div class="line">
            <h2>Поиск по сайту</h2>
            <IconField>
                <InputIcon>
                    <i class="p-button-icon material-symbols-outlined">search</i>
                </InputIcon>
                <InputText class="grey noborder" placeholder="Поиск по файлам" fluid />
            </IconField>
        </div>
        <div class="line">
            <h4>Найдено специалистов (0)</h4>
            <div class="specialists">
                <Specialist />
                <Specialist />
                <Specialist />
                <Specialist />
                <Specialist />
                <Specialist />
            </div>
            <noContent label="Результатов нет" />
            <Button class="black" label="Загрузить ещё" v-if="false" />
        </div>
        <div class="line">
            <h4>Найдено вопросов (54)</h4>
            <div class="questions">
                <Question :item="question" />
                <Question :item="question" />
                <Question :item="question" />
                <Question :item="question" />
                <Question :item="question" />
                <Question :item="question" />
            </div>
            <noContent label="Результатов нет" />
            <Button class="black" label="Загрузить ещё" />
        </div>
        <div class="line">
            <h4>Найдено статей (6)</h4>
            <div class="articles">
                <Article />
                <Article />
                <Article />
                <Article />
                <Article />
                <Article />
                <Article />
                <Article />
                <Article />
                <Article />
            </div>
            <noContent label="Результатов нет" />
            <Button class="black" label="Загрузить ещё" />
        </div>
    </div>
</template>

<style lang="scss">
.pageSearch {
    display: flex;
    flex-direction: column;
    gap: 50px;
    width: 100%;

    .line {
        display: flex;
        flex-direction: column;
        gap: 20px;

        .specialists {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .questions {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .articles {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
    }


}
</style>
