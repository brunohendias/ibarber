import { ref } from "vue";
import { Bus } from './interfaces';
import { Events } from "./enums";
const Event = ref(new Map());

const bus: Bus = {
    emit(event: string, args: any): void {
        Event.value.set(event, args ?? Math.random());
    },

    on: (event: string) => Event.value.get(event)
}

export { bus, Events }