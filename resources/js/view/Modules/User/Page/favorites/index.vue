<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Article from '@/view/Modules/Main/Components/articles/listShortItem.vue';
import Question from '@/view/Modules/Main/Components/questions/listItem.vue';
import Specialist from '@/view/Modules/Main/Components/Specialists/listItem.vue';
import NoContent from '@/view/Modules/Main/Components/noContent.vue';
import { userSidebar } from '@/view/Composables/GlobalData';

const props = defineProps(['data']);

userSidebar.value = false;

const tabs = ref([
    { title: 'Специалисты', icon: 'info', value: '0' },
    { title: 'Вопросы', icon: 'help', value: '1' },
    { title: 'Статьи', icon: 'news', value: '2' },
]);

const question = { "id": 3, "user_id": 6, "direction_id": 4, "specialization_id": 29, "question": "adsadsdsadsad", "description": "adsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsad", "publish_at": "2025-10-14T11:29:49.000000Z", "award": 222, "status": 1, "answers_count": 0, "likes_count": 0, "reposts_count": 0, "favorites_count": 0, "user": { "id": 6, "username": null, "email": "dom.klim.skss@ya.ru", "email_verified_at": null, "phone": null, "phone_verified_at": null, "language": null, "balance": 0, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-24T16:58:35.000000Z", "personal": { "id": 6, "user_id": 6, "avatar": "/storage/images/avatars/9.png", "nick_name": "Тест 1", "first_name": null, "last_name": null, "middle_name": null, "age": 23, "gender": 1, "about": null, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-24T19:28:31.000000Z" }, "social": { "id": 6, "user_id": 6, "vk_id": null, "tg_id": null, "google_id": null, "yandex_id": null, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-13T09:44:21.000000Z" } } };

</script>

<template>
    <Head title="Избранное"></Head>

    <div class="userPageFavorites">
        <h2>Избранное</h2>
        <Tabs value="0">
            <TabList>
                <Tab v-for="tab in tabs" :key="tab.title" :value="tab.value">
                    <i class="p-button-icon material-symbols-outlined">{{ tab.icon }}</i>
                    {{ tab.title }}
                </Tab>
            </TabList>
            <TabPanels>
                <TabPanel value="0">
                    <div class="specialists">
                        <Specialist />
                        <Specialist />
                        <Specialist />
                        <Specialist />
                        <Specialist />
                        <Specialist />
                        <Specialist />
                        <Specialist />
                        <noContent v-if="false" />
                    </div>
                </TabPanel>
                <TabPanel value="1">
                    <div class="questions">
                        <Question :item="question" />
                        <Question :item="question" />
                        <Question :item="question" />
                        <Question :item="question" />
                        <Question :item="question" />
                        <Question :item="question" />
                        <noContent v-if="false" />
                    </div>
                </TabPanel>
                <TabPanel value="2">
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
                        <noContent v-if="false" />
                    </div>
                </TabPanel>
            </TabPanels>
        </Tabs>
    </div>
</template>

<style lang="scss">

.userPageFavorites {
    display: flex;
    flex-direction: column;
    gap: 20px;

    .specialists {
        display: flex;
        flex-direction: column;
        gap: 20px;
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
</style>
