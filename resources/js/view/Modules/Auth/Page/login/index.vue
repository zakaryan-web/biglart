<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { FormField } from '@primevue/forms';
import { Header, Social } from '@/view/Modules/Auth/Components';

const props = defineProps(['data']);

const form = useForm({
    email: null,
    password: null,
});

const submit = () => {
    form.post(route('auth.login.store'));
};
</script>

<template>
    <Head title="Авторизация"></Head>
    <Header act="login" />
    <div class="authContent">
        <form @submit.prevent="submit">
            <div class="formHeader">
                <h1>Вход в аккаунт</h1>
            </div>
            <div class="formContent">
                <FormField name="email" :initialValue="form.email">
                    <label>Ваша почта</label>
                    <InputText v-model="form.email" :class="'auth' + (form.errors.email ? ' error' : '')" type="text" placeholder="example@mail.ru" />
                    <Message v-if="form.errors.email" severity="error" size="small" variant="simple">{{ form.errors.email }}</Message>
                </FormField>
                <FormField name="password" :initialValue="form.password">
                    <label>
                        <span>Ваш пароль</span>
                        <Link class="recovery" :href="route('auth.recovery.index')">Забыли пароль?</Link>
                    </label>
                    <Password v-model="form.password" :class="'auth' + (form.errors.password ? ' error' : '')" type="text" placeholder="***********" :feedback="false" toggleMask fluid />
                    <Message v-if="form.errors.password" severity="error" size="small" variant="simple">{{ form.errors.password }}</Message>
                </FormField>
            </div>
            <div class="formFooter">
                <Button type="submit" class="orange" label="Вход" :disabled="form.processing" />
            </div>
        </form>

        <Social act="login" />
    </div>
</template>

<style lang="scss"></style>
