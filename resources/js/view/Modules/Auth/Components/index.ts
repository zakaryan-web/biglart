import { defineAsyncComponent } from "vue";
export const Header = defineAsyncComponent(() => import('./header/index.vue'));
export const Social = defineAsyncComponent(() => import('./socialLink/index.vue'));
