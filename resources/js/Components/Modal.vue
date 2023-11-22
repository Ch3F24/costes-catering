<template>
    <Teleport to="body">
        <div class="fixed bg-black/75 top-0 right-0 w-screen h-screen overflow-auto z-50 px-4 md:px-10 xl:px-20 pb-4" ref="modal">
            <div class="relative my-4 text-right">
                <span class="text-white inline-block cursor-pointer hover:text-silver-chalice" @click="this.$emit('close')" title="close">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 1L1 19.5M1 1L19.5 19.5" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </span>
            </div>
            <div class="xl:container xl:mx-auto flex items-center min-h-[80vh]" ref="target">
                <Transition>
                    <slot v-if="loading"></slot>
                </Transition>
            </div>
        </div>
    </Teleport>
</template>

<script>
const body = document.body
import { onClickOutside } from "@vueuse/core";

export default {
    name: "modal",
    emits: ['close'],
    data() {
        return {
            loading: false
        }
    },
    mounted() {
        body.style.overflow = 'hidden'
        const _this = this
        this.loading = true;
        onClickOutside(this.$refs.target,function (e) {
            _this.$emit('close')
        })
    },
    beforeUnmount() {
        body.style.overflow = 'auto'
    }
}
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease-in;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
