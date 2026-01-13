<script setup>
import { Header, Footer, Content } from './Components/index.js';

</script>

<template>
    <main class="mainLayout">
        <Header />

        <Content>
            <slot />
        </Content>

        <Footer />
    </main>
</template>

<style lang="scss">
.mainLayout {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 50px;
    width: 100%;
    flex-grow: 1;
}
</style>
