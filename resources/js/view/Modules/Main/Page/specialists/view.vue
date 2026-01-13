<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Specialist from '@/view/Modules/Main/Components/Specialists/listItem.vue';
import { ref } from 'vue';
import Review from '@/view/Modules/Main/Components/Reviews/listItem.vue';
import Article from '@/view/Modules/Main/Components/articles/listShortItem.vue';
import Question from '@/view/Modules/Main/Components/questions/listItem.vue';
import NoContent from '@/view/Modules/Main/Components/noContent.vue';

const props = defineProps(['data']);
const tabs = ref([
    { title: 'О специалисте', icon: 'info', value: '0' },
    { title: 'Ответы', icon: 'help', value: '1' },
    { title: 'Отзывы', icon: 'star_rate', value: '2' },
    { title: 'Статьи', icon: 'news', value: '3' },
]);
const tabsQuestions = ref([
    { title: 'Все ответы', value: '0' },
    { title: 'Принятые ответы', value: '1' },
]);

const question = { "id": 3, "user_id": 6, "direction_id": 4, "specialization_id": 29, "question": "adsadsdsadsad", "description": "adsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsadadsadsdsadsad", "publish_at": "2025-10-14T11:29:49.000000Z", "award": 222, "status": 1, "answers_count": 0, "likes_count": 0, "reposts_count": 0, "favorites_count": 0, "user": { "id": 6, "username": null, "email": "dom.klim.skss@ya.ru", "email_verified_at": null, "phone": null, "phone_verified_at": null, "language": null, "balance": 0, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-24T16:58:35.000000Z", "personal": { "id": 6, "user_id": 6, "avatar": "/storage/images/avatars/9.png", "nick_name": "Тест 1", "first_name": null, "last_name": null, "middle_name": null, "age": 23, "gender": 1, "about": null, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-24T19:28:31.000000Z" }, "social": { "id": 6, "user_id": 6, "vk_id": null, "tg_id": null, "google_id": null, "yandex_id": null, "created_at": "2025-10-13T09:44:21.000000Z", "updated_at": "2025-10-13T09:44:21.000000Z" } } };

</script>

<template>
    <Head title="Статья"></Head>
    <div class="pageSpecialist">
        <Specialist :view="true" />
        <div class="infoSpecialist">
            <Tabs value="0">
                <TabList>
                    <Tab v-for="tab in tabs" :key="tab.title" :value="tab.value">
                        <i class="p-button-icon material-symbols-outlined">{{ tab.icon }}</i>
                        {{ tab.title }}
                    </Tab>
                </TabList>
                <TabPanels>
                    <TabPanel value="0">
                        <div class="about">
                            <div class="column left">
                                <span class="title">О специалисте</span>
                                <p>
                                    Добрый день! Ребенку 11 месяцев, 27.06 первый раз появилось небольшое красное пятно во внутренней части левого верхнего века, затем появилась небольшая папула, затем папула пропала, появились маленькие прыщики, ребенка они не беспокоили. Из лечения: гидрокортизон 1%, элидел. В течение недели практически все прошло, осталось небольшое розовое пятно. С 14.07 опять начало увеличиваться в размерах, появились небольшие прыщики, обращались к дерматологу, начали лечение: пимафукорт, зодак. Эффекта нет, плюс ещё появились высыпания у носа слева.<br>Гипоаллергенную диету ребенок соблюдает<br>У дедушки на лице после перенесенного опоясывающего герпеса постоянно высыпания на лице, может ли это быть связано?
                                </p>
                            </div>
                            <div class="column right">
                                <span class="title">Дополнительно</span>
                                <div class="files">
                                    <span>Квалификация / Дипломы</span>
                                    <div class="list">
                                        <Image width="86" height="110" preview>
                                            <template #image>
                                                <img class="img" src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" />
                                            </template>
                                            <template #preview="slotProps">
                                                <img src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" :style="slotProps.style" @click="slotProps.onClick" />
                                            </template>
                                        </Image>
                                        <Image width="86" height="110" preview>
                                            <template #image>
                                                <img class="img" src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" />
                                            </template>
                                            <template #preview="slotProps">
                                                <img src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" :style="slotProps.style" @click="slotProps.onClick" />
                                            </template>
                                        </Image>
                                        <Image width="86" height="110" preview>
                                            <template #image>
                                                <img class="img" src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" />
                                            </template>
                                            <template #preview="slotProps">
                                                <img src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" :style="slotProps.style" @click="slotProps.onClick" />
                                            </template>
                                        </Image>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </TabPanel>
                    <TabPanel value="1">
                        <Tabs value="0">
                            <TabList>
                                <Tab v-for="tab in tabsQuestions" :key="tab.title" :value="tab.value">
                                    {{ tab.title }}
                                </Tab>
                            </TabList>

                            <TabPanels>
                                <TabPanel value="0">
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
                                <TabPanel value="1">
                                    <div class="questions">
                                        <Question :item="question" />
                                        <Question :item="question" />
                                        <Question :item="question" />
                                        <noContent v-if="false" />
                                    </div>
                                </TabPanel>
                            </TabPanels>

                        </Tabs>
                    </TabPanel>
                    <TabPanel value="2">
                        <div class="reviews">
                            <Review :specialist="true" :item="{ rating: 1}" />
                            <Review :specialist="true" :item="{ rating: 5}" />
                            <Review :specialist="true" :item="{ rating: 3}" />
                            <Review :specialist="true" :item="{ rating: 4}" />
                            <Review :specialist="true" :item="{ rating: 2}" />
                            <Review :specialist="true" :item="{ rating: 3}" />
                            <noContent v-if="false" />
                        </div>
                    </TabPanel>
                    <TabPanel value="3">
                        <div class="articles">
                            <Button class="subscribe orange" label="Подписаться на статьи">
                                <template #icon>
                                    <span class="p-button-icon material-symbols-outlined">bookmark</span>
                                </template>
                            </Button>
                            <div class="list">
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <Article :specialist="true" />
                                <noContent v-if="false" />
                            </div>
                        </div>
                    </TabPanel>
                </TabPanels>
            </Tabs>
        </div>
    </div>
</template>

<style lang="scss">

.pageSpecialist {
    display: flex;
    flex-direction: column;
    gap: 50px;
    flex-grow: 1;

    .infoSpecialist {
        display: flex;
        flex-direction: column;
        gap: 10px;

        .about {
            display: flex;
            gap: 50px;
            border-radius: 15px;
            padding: 30px;
            background: rgba(248, 248, 248, 1);

            .column {
                display: flex;
                flex-direction: column;
                gap: 20px;

                &.left {
                    flex-grow: 1;
                }

                &.right {
                    width: 470px;
                    min-width: 470px;
                }

                .title {
                    font-weight: 700;
                    font-size: 20px;
                    color: rgba(0, 0, 0, 1);
                }

                p {
                    font-weight: 400;
                    font-size: 20px;
                    line-height: 30px;
                    color: rgba(0, 0, 0, 1);

                }

                .files {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;

                    span {
                        font-weight: 500;
                        font-size: 20px;
                        line-height: 30px;
                        color: rgba(0, 0, 0, 1);
                    }

                    .list {
                        display: flex;
                        gap: 10px;

                        .p-image-preview {

                            .img {
                                width: 86px;
                                height: 110px;
                                border-radius: 10px;
                            }
                        }
                    }
                }
            }
        }

        .questions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .reviews {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .articles {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .subscribe {
                width: 100%;
            }

            .list {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }
        }
    }
}

</style>
