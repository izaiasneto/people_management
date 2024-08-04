<script setup>
import Modal from '@/Components/Modal.vue';

const emit = defineEmits(['close']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    title: String,
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="w-full bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <button type="button" @click="close" class="absolute top-0 right-0 m-2 flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-vertically-centered-scrollable-modal">
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
                <div class="flex flex-col w-full">
                    <div class="mt-3 text-start sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900">
                            <span>{{ title }}</span>
                        </h3>
                    </div>
                    <div class="w-full mt-2 text-sm text-gray-600 p-4">
                        <slot name="content"/>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 border-t border-slate-100 text-right">
            <slot name="footer" />
        </div>
    </Modal>
</template>
