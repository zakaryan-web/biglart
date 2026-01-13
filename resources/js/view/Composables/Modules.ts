import { defineAsyncComponent } from "vue";

function componentMapping(Type: string, Component: string) {
    const modules = import.meta.glob(`../Modules/*/Page/**/*.vue`);
    const Path = `../Modules/${Type}/Page/${Component}.vue`;
    for (const mPath in modules) {
        if(Path == mPath) return modules[mPath];
    }
    return '';
}

export function getComponent (Type: string, Component: string) {
    const load = componentMapping(Type, Component);
    // @ts-ignore
    return defineAsyncComponent(load);
}
