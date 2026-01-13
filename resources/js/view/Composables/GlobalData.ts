import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
// @ts-ignore
export const User: any = computed(() => {
// @ts-ignore
    if(!usePage().props.auth.user){
        return false;
    }
// @ts-ignore
    usePage().props.auth.user.data.roleClient = usePage().props.auth.user.roleClient;
// @ts-ignore
    usePage().props.auth.user.data.roleSpecialist = usePage().props.auth.user.roleSpecialist;
// @ts-ignore
    return usePage().props.auth.user.data;
});

export const setAvatar = (avatar: string) => {
// @ts-ignore
    usePage().props.auth.user.data.personal.avatar = avatar;
};

export const Config: any = computed(() => usePage().props.config);

export const isHome = ref(false);
export const userSidebar = ref(true);

export const checkAuthor =  (id: number) => {
    // @ts-ignore
    return (usePage().props.auth.user && usePage().props.auth.user.data.id == id);
};

export const pluralize = (number: number, text_1: string, text_2: string, text_3: string) => {
    switch (number % 10) {
        case 1:
            return text_1;
        case 2:
        case 3:
        case 4:
            return text_2;
        default:
            return text_3;
    }
};
