<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { pluralize } from '@/view/Composables/GlobalData';
import EditButton from '@/view/Modules/Main/Components/questions/editButton.vue';
import Status from '@/view/Modules/Main/Components/status.vue';
import Actions from '@/view/Modules/Main/Components/actions.vue';
import Report from '@/view/Modules/Main/Components/report.vue';
import NoContent from '@/view/Modules/Main/Components/noContent.vue';
import RightBar from '@/view/Modules/Main/Layouts/Components/rightBar.vue';

const props = defineProps(['data']);

const getDate = (date: any) => {
    return date ? moment(date).fromNow() : '';
};

const getAnswers = (answers: number) => {
    return answers + ' ' + pluralize(answers, 'ответ', 'ответа', 'ответов');
};

const item = props.data.question;

const getPreview = (file: object) => {
    switch (file.extension) {
        case 'png':
        case 'jpg':
        case 'jpeg':
            return file.url;
        case 'pdf':
            return '/storage/images/mimetype/pdf.svg';
        case 'doc':
        case 'docx':
            return '/storage/images/mimetype/doc.svg';
        case 'xls':
        case 'xlsx':
            return '/storage/images/mimetype/xls.svg';
        case 'txt':
            return '/storage/images/mimetype/txt.svg';
        default:
            return '/storage/images/mimetype/none.svg';
    }
};

const isImage = (file: object) => {
    switch (file.extension) {
        case 'png':
        case 'jpg':
        case 'jpeg':
            return true;
        case 'pdf':
        case 'doc':
        case 'docx':
        case 'xls':
        case 'xlsx':
        case 'txt':
            return false;
        default:
            return false;
    }
};

</script>

<template>
    <Head :title="item.question"></Head>
    <div class="viewQuestion">
        <div class="question">
            <div class="header">
                <h2>
                    {{ item.question }}
                    <Status type="moderation" label="Модерация" v-if="item.status == 0" />
                    <Status type="open" label="Открыт" v-if="item.status == 1" />
                    <Status type="close" label="Закрыт" v-if="item.status == 2" />
                </h2>
                <EditButton :item="item" :label="true" />
            </div>
            <div class="row">
                <div class="info">
                    <div class="answers">{{ getAnswers(item.answers_count) }}</div>
                    <div class="award" v-if="item.award">{{ item.award }} ₽</div>
                </div>
            </div>
            <div class="row">
                <div class="info">Пользователь #{{ item.user.id }}</div>
                <div class="stats">
                    <span class="date">{{ getDate(item.publish_at) }}</span>
                    <span class="views">{{ item.views_count }} {{ pluralize(item.views_count, 'просмотр', 'просмотра', 'просмотров') }}</span>
                </div>
            </div>
            <div class="body">
                <div class="files" v-if="item.files.length">
                    <template v-for="file in item.files">
                        <Image :src="getPreview(file)" :alt="file.name" preview v-if="isImage(file)" />
                        <a :href="file.url" target="_blank" v-if="!isImage(file)"><img :src="getPreview(file)" :alt="file.name"></a>
                    </template>
                </div>
                <div class="description">{{ item.description }}</div>
            </div>
            <div class="footer">
                <Actions :item="item" :grey="true" />
                <Report :item="item" />
            </div>
        </div>

        <div class="answers">
            <h2>
                Ответы специалистов
                <Badge :value="item.answers_count" severity="contrast"></Badge>
            </h2>
            <noContent v-if="item.answers.length == 0" />
        </div>
    </div>
    <RightBar />
</template>

<style lang="scss">
.viewQuestion {
    display: flex;
    flex-direction: column;
    gap: 60px;
    max-width: 1190px;
    flex-grow: 1;

    .question {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            width: 100%;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            width: 100%;

            .info {
                position: relative;
                display: flex;
                gap: 20px;
                font-weight: 400;
                font-size: 20px;
                color: rgba(43, 42, 41, 1);

                .answers, .award {
                    font-weight: 700;
                    font-size: 35px;
                    color: rgba(43, 42, 41, 1);
                }
            }

            .stats {
                display: flex;
                gap: 50px;

                .date, .views {
                    font-weight: 400;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 0.5);
                }
            }
        }

        .body {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 20px;
            border-radius: 15px;
            padding: 30px;
            background: rgba(248, 248, 248, 1);

            .files {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;

                .p-image, a {
                    width: 69px;
                    height: 69px;
                    border-radius: 15px;
                    background: rgba(243, 243, 243, 1);
                    border: 1px solid rgba(217, 217, 217, 1);

                    img {
                        width: 69px;
                        height: 69px;
                        border-radius: 15px;
                    }
                }
            }

            .description {
                position: relative;
                font-weight: 400;
                font-size: 20px;
                word-wrap: break-word;
            }
        }

        .footer {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
        }
    }

    & > .answers {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }
}

</style>
