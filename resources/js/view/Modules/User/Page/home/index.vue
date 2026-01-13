<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { User, setAvatar, userSidebar } from '@/view/Composables/GlobalData';
import { ref } from 'vue';
import newQuestion from '@/view/Modules/User/Components/newQuestion.vue';

userSidebar.value = true;

const props = defineProps(['data']);

const form = useForm({
    avatar: User.value.personal.avatar,
    nick_name: User.value.personal.nick_name,
    age: User.value.personal.age,
    gender: User.value.personal.gender,
    email: User.value.email,
    password: null,
    password_confirmation: null,
});

const genders = [
    { key: 0, value: 'Не заполнено' },
    { key: 1, value: 'Мужской' },
    { key: 2, value: 'Женский' },
];

const getGender = (gender: number) => {
    if (!gender) {
        return 'Не заполнено';
    }
    return gender == 1 ? 'Мужской' : 'Женский';
};

const getAge = (age: number | null) => {
    if (!age) {
        return 'Не заполнено';
    }
    return age;
};

const edit = ref(false);

const toggleEdit = () => {
    edit.value = !edit.value;
};

const submit = () => {
    if (form.password) {
        form.post(route('user.home.setPassword'), {
            preserveUrl: true,
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                form.clearErrors('password', 'password_confirmation');
            },
        });
    }
    form.post(route('user.home.setProfile'), {
        preserveUrl: true,
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            form.clearErrors();
            toggleEdit();
        },
    });
};

const setAvatarDialog = ref(false);
const avatars = [
    { id: 1, url: '/storage/images/avatars/1.png' },
    { id: 2, url: '/storage/images/avatars/2.png' },
    { id: 3, url: '/storage/images/avatars/3.png' },
    { id: 4, url: '/storage/images/avatars/4.png' },
    { id: 5, url: '/storage/images/avatars/5.png' },
    { id: 6, url: '/storage/images/avatars/6.png' },
    { id: 7, url: '/storage/images/avatars/7.png' },
    { id: 8, url: '/storage/images/avatars/8.png' },
    { id: 9, url: '/storage/images/avatars/9.png' },
    { id: 10, url: '/storage/images/avatars/10.png' },
    { id: 11, url: '/storage/images/avatars/11.png' },
    { id: 12, url: '/storage/images/avatars/12.png' },
    { id: 13, url: '/storage/images/avatars/13.png' },
    { id: 14, url: '/storage/images/avatars/14.png' },
    { id: 15, url: '/storage/images/avatars/15.png' },
    { id: 16, url: '/storage/images/avatars/16.png' },
    { id: 17, url: '/storage/images/avatars/17.png' },
    { id: 18, url: '/storage/images/avatars/18.png' },
    { id: 19, url: '/storage/images/avatars/19.png' },
    { id: 20, url: '/storage/images/avatars/20.png' },
    { id: 21, url: '/storage/images/avatars/21.png' },
    { id: 22, url: '/storage/images/avatars/22.png' },
    { id: 23, url: '/storage/images/avatars/23.png' },
];

const submitAvatar = (ID: number) => {
    axios
        .post(route('user.home.setAvatar'), {
            avatar: ID,
        })
        .then((response: any) => {
            form.avatar = response.data.result;
            setAvatar(response.data.result);
            setAvatarDialog.value = false;
        });
};
</script>

