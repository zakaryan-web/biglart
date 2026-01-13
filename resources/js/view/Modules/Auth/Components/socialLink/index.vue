<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const props = defineProps(['act']);

const getAct = () => {
    switch (props.act) {
        case 'registration':
            return {
                label: 'Зарегистрироваться с помощью',
                links: {
                    vk: {
                        title: 'Вконтакте',
                        img: '/storage/images/social/vk.png',
                        link: route('auth.registration.index'),
                    },
                    yandex: {
                        title: 'Яндекс',
                        img: '/storage/images/social/yandex.png',
                        link: route('auth.registration.index'),
                    },
                },
            };
        case 'login':
        case 'recovery':
            return {
                label: 'Войти с помощью',
                links: {
                    vk: {
                        title: 'Вконтакте',
                        img: '/storage/images/social/vk.png',
                        link: route('auth.login.index'),
                    },
                    yandex: {
                        title: 'Яндекс',
                        img: '/storage/images/social/yandex.png',
                        link: route('auth.login.index'),
                    },
                },
            };
        default:
            return false
    }
};
</script>

<template>
    <div class="authSocial" v-if="getAct()">
        <div class="socialTitle">{{ getAct().label }}</div>
        <div class="socialLink">
            <Link v-for="link in getAct().links" :href="link.link">
                <img :src="link.img" :alt="link.title">
            </Link>
        </div>
   </div>
</template>

<style lang="scss">
.authSocial {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    width: 100%;

    .socialTitle {
        font-weight: 500;
        font-size: 20px;
        color: rgba(43, 42, 41, 1);
    }

    .socialLink {
        display: flex;
        gap: 10px;
        padding: 10px;
        border: 1px solid rgba(231, 231, 231, 1);
        border-radius: 15px;

        img {
            width: 45px;
            height: 45px;
            border-radius: 15px;
        }
    }
}
</style>
