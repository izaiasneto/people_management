<template>
    <AuthenticatedLayout :title="'Editar Pessoa'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Pessoa</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between py-4 h-fit">
                   
                </div>   
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { defineComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default defineComponent({   
    name: 'PersonEdit',
    
    components: {
        AuthenticatedLayout,
    },

    props: {
        person: Object,
    }
})
</script>