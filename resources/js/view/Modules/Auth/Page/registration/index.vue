<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { FormField } from '@primevue/forms';
import { Header, Social } from '@/view/Modules/Auth/Components';
import { ref } from 'vue';

const props = defineProps(['data']);

const form = useForm({
    email: null,
    password: null,
    password_confirmation: null,
    type: 0,
    accept_doc: false,
    accept_spam: false,
});

const optionsType = ref([
    { name: 'Как клиент', icon: 'question_mark', value: 1, class: 'lightgrey', activeClass: 'darkgreen' },
    { name: 'Как специалист', icon: 'lightbulb_2', value: 2, class: 'lightgrey', activeClass: 'darkgreen' },
]);

const type = ref(optionsType.value[0]);

const submit = () => {
    form.type = 0;
    if(type.value){
        form.type = type.value.value
    }
    form.post(route('auth.registration.store'));
};
</script>

<template>
    <Head title="Регистрация"></Head>

    <Header act="registration" />
    <div class="authContent">
        <form @submit.prevent="submit">
            <div class="formHeader">
                <h1>Создать аккаунт</h1>
            </div>
            <FormField name="type" :initialValue="form.type">
                <SelectButton :class="'registrationType'+(form.errors.type?' error' : '')" v-model="type" :options="optionsType" optionLabel="name" fluid>
                    <template #option="slotProps">
                        <Button :class="(type && type.value === slotProps.index+1) ? slotProps.option.activeClass : slotProps.option.class" :label="slotProps.option.name" fluid>
                            <template #icon>
                                <span class="p-button-icon material-symbols-outlined">{{ slotProps.option.icon }}</span>
                            </template>
                        </Button>
                    </template>
                </SelectButton>
            </FormField>
            <div class="formContent">
                <FormField name="email" :initialValue="form.email">
                    <label>Ваша почта</label>
                    <InputText v-model="form.email" :class="'auth'+(form.errors.email ? ' error' : '')" type="text" placeholder="example@mail.ru" />
                    <Message v-if="form.errors.email" severity="error" size="small" variant="simple">{{ form.errors.email }}</Message>
                </FormField>
                <FormField name="password" :initialValue="form.password">
                    <label>Придумайте пароль</label>
                    <Password
                        v-model="form.password"
                        :class="'auth'+(form.errors.password ? ' error' : '')"
                        type="text"
                        placeholder="***********"
                        :feedback="false"
                        toggleMask
                        fluid
                    />
                </FormField>
                <FormField name="password_confirmation" :initialValue="form.password_confirmation">
                    <label>Подтвердите пароль</label>
                    <Password
                        v-model="form.password_confirmation"
                        :class="'auth'+(form.errors.password ? ' error' : '')"
                        type="text"
                        placeholder="***********"
                        :feedback="false"
                        toggleMask
                        fluid
                    />
                </FormField>
                <Message v-if="form.errors.password" severity="error" size="small" variant="simple">{{ form.errors.password }}</Message>
                <FormField class="checkbox" name="accept_doc" :initialValue="form.accept_doc">
                    <Checkbox v-model="form.accept_doc" :class="form.errors.accept_doc ? 'error' : ''" inputId="accept_doc" value="1" binary />
                    <label for="accept_doc">С условиями <Link>Договора оферты</Link> и <Link>Политикой обработки ДПД</Link> ознакомлен(а)</label>
                </FormField>
                <FormField class="checkbox" name="accept_spam" :initialValue="form.accept_spam">
                    <Checkbox v-model="form.accept_spam" :class="form.errors.accept_spam ? 'error' : ''" inputId="accept_spam" value="1" binary />
                    <label for="accept_spam">Согласен получать информационные письма</label>
                </FormField>
            </div>
            <div class="formFooter">
                <Button type="submit" class="orange" label="Регистрация" :disabled="form.processing" />
            </div>
        </form>

        <Social act="registration" />
    </div>
</template>

<style lang="scss">
.registrationType {
    padding: 0;
    margin: 0;
    background: none;
    gap: 20px;

    &.error {
        border: 1px solid rgba(255, 54, 60, 1);
    }

    .p-togglebutton {
        padding: 0;
        margin: 0;
        background: none;

        .p-togglebutton-content {
            padding: 0;
            margin: 0;
        }
    }
}
</style>
