<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { FormField } from '@primevue/forms';
import { User, userSidebar } from '@/view/Composables/GlobalData';
import { ref } from 'vue';
import Uploader from '@/view/Modules/User/Components/files/Uploader.vue';

userSidebar.value = true;

const props = defineProps(['data']);

const edit = !!props.data.question.id;

const form = useForm({
    id: props.data.question.data.id || null,
    question: props.data.question.data.question || '',
    description: props.data.question.data.description || '',
    direction_id: props.data.question.data.direction_id || 0,
    specialization_id: props.data.question.data.specialization_id || 0,
    award: props.data.question.data.award || '',
    files: props.data.question.data.files || [],
});

const direction_id = ref(0);

const getSpecializations = () => {
    return props.data.specialization.data.filter((el: { direction_id: number }) => {
        return el.direction_id == direction_id.value;
    });
};

const changeDirection = (direction: { value: number }) => {
    direction_id.value = direction.value;
};

const submit = () => {
    form.post(route('user.questions.store'), {
        onSuccess: () => {

        }
    });
};
</script>

<template>
    <Head title="Мои вопросы"></Head>
    <div class="userNewQuestions">
        <h2 v-if="!edit">Задать вопрос</h2>
        <h2 v-if="edit">Изменить вопрос</h2>
        <form @submit.prevent="submit">
            <section>
                <InputText v-model="form.id" type="hidden" />
                <FormField>
                    <label>Заголовок</label>
                    <InputText v-model="form.question" :invalid="!!form.errors.question" placeholder="Кратко опишите вашу проблему" fluid />
                    <Message v-if="form.errors.question" severity="error" size="small" variant="simple">{{ form.errors.question }}</Message>
                </FormField>
                <FormField>
                    <label>Описание</label>
                    <Textarea
                        v-model="form.description"
                        :invalid="!!form.errors.description"
                        rows="6"
                        placeholder="Напишите развернуто о вашей проблеме"
                        fluid
                    />
                    <Message v-if="form.errors.description" severity="error" size="small" variant="simple">{{ form.errors.description }}</Message>
                </FormField>
            </section>
            <section>
                <FormField class="column">
                    <label fluid>Направление и специализация</label>
                    <FormField class="nowrap">
                        <Select
                            v-model="form.direction_id"
                            :options="props.data.directions.data"
                            optionLabel="name"
                            optionValue="id"
                            :invalid="!!form.errors.direction_id"
                            placeholder="Направление"
                            @change="changeDirection"
                            fluid
                        >
                            <template #dropdownicon>
                                <i class="p-button-icon material-symbols-outlined">keyboard_arrow_down</i>
                            </template>
                        </Select>
                        <Select
                            v-model="form.specialization_id"
                            :options="getSpecializations()"
                            optionLabel="name"
                            optionValue="id"
                            :invalid="!!form.errors.specialization_id"
                            placeholder="Специализация"
                            fluid
                        >
                            <template #empty> Нет... </template>
                            <template #dropdownicon>
                                <i class="p-button-icon material-symbols-outlined">keyboard_arrow_down</i>
                            </template>
                        </Select>
                        <Button class="gradient" label="Заполнить с помощью ИИ">
                            <template #icon>
                                <span class="p-button-icon material-symbols-outlined">add</span>
                            </template>
                        </Button>
                    </FormField>
                    <Message v-if="form.errors.direction_id || form.errors.specialization_id" severity="error" variant="simple">
                        Укажите направление и специализацию!
                    </Message>
                </FormField>
            </section>
            <section>
                <FormField>
                    <label>Прикрепить файлы (необязательно)</label>
                    <Uploader v-model="form.files" :parentID="form.id" :uploadURL="route('user.questions.addFile')" :deleteURL="route('user.questions.deleteFile')" />
                </FormField>
            </section>
            <section>
                <FormField class="column">
                    <label fluid>Стоимость</label>
                    <FormField class="nowrap">
                        <InputNumber
                            v-model="form.award"
                            mode="currency"
                            currency="RUB"
                            locale="ru-RU"
                            variant="filled"
                            placeholder="Укажите 0, если хотите вопрос бесплатным"
                            fluid
                        />
                        <Button class="gradient" label="Заполнить с помощью ИИ">
                            <template #icon>
                                <span class="p-button-icon material-symbols-outlined">add</span>
                            </template>
                        </Button>
                    </FormField>
                </FormField>
                <FormField>
                    <label>Ваш баланс: {{ User.balance }} ₽</label>
                    <Message severity="error" variant="outlined">
                        Если ваш вопрос срочный, укажите оплату **от N₽** – и мы разошлём персональные уведомления специалистам по нужной области,
                        чтобы получить ответ быстрее.
                    </Message>
                </FormField>
            </section>
            <div class="footer">
                <Button type="submit" class="orange" :label="edit ? 'Сохранить вопрос' : 'Опубликовать вопрос'" :disabled="form.processing" />
            </div>
        </form>
    </div>
</template>

<style lang="scss">
.userNewQuestions {
    display: flex;
    flex-direction: column;
    gap: 20px;

    & > form {
        display: flex;
        flex-direction: column;
        gap: 20px;

        & > section {
            display: flex;
            flex-direction: column;
            gap: 30px;
            border-radius: 15px;
            padding: 30px;
            background: rgba(248, 248, 248, 1);
        }

        & > .footer {
            display: flex;
            gap: 10px;
        }
    }
}
</style>