<template>
    <Head title="Личный кабинет"></Head>
    <div class="userProfile">
        <newQuestion />
        <div class="statistics">
            <Link :href="route('user.questions.index')" class="item question">
                <div class="header">
                    <span>Мои вопросы</span>
                    <i class="p-button-icon material-symbols-outlined shortLink">arrow_outward</i>
                </div>
                <div class="body">
                    <i class="p-button-icon material-symbols-outlined">question_mark</i>
                    <span>0</span>
                </div>
            </Link>
            <Link :href="route('user.consultations.index')" class="item consultations">
                <div class="header">
                    <span>Консультации</span>
                    <i class="p-button-icon material-symbols-outlined shortLink white">arrow_outward</i>
                </div>
                <div class="body">
                    <i class="p-button-icon material-symbols-outlined">shield_question</i>
                    <span>0</span>
                </div>
            </Link>
            <Link :href="route('user.files.index')" class="item files">
                <div class="header">
                    <span>Файлы</span>
                    <i class="p-button-icon material-symbols-outlined shortLink white">arrow_outward</i>
                </div>
                <div class="body">
                    <i class="p-button-icon material-symbols-outlined">file_copy</i>
                    <span>0 файлов</span>
                </div>
            </Link>
            <Link :href="route('user.finance.index')" class="item finance">
                <div class="header">
                    <span>Баланс</span>
                    <i class="p-button-icon material-symbols-outlined shortLink">arrow_outward</i>
                </div>
                <div class="body">
                    <i class="p-button-icon material-symbols-outlined">credit_card</i>
                    <span>0.00 ₽</span>
                </div>
            </Link>
        </div>
        <div class="infoUser" v-if="!edit">
            <div class="avatar" :style="'background: url(\'' + form.avatar + '\') 50% / cover no-repeat;'">
                <Button class="edit_avatar" @click="setAvatarDialog = true">
                    <template #icon>
                        <span class="p-button-icon material-symbols-outlined">edit</span>
                    </template>
                </Button>
            </div>
            <div class="info">
                <div class="header">
                    <span>Мои данные</span>
                    <Button label="Редактировать" class="edit_profile" @click="toggleEdit">
                        <template #icon>
                            <span class="p-button-icon material-symbols-outlined">edit</span>
                        </template>
                    </Button>
                </div>
                <div class="items">
                    <div class="item">
                        <span>Имя аккаунта</span>
                        <span>{{ form.nick_name }}</span>
                    </div>
                    <div class="item">
                        <span>Возраст</span>
                        <span>{{ getAge(form.age) }}</span>
                    </div>
                    <div class="item">
                        <span>Пол</span>
                        <span>{{ getGender(form.gender) }}</span>
                    </div>
                    <div class="item">
                        <span>Почта</span>
                        <span>{{ form.email }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="editUser" v-if="edit">
            <form @submit.prevent="submit">
                <div class="header">
                    <span>Мои данные</span>
                </div>
                <div class="body">
                    <div class="form">
                        <FormField name="nick_name" :initialValue="form.nick_name">
                            <label>Имя аккаунта</label>
                            <InputText v-model="form.nick_name" :class="form.errors.nick_name ? 'error' : ''" placeholder="Имя аккаунта" fluid />
                            <Message v-if="form.errors.nick_name" severity="error" size="small" variant="simple">{{ form.errors.nick_name }}</Message>
                        </FormField>
                        <FormField name="age" :initialValue="form.age">
                            <label>Возраст</label>
                            <InputNumber
                                v-model="form.age"
                                mode="decimal"
                                showButtons
                                :min="18"
                                :max="100"
                                :class="'w-full' + form.errors.age ? 'error' : ''"
                                placeholder="Возраст"
                                fluid
                            />
                            <Message v-if="form.errors.age" severity="error" size="small" variant="simple">{{ form.errors.age }}</Message>
                        </FormField>
                        <FormField name="gender" :initialValue="form.gender">
                            <label>Пол</label>
                            <Select
                                v-model="form.gender"
                                :options="genders"
                                optionLabel="value"
                                optionValue="key"
                                :class="form.errors.gender ? 'error' : ''"
                                placeholder="Пол"
                                fluid
                            />
                            <Message v-if="form.errors.gender" severity="error" size="small" variant="simple">{{ form.errors.gender }}</Message>
                        </FormField>
                        <FormField>
                            <label>Город</label>
                            <InputText placeholder="" fluid />
                        </FormField>
                    </div>
                    <div class="form">
                        <FormField name="email" :initialValue="form.email">
                            <label>Почта</label>
                            <InputText v-model="form.email" :class="form.errors.email ? 'error' : ''" placeholder="Почта" fluid />
                            <Message v-if="form.errors.email" severity="error" size="small" variant="simple">{{ form.errors.email }}</Message>
                        </FormField>
                    </div>
                    <div class="form">
                        <FormField name="password" :initialValue="form.password">
                            <label>Новый пароль</label>
                            <Password
                                v-model="form.password"
                                :class="form.errors.password ? 'error' : ''"
                                placeholder="***********"
                                :feedback="false"
                                toggleMask
                                fluid
                            />
                            <Message v-if="form.errors.password" severity="error" size="small" variant="simple">{{ form.errors.password }}</Message>
                        </FormField>
                        <FormField name="password_confirmation" :initialValue="form.password_confirmation">
                            <label>Подтвердите пароль</label>
                            <Password
                                v-model="form.password_confirmation"
                                :class="form.errors.password ? 'error' : ''"
                                placeholder="***********"
                                :feedback="false"
                                toggleMask
                                fluid
                            />
                        </FormField>
                    </div>
                </div>

                <div class="footer">
                    <Button type="submit" class="orange" label="Сохранить" :disabled="form.processing">
                        <template #icon>
                            <span class="p-button-icon material-symbols-outlined">save</span>
                        </template>
                    </Button>
                    <Button type="submit" class="grey" label="Отменить">
                        <template #icon>
                            <span class="p-button-icon material-symbols-outlined">close</span>
                        </template>
                    </Button>
                </div>
            </form>
        </div>
        <Link :href="route('user.referrals.index')" class="infoBlock referrals">
            <div class="header">
                <span>Рефералы</span>
                <i class="p-button-icon material-symbols-outlined shortLink">arrow_outward</i>
            </div>
            <div class="body">
                <div class="item">
                    <div class="header">Приведено клиентов</div>
                    <div class="value">0</div>
                </div>
                <div class="item">
                    <div class="header">Приведено специалистов</div>
                    <div class="value">0</div>
                </div>
                <div class="item">
                    <div class="header">Заработано с клиентов</div>
                    <div class="value">0.00 ₽</div>
                </div>
                <div class="item">
                    <div class="header">Заработано со специалистов</div>
                    <div class="value">0.00 ₽</div>
                </div>
            </div>
        </Link>
        <div class="twoColumn">
            <div class="infoBlock setting">
                <div class="header">
                    <span>Настройка уведомлений</span>
                </div>
                <div class="body">
                    <div class="switchList">
                        <div class="switch">
                            <ToggleSwitch />
                            <span>Новые сообщения</span>
                        </div>
                        <div class="switch">
                            <ToggleSwitch />
                            <span>Новые статьи</span>
                        </div>
                        <div class="switch">
                            <ToggleSwitch />
                            <span>Реклама</span>
                        </div>
                    </div>
                </div>
            </div>
            <Link :href="route('user.reviews.index')" class="infoBlock reviews">
                <div class="header">
                    <span>Отзывы</span>
                    <i class="p-button-icon material-symbols-outlined shortLink">arrow_outward</i>
                </div>
                <div class="body">
                    <span class="p-button-icon material-symbols-outlined">star</span>
                    <span>0</span>
                </div>
            </Link>
        </div>
        <Dialog v-model:visible="setAvatarDialog" modal header="Выберете свой аватар" class="setAvatar">
            <div class="list">
                <template v-for="item in avatars">
                    <div
                        :style="'background: url(\'' + item.url + '\') 50% / cover no-repeat;'"
                        :class="'item' + (item.url == form.avatar ? ' active' : '')"
                        @click="submitAvatar(item.id)"
                    >
                        <div class="status">
                            <span class="p-button-icon material-symbols-outlined">check</span>
                        </div>
                    </div>
                </template>
            </div>
        </Dialog>
    </div>
</template>

<style lang="scss">
.setAvatar {
    display: flex;
    flex-direction: column;
    gap: 30px;
    border-radius: 30px;
    width: 760px;
    height: 595px;
    padding: 40px;
    box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.25);

    .p-dialog-header {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        padding: 0;
        margin: 0;

        .p-dialog-title {
            font-weight: 500;
            font-size: 30px;
            color: rgba(43, 42, 41, 1);
        }

        .p-dialog-header-actions {
            button {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
                margin: 0;
                width: 35px;
                height: 35px;
                color: rgba(43, 42, 41, 1);
                font-size: 20px;
            }
        }
    }

    .p-dialog-content {
        padding: 0;
        margin: 0;

        .list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;

            .item {
                display: flex;
                justify-content: right;
                width: 99px;
                height: 98px;
                padding: 6px;
                border-radius: 15px;
                border: 3px solid rgba(228, 228, 228, 1);
                cursor: pointer;

                .status {
                    display: none;
                    justify-content: center;
                    align-items: center;
                    width: 24px;
                    height: 24px;
                    border-radius: 10px;
                    padding: 6px 4px;
                    background: rgba(232, 78, 39, 1);

                    span {
                        font-size: 16px;
                        color: rgba(255, 255, 255, 1);
                    }
                }

                &.active {
                    border: 3px solid rgba(232, 78, 39, 1);

                    .status {
                        display: flex;
                    }
                }
            }
        }
    }
}

