<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { userSidebar } from '@/view/Composables/GlobalData';

userSidebar.value = true;

const props = defineProps(['data']);
</script>

<template>
    <Head title="Файлы"></Head>
    <div class="userPageFiles">
        <h2>Файлы</h2>
        <div class="leftBar">
            <div class="diskSpace">
                <div class="circle"></div>
                <div class="data">
                    <span class="title">Доступно места</span>
                    <span class="space">500 мб из 1гб</span>
                </div>
            </div>
            <div class="folders">
                <div class="title">Мои папки</div>
                <Button class="black" label="Основное">
                    <template #icon>
                        <i class="p-button-icon material-symbols-outlined">folder</i>
                    </template>
                </Button>
                <Button class="lightgrey" label="Новая папка">
                    <template #icon>
                        <i class="p-button-icon material-symbols-outlined">folder</i>
                    </template>
                </Button>
                <Button class="lightgreen" label="Создать папку">
                    <template #icon>
                        <i class="p-button-icon material-symbols-outlined">add</i>
                    </template>
                </Button>
            </div>
        </div>
        <div class="files">
            <div class="patch">
                <span>/</span>
                <span>Основное</span>
            </div>
            <div class="search">
                <IconField>
                    <InputIcon>
                        <i class="p-button-icon material-symbols-outlined">search</i>
                    </InputIcon>
                    <InputText class="noborder" placeholder="Поиск по файлам" fluid />
                </IconField>
            </div>
            <div class="FileUpload">
                <FileUpload :multiple="false" customUpload auto>
                    <template #header="{ chooseCallback, uploadCallback, clearCallback }">
                        <input type="button" ref="chooseFile" style="display: none" @click="chooseCallback();clearCallback();" />
                    </template>
                    <template #content>
                        <div class="loadBlock">
                            <i class="p-button-icon material-symbols-outlined">attach_file</i>
                            <div>
                                <span>Перетащите файл или нажмите</span>
                                <Button @click="$refs.chooseFile.click()" class="textStyle blackText" label="загрузить"></Button>
                            </div>
                        </div>
                    </template>
                    <template #empty></template>
                </FileUpload>
            </div>

            <div class="list">
                <div class="item" >
                    <div class="preview">
                        <Image width="55" height="55" preview>
                            <template #image>
                                <img class="img" src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" />
                            </template>
                            <template #preview="slotProps">
                                <img src="/storage/images/files/1.png" alt="Название.jpg" title="Название.jpg" :style="slotProps.style" @click="slotProps.onClick" />
                            </template>
                        </Image>
                    </div>
                    <div class="info">
                        <div class="name">Название.jpg</div>
                        <div class="data">
                            <span>02.09.2025</span>
                            <span>21:27</span>
                            <span>25.2 КБ</span>
                            <Button class="textStyle blackText">
                                <template #icon>
                                    <i class="p-button-icon material-symbols-outlined">compare_arrows</i>
                                </template>
                            </Button>
                            <Button class="textStyle blackText">
                                <template #icon>
                                    <i class="p-button-icon material-symbols-outlined">delete</i>
                                </template>
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.userPageFiles {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;

    & > h2 {
        width: 100%;
    }

    .leftBar {
        display: flex;
        flex-direction: column;
        gap: 30px;
        width: 300px;

        .diskSpace {
            display: flex;
            align-items: center;
            gap: 20px;
            border-radius: 15px;
            padding: 20px;
            background: rgba(248, 248, 248, 1);

            .circle {
                width: 60px;
                height: 60px;
            }

            .data {
                display: flex;
                flex-direction: column;
                gap: 5px;

                .title {
                    font-weight: 400;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 1);
                }

                .space {
                    font-weight: 500;
                    font-size: 20px;
                    color: rgba(43, 42, 41, 1);
                }
            }
        }

        .folders {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .title {
                font-weight: 500;
                font-size: 20px;
                color: rgba(43, 42, 41, 1);
            }

            button {
                width: 100%;
            }
        }
    }

    .files {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        gap: 20px;
        border-radius: 15px;
        padding: 30px;
        background: rgba(248, 248, 248, 1);

        .patch {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 400;
            color: rgba(43, 42, 41, 1);
        }

        .FileUpload {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;

            .p-fileupload {
                display: flex;
                flex-direction: column;
                gap: 15px;
                width: 100%;
                background: none;
                border: none;

                .p-fileupload-header {
                    display: none;
                }

                .p-fileupload-content {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                    padding: 40px;
                    border-radius: 15px;
                    background: rgba(255, 255, 255, 1);
                    border: 2px dashed rgba(224, 224, 224, 1);

                    & > div {
                        display: none;
                    }

                    .loadBlock {
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        font-weight: 500;
                        font-size: 20px;
                        color: rgba(43, 42, 41, 1);

                        div {
                            display: flex;
                            align-items: center;
                            gap: 5px;

                            span {
                                font-weight: 500;
                                font-size: 20px;
                            }

                            button {
                                height: auto;
                            }
                        }
                    }
                }
            }
        }

        .list {
            display: flex;
            flex-direction: column;
            gap: 20px;

            .item {
                display: flex;
                gap: 20px;
                width: 100%;

                .preview {
                    width: 55px;
                    height: 55px;
                    border-radius: 15px;

                    .p-image-preview {

                        .img {
                            width: 55px;
                            height: 55px;
                            border-radius: 15px;
                        }
                    }
                }

                .info {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    flex-grow: 1;
                    gap: 20px;

                    .name {
                        flex-grow: 1;
                        font-weight: 400;
                        font-size: 20px;
                        color: rgba(0, 0, 0, 1);
                    }

                    .data {
                        display: flex;
                        align-items: center;
                        gap: 30px;
                        font-weight: 400;
                        font-size: 20px;
                        color: rgba(43, 42, 41, 0.5);

                        button {
                            text-decoration: none;
                            color: rgba(43, 42, 41, 1);

                            &::after {
                                display: none;
                            }
                        }
                    }
                }

            }
        }
    }
}
</style>
