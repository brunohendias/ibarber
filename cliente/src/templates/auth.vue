<template>
    <section>
        <div class="container pt-3">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="card-body p-3">
                            <h2 class="fw-bold text-uppercase text-center">
                                {{ title }}
                            </h2>
                            <div class="text-center">
                                <span v-if="msgError" class="alert-danger p-2">
                                    {{ msgError }}
                                </span>
                                <span v-if="msgInfo" class="alert-info p-2">
                                    {{ msgInfo }}
                                </span>
                            </div>
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue'
import { bus, Events } from '@/core/bus'

defineProps({
    title: {
        type: String,
        required: true
    }
})

const msgError = ref<string>('')
const msgInfo = ref<string>('')

watch(() => bus.on(Events.error_auth),
    (msg: string) => {
        msgError.value = msg
        msgInfo.value = ''
    }
)

watch(() => bus.on(Events.info_auth),
    (msg: string) => {
        msgInfo.value = msg
        msgError.value = ''
    }
)
</script>