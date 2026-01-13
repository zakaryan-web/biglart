<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import NewQuestion from '@/view/Modules/User/Components/newQuestion.vue';
import listItem from '@/view/Modules/Main/Components/questions/listItem.vue';
import noContent from '@/view/Modules/Main/Components/noContent.vue';
import { userSidebar } from '@/view/Composables/GlobalData';

userSidebar.value = true;

const props = defineProps(['data']);

const getQuestions = (status: number) => {
    return props.data.questions.data.filter((el: { status: number }) => {
        return (status == 1 ? el.status == 0 || el.status == 1 : el.status == 2);
    });
};
</script>

<template>
    <Head title="Мои вопросы"></Head>
    <div class="userQuestions">
        <newQuestion />

        <div class="list">
            <h2>Активные вопросы ({{ getQuestions(1).length }})</h2>
            <template v-for="item in getQuestions(1)">
                <listItem :item="item" />
            </template>
            <noContent v-if="getQuestions(1).length == 0" />
        </div>
        <div class="list">
            <h2>Закрытые вопросы ({{ getQuestions(0).length }})</h2>
            <template v-for="item in getQuestions(0)">
                <listItem :item="item" />
            </template>
            <noContent v-if="getQuestions(0).length == 0" />
        </div>
    </div>
</template>

<style lang="scss">
.userQuestions {
    display: flex;
    flex-direction: column;
    gap: 50px;

    .list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
}
</style>
