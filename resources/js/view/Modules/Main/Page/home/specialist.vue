<script setup lang="ts">

</script>

<template>
    <div class="homeSpecialist">
        <div class="item one">
            <Chip class="black" label="Шаг 1" />
            <div class="body">
                <div class="title">Создай аккаунт</div>
                <div class="desc">Быстрая регистрация через почту или соцсети.</div>
            </div>
        </div>
        <div class="item two">
            <Chip class="black" label="Шаг 2" />
            <div class="body">
                <div class="title">Заполни профиль</div>
                <div class="desc">Укажи стаж, специализации, город, контактные данные.</div>
            </div>
        </div>
        <div class="item three">
            <Chip class="black" label="Шаг 3" />
            <div class="body">
                <div class="title">Подтверди квалификацию</div>
                <div class="desc">Загрузи дипломы, лицензии — мы проверим.</div>
            </div>
        </div>
        <div class="item four">
            <Chip class="white" label="Шаг 4" />
            <div class="body">
                <div class="title">Начни консультировать</div>
                <div class="desc">Получай уведомления, отвечай клиентам, зарабатывай.</div>
                <Button class="white blackText">
                    <span>Стать специалистом</span>
                    <i class="p-button-icon material-symbols-outlined">arrow_right_alt</i>
                </Button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.homeSpecialist {
    display: flex;
    justify-content: space-between;
    gap: 22px;
    width: 100%;

    .item {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: start;
        gap: 30px;
        width: 360px;
        height: 240px;
        border-radius: 15px;
        padding: 30px;

        .body {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .title {
                font-weight: 700;
                font-size: 25px;
                color: rgba(43, 42, 41, 1);
            }

            .desc {
                font-weight: 400;
                font-size: 16px;
                color: rgba(43, 42, 41, 0.5);
            }

            button {
                padding: 10px 20px;
                height: auto;
                border-radius: 10px;

                span {
                    font-weight: 500;
                    font-size: 20px;
                }

                span {
                    font-size: 20px;
                }
            }
        }

        &.one {
            background: rgba(251, 251, 251, 1);
        }

        &.two {
            background: rgba(228, 224, 212, 1);
        }

        &.three {
            background: rgba(198, 214, 209, 1);
        }

        &.four {
            background: rgba(232, 78, 39, 1);

            .body {

                .title {
                    color: rgba(255, 255, 255, 1);
                }

                .desc {
                    color: rgba(255, 255, 255, 0.5);
                }
            }
        }
    }
}
</style>
