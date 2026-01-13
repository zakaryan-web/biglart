<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import { User, userSidebar } from '@/view/Composables/GlobalData.js';
import { ref } from 'vue';

const userMenuItems = ref([
    { label: 'Мой профиль', avatar: true, url: route('user.home.index', [], false), view: true },
    { label: 'Баланс', icon: 'credit_card', url: route('user.finance.index', [], false), view: true },
    { label: 'Мои вопросы', icon: 'question_mark', url: route('user.questions.index', [], false), view: User.value.roleClient },
    { label: 'Консультации', icon: 'shield_question', url: route('user.consultations.index', [], false), view: true },
    { label: 'Мои статьи', icon: 'file_copy', url: route('user.articles.index', [], false), view: User.value.roleSpecialist },
    { label: 'Файлы', icon: 'file_copy', url: route('user.files.index', [], false), view: User.value.roleClient },
    { label: 'Рефералы', icon: 'group_add', url: route('user.referrals.index', [], false), view: true },
    { label: 'Рейтинг и отзывы', icon: 'star_rate', url: route('user.reviews.index', [], false), view: User.value.roleSpecialist },
    { label: 'Отзывы', icon: 'star_rate', url: route('user.reviews.index', [], false), view: User.value.roleClient },
]);
const checkActive = (linkPage) => {
    const thisPage = usePage().url;
    if(thisPage === linkPage) return true;
    return thisPage.substring(6).startsWith((linkPage.substring(6) || false));
};

</script>

<template>
    <div class="userLayout">
        <div class="sidebar" v-if="userSidebar">
            <nav>
                <template v-for="item in userMenuItems">
                    <Link :href="item.url" :class="{ 'active': checkActive(item.url)}" v-if="item.view">
                        <Avatar :image="User.personal.avatar" shape="circle" v-if="item.avatar" class="avatar" />
                        <i class="p-button-icon material-symbols-outlined" v-if="item.icon">{{ item.icon }}</i>
                        <span>{{ item.label}}</span>
                    </Link>
                </template>
            </nav>
            <div class="footer">
                <Button @click="router.visit(route('auth.logout.index'))" class="logout" label="Выйти из аккаунта">
                    <template #icon>
                        <span class="p-button-icon material-symbols-outlined">logout</span>
                    </template>
                </Button>
            </div>
        </div>
        <div :class="userSidebar ? 'body' : 'bodyFull'">
            <slot />
        </div>
    </div>
</template>

<style lang="scss">
.userLayout {
    display: flex;
    justify-content: space-between;
    align-items: start;
    gap: 30px;
    width: 100%;

    .sidebar {
        display: flex;
        flex-direction: column;
        gap: 40px;
        border-radius: 15px;
        padding: 20px;
        background: rgba(248, 248, 248, 1);

        nav {
            display: flex;
            flex-direction: column;
            gap: 10px;

            a {
                position: relative;
                display: flex;
                gap: 10px;
                border-radius: 15px;
                padding: 10px;
                background: rgba(255, 255, 255, 1);
                text-decoration: none;

                .avatar {
                    width: 20px;
                    height: 20px;
                }

                i, span {
                    font-weight: 400;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 1);
                }

                &:hover {
                    background: rgba(233, 233, 233, 1);
                }

                &.active {
                    background: rgba(43, 42, 41, 1);

                    i, span {
                        color: rgba(255, 255, 255, 1);
                    }
                }
            }
        }

        .footer {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .logout {
                font-weight: 500;
                font-size: 20px;
                color: rgba(180, 180, 180, 1);
            }
        }
    }

    .body {
        max-width: 1190px;
        flex-grow: 1;
    }

    .bodyFull {
        width: 100%;
        flex-grow: 1;
    }
}
</style>
