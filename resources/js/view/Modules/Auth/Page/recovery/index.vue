<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { Header, Social } from '@/view/Modules/Auth/Components';
import { FormField } from '@primevue/forms';
import { ref } from 'vue';

const props = defineProps(['data']);

const isSuccess = ref(false);

const form = useForm({
    email: null,
});

const submit = () => {
    form.post(route('auth.recovery.send'), {
        onSuccess: (data) => {
            if(props.data.send == 'passwords.sent'){
                isSuccess.value = true;
            }else{
                isSuccess.value = 'Слишком много попыток отправки. Повторите позже!';
            }
        },
    });
};
</script>

<template>
    <Head title="Восстановление пароля"></Head>
    <Header act="recovery" />
    <div class="authContent">
        <form @submit.prevent="submit" v-if="isSuccess !== true">
            <div class="formHeader">
                <h1>Восстановить пароль</h1>
            </div>

            <div class="formContent">
                <FormField name="email" :initialValue="form.email">
                    <label>Ваша почта</label>
                    <InputText v-model="form.email" :class="'auth'+(form.errors.email ? ' error' : '')" type="text" placeholder="example@mail.ru" />
                    <Message v-if="form.errors.email" severity="error" size="small" variant="simple">{{ form.errors.email }}</Message>
                    <Message v-if="isSuccess" severity="error" size="small" variant="simple">{{ isSuccess }}</Message>
                </FormField>
            </div>
            <div class="formFooter" v-if="isSuccess === false">
                <Button type="submit" class="orange" label="Отправить ссылку на восстановление" :disabled="form.processing" />
            </div>
        </form>
        <div class="successMsg" v-if="isSuccess === true">
            Ссылка для восстановления пароля отправлена на вашу почту!
        </div>
        <Social act="recovery" />
    </div>
</template>

<style lang="scss">
.successMsg {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 25px;
    font-weight: 500;
    font-size: 30px;
    color: rgba(43, 42, 41, 1);
    text-align: center;
}
</style>