.userProfile {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 30px;
    width: 100%;

    .newQuestion {
        display: flex;
        flex-grow: 1;

        a {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            gap: 20px;
            border-radius: 15px;
            border: 2px dashed rgba(224, 224, 224, 1);
            padding: 30px;
            background: rgba(248, 248, 248, 1);
            text-decoration: none;

            span {
                font-weight: 400;
                font-size: 20px;
                color: rgba(43, 42, 41, 1);
            }

            i {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 40px;
                height: 40px;
                gap: 10px;
                border-radius: 15px;
                padding: 10px 20px;
                background: rgba(232, 78, 39, 1);
                color: rgba(255, 255, 255, 1);
                font-size: 24px;
            }

            &:hover {
                background: rgba(251, 231, 226, 1);
                border-color: rgba(232, 78, 39, 1);
            }
        }
    }

    .statistics {
        display: flex;
        flex-wrap: nowrap;
        gap: 20px;

        .item {
            position: relative;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            gap: 10px;
            border-radius: 15px;
            padding: 20px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            text-decoration: none;

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 10px;

                span, i {
                    font-weight: 400;
                    font-size: 20px;
                }
            }

            .body {
                display: flex;
                align-items: center;
                gap: 10px;

                span {
                    font-weight: 600;
                    font-size: 30px;
                }

                i {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;
                    border-radius: 99px;
                    padding: 7px 7px;
                    font-size: 19px;
                }
            }

            &:hover {
                .header {
                    i {
                        transform: rotate(180deg);
                    }
                }
            }

            &.question {
                background: rgba(232, 78, 39, 1);

                & .body > i {
                    background: rgba(255, 255, 255, 0.3);
                }

                &:hover {
                    background: rgba(200, 68, 34, 1);
                }
            }

            &.consultations {
                background: rgba(228, 224, 212, 1);
                color: rgba(43, 42, 41, 1);

                & .body > i {
                    background: rgba(43, 42, 41, 0.2);
                }

                &:hover {
                    background: rgba(210, 206, 192, 1);
                }
            }

            &.files {
                background: rgba(198, 214, 209, 1);
                color: rgba(43, 42, 41, 1);

                & .body > i {
                    background: rgba(43, 42, 41, 0.2);
                }

                &:hover {
                    background: rgba(174, 199, 191, 1);
                }
            }

            &.finance {
                background: rgba(43, 42, 41, 1);

                & .body > i {
                    background: rgba(255, 255, 255, 0.3);
                }

                &:hover {
                    background: rgba(62, 61, 60, 1);
                }
            }
        }
    }

    .infoUser {
        display: flex;
        gap: 40px;
        border-radius: 15px;
        padding: 20px;
        background: rgba(248, 248, 248, 1);

        .avatar {
            display: flex;
            justify-content: right;
            gap: 10px;
            width: 240px;
            height: 240px;
            border-radius: 10px;
            padding: 10px;

            .edit_avatar {
                gap: 0;
                border-radius: 15px;
                width: 40px;
                height: 40px;
                padding: 4px;
                background: rgba(0, 0, 0, 0.3);

                span {
                    font-size: 15px;
                    color: rgba(255, 255, 255, 1);
                }

                &.p-button-icon-only::after {
                    content: '';
                }
            }
        }

        .info {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            gap: 20px;
            padding: 20px 0;

            .header {
                position: relative;
                display: flex;
                justify-content: space-between;
                gap: 10px;

                span {
                    font-weight: 400;
                    font-size: 20px;
                }

                .edit_profile {
                    position: relative;
                    gap: 10px;
                    height: auto;
                    padding: 0;
                    color: rgba(43, 42, 41, 1);
                    span {
                        font-weight: 600;
                        font-size: 20px;
                        text-decoration: underline;
                        text-decoration-style: solid;
                        text-decoration-thickness: 0;
                        text-decoration-skip-ink: auto;
                    }
                }
            }

            .items {
                display: flex;
                flex-direction: column;
                gap: 10px;

                .item {
                    display: flex;
                    justify-content: space-between;

                    span {
                        font-weight: 400;
                        font-size: 20px;
                        color: rgba(43, 42, 41, 0.5);

                        &:last-child {
                            color: rgba(43, 42, 41, 1);
                        }
                    }
                }
            }
        }
    }

    .editUser {
        background: rgba(248, 248, 248, 1);
        border-radius: 15px;
        padding: 40px;

        form {
            display: flex;
            flex-direction: column;
            gap: 40px;

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 10px;

                span {
                    font-weight: 400;
                    font-size: 20px;
                }
            }

            .body {
                display: flex;
                flex-direction: column;
                gap: 30px;

                .form {
                    display: flex;
                    justify-content: space-between;
                    gap: 20px;

                    .p-formfield {
                        display: flex;
                        flex-direction: column;
                        gap: 10px;
                        flex-grow: 1;
                    }
                }
            }

            .footer {
                display: flex;
                gap: 20px;
            }
        }
    }

    .infoBlock {
        display: flex;
        flex-direction: column;
        gap: 40px;
        border-radius: 15px;
        padding: 40px;
        background: rgba(248, 248, 248, 1);
        flex-grow: 1;
        text-decoration: none;

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;

            span {
                font-weight: 400;
                font-size: 20px;
                color: rgba(43, 42, 41, 1);
            }

            i {
                font-weight: 400;
                font-size: 20px;
                color: rgba(255, 255, 255, 1);
            }
        }

        .body {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;

            .item {
                display: flex;
                flex-direction: column;
                gap: 15px;
                width: 49%;

                .header {
                    display: flex;
                    align-items: center;
                    font-weight: 400;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 0.5);
                }

                .value {
                    font-weight: 600;
                    font-size: 30px;
                    color: rgba(43, 42, 41, 1);
                }
            }

            .switchList {
                display: flex;
                flex-direction: column;
                gap: 10px;

                .switch {
                    position: relative;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    font-weight: 400;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 1);
                }
            }
        }

        &:hover {
            .header {
                i {
                    transform: rotate(180deg);
                }
            }
        }

        &.referrals {
            cursor: pointer;

            &:hover {
                background: rgba(233, 233, 233, 1);
            }
        }

        &.reviews {
            cursor: pointer;

            .body {
                justify-content: left;
                align-items: end;
                flex-grow: 1;
                gap: 10px;

                span {
                    font-weight: 600;
                    font-size: 30px;
                    color: rgba(43, 42, 41, 1);
                }

                .p-button-icon {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;
                    border-radius: 15px;
                    padding: 7px;
                    background: rgba(43, 42, 41, 0.1);
                    color: rgba(43, 42, 41, 1);
                    font-size: 16px;
                }
            }

            &:hover {
                background: rgba(233, 233, 233, 1);
            }
        }
    }

    .twoColumn {
        display: flex;
        justify-content: space-between;
        gap: 20px;

        .infoBlock {
            width: 45%;
        }
    }
}
</style>
