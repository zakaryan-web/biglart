<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { Header, Social } from '@/view/Modules/Auth/Components';
import { FormField } from '@primevue/forms';

const props = defineProps(['data']);

const form = useForm({
    email: props.data.email,
    password: null,
    password_confirmation: null,
    token: props.data.token
});

const submit = () => {
    console.log(form)
    form.post(route('auth.recovery.store'));
};
</script>

<template>
    <Head title="Новый пароль"></Head>
    <Header act="recovery" />
    <div class="authContent">
        <form @submit.prevent="submit">
            <div class="formHeader">
                <h1>Придумайте новый пароль</h1>
            </div>

            <div class="formContent">
                <FormField name="password" :initialValue="form.password">
                    <label>Новый пароль</label>
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
            </div>
            <div class="formFooter">
                <Button type="submit" class="orange" label="Сохранить" :disabled="form.processing" />
            </div>
        </form>
        <Social act="recovery" />
    </div>
</template>

<style lang="scss"></style>
