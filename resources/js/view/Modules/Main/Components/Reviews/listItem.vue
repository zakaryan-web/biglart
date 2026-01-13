<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Status from '@/view/Modules/Main/Components/status.vue';

const props = defineProps(['item', 'specialist']);

</script>

<template>
    <div class="itemReview">
        <div class="field">
            <span class="user" v-if="props.specialist"><Link>Пользователь #0031</Link></span>
            <Rating v-model="props.item.rating" readonly>
                <template #onicon>
                    <i class="p-button-icon material-symbols-outlined">star_rate</i>
                </template>
                <template #officon>
                    <i class="p-button-icon material-symbols-outlined">star_rate</i>
                </template>
            </Rating>
            <Status v-if="!props.specialist" type="f-16 moderation" label="На модерации" />
        </div>
        <div class="field">
            <span>Ответ на вопрос: <Link>Проблемы с животом</Link></span>
        </div>
        <div class="field" v-if="!props.specialist">
            <span>Специалист: <Link :href="route('main.specialists.view')">Долгова Елена Борисовна</Link></span>
        </div>
        <div class="field">
            <div class="reviews">
                <span class="title">Что понравилось</span>
                <span>Подробный и понятный план действий, объяснил результаты анализов, дал памятку по питанию на неделю. Без «лишних» назначений.</span>
            </div>
        </div>
        <div class="field">
            <div class="reviews">
                <span class="title">Что не понравилось</span>
                <span>Нет.</span>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.itemReview {
    display: flex;
    flex-direction: column;
    gap: 20px;
    border-radius: 15px;
    padding: 30px;
    border: 1px solid rgba(240, 240, 240, 1);
    background: rgba(248, 248, 248, 1);

    span, a {
        font-weight: 400;
        font-size: 20px;
        color: rgba(43, 42, 41, 1);
    }

    .field {
        display: flex;
        align-items: center;
        gap: 10px;

        .user {
            font-weight: 700;
            font-size: 25px;
            color: rgba(43, 42, 41, 1);

            a {
                font-weight: 700;
                font-size: 25px;
                color: rgba(43, 42, 41, 1);
                text-decoration: none;
            }
        }

        .reviews {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .title {
                font-weight: 700;
            }
        }
    }
}
</style>
