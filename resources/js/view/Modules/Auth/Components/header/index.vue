<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';

const props = defineProps(['act']);

const getAct = () => {
    switch (props.act) {
        case 'login':
            return {
                label: 'Нет аккаунта? Пройдите регистрацию',
                text: 'Регистрация',
                link: route('auth.registration.index'),
            };
        case 'registration':
            return {
                label: 'Есть аккаунт? Войдите',
                text: 'Войти',
                link: route('auth.login.index'),
            };
        case 'recovery':
            return {
                label: 'Вспомнили пароль?',
                text: 'Вход',
                link: route('auth.login.index'),
            };
        default:
            return {
                label: '',
                text: '',
                link: '',
            };
    }
};
</script>

<template>
    <div class="authHeader">
        <Link :href="route('main.home.index')" class="p-button lightgrey">
            <span class="p-button-icon material-symbols-outlined">arrow_back</span> Назад
        </Link>

        <div class="right">
            <span>{{ getAct().label }}</span>
            <Link :href="getAct().link" class="p-button black">
                <span class="p-button-icon material-symbols-outlined">account_circle</span>
                {{ getAct().text }}
            </Link>
        </div>
    </div>
</template>

<style lang="scss">
.authHeader {
    display: flex;
    justify-content: space-between;

    .right {
        display: flex;
        align-items: center;
        gap: 30px;
    }
}
</style>
