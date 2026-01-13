<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { User, pluralize, checkAuthor } from '@/view/Composables/GlobalData';
import actions from '@/view/Modules/Main/Components/actions.vue';

const props = defineProps(['item']);

const getDate = (date: any) => {
    return date ? moment(date).fromNow() : '';
};

const getAnswers = (answers: number) => {
    return answers + ' ' + pluralize(answers, 'ответ', 'ответа', 'ответов');
};
</script>

<template>
    <div class="itemQuestion">
        <div class="header">
            <div class="title">
                <Link :href="route('main.questions.view', { question: props.item.id })">
                    <h3>{{ props.item.question }}</h3>
                </Link>
                <div class="info">
                    <span class="user" v-if="!checkAuthor(props.item.user.id)">Пользователь #{{ props.item.user.id }}</span> <span class="date">{{ getDate(props.item.publish_at) }}</span>
                </div>
            </div>
            <div class="status">
                <Chip class="moderation" label="Модерация" v-if="props.item.status == 0" />
                <Chip class="open" label="Открыт" v-if="props.item.status == 1" />
                <Chip class="close" label="Закрыт" v-if="props.item.status == 2" />
                <Link
                    class="edit"
                    :href="route('user.questions.edit', { question: props.item.id })"
                    v-if="checkAuthor(props.item.user.id) && props.item.status != 2 && !props.item.answers_count"
                >
                    <i class="p-button-icon material-symbols-outlined">edit</i>
                </Link>
            </div>
        </div>
        <div class="footer">
            <div class="data">
                <div class="answers">
                    {{ getAnswers(0) }}
                </div>
                <div class="award" v-if="props.item.award">{{ props.item.award }} ₽</div>
            </div>
            <actions :item="props.item" />
        </div>
    </div>
</template>

<style lang="scss">
.itemQuestion {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 30px;
    border-radius: 15px;
    padding: 30px;
    border: 1px solid rgba(240, 240, 240, 1);
    background: rgba(248, 248, 248, 1);

    & > .header,
    & > .footer {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        width: 100%;

        .title {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 70%;

            a {
                text-decoration: none;
            }

            h3 {
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .info {
                display: flex;
                gap: 20px;

                .user {
                    font-weight: 400;
                    font-size: 16px;
                    color: rgba(43, 42, 41, 0.5);
                }

                .date {
                    font-weight: 400;
                    font-size: 16px;
                    color: rgba(43, 42, 41, 1);
                }
            }
        }

        .status {
            display: flex;
            align-items: start;
            gap: 40px;

            .edit {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 9px;
                gap: 10px;
                border-radius: 10px;
                background: rgba(232, 78, 39, 1);
                font-size: 15px;
                color: rgba(255, 255, 255, 1);
                text-decoration: none;

                i {
                    font-size: 15px;
                }
            }
        }

        .data {
            position: relative;
            display: flex;
            align-items: center;
            gap: 30px;
            font-weight: 700;
            font-size: 25px;
            color: rgba(43, 42, 41, 1);
        }
    }

    & > .footer {
        align-items: center;
    }
}
</style>
