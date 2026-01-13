<script setup lang="ts">
import { isHome } from '@/view/Composables/GlobalData.js';
</script>

<template>
    <div class="homeStats" v-if="isHome">
        <div class="video">
            <video autoplay muted loop>
                <source src="/storage/video/background.mp4" type="video/mp4" />
            </video>
        </div>
        <div class="stats">
            <div class="block">
                <div class="info">
                    <div class="number">1 309</div>
                    <div class="desc">Вопросов решено на платформе</div>
                </div>
                <Button class="black" label="Задать свой вопрос">
                    <template #icon>
                        <span class="p-button-icon material-symbols-outlined">question_mark</span>
                    </template>
                </Button>
            </div>
            <div class="block">
                <div class="info">
                    <div class="number">5 213</div>
                    <div class="desc">Зарегистрировано специалистов на платформе</div>
                </div>
                <Button class="darkgreen" label="Хочу отвечать на вопросы">
                    <template #icon>
                        <span class="p-button-icon material-symbols-outlined">lightbulb_2</span>
                    </template>
                </Button>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.homeStats {
    position: relative;
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 266px 0 50px 0;
    border-radius: 0 0 30px 30px;
    overflow: hidden;

    .video {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -100;
        overflow: hidden;
        border-radius: 0 0 30px 30px;

        video {
            min-width: 100%;
        }
    }

    .stats {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        gap: 20px;
        width: 1520px;

        .block {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;
            gap: 30px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 30px 10px 10px 10px;
            backdrop-filter: blur(50px);
            background: rgba(255, 255, 255, 0.2);

            .info {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 5px;
                color: rgba(255, 255, 255, 1);

                .number {
                    font-weight: 800;
                    font-size: 35px;
                }

                .desc {
                    font-weight: 400;
                    font-size: 20px;
                }
            }

            button {
                width: 100%;
            }
        }
    }
}
</style>
