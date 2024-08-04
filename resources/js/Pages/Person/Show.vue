<template>
    <AuthenticatedLayout :title="person.name">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ person.name }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl flex flex-col gap-y-6 mx-auto py-6 px-10 bg-white shadow-md rounded-lg">
                <span class="text-xl text-blue-800 font-semibold">Dados Pessoais</span>
                <Person :person="person"/> 

                <div class="flex justify-between">
                    <span class="text-xl text-blue-800 font-semibold">Endereços</span>
                    <v-btn
                        class="ma-2"
                        color="primary"
                        @click.prevent="show = true"
                    >
                        Histórico
                        <v-icon icon="mdi-history" end />
                    </v-btn>
                </div>
            </div>
        </div>
        <DialogModal title="Histórico de Endereços" :show="show" @close="show = false">
        </DialogModal>
    </AuthenticatedLayout>
</template>
<script>
import { defineComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Person from './Partials/Person.vue';
import { VBtn, VIcon } from 'vuetify/components';
import DialogModal from '@/Components/Shared/DialogModal.vue';

export default defineComponent({   
    name: 'PersonShow',
    
    components: {
        AuthenticatedLayout,
        Person,
        VBtn,
        VIcon,
        DialogModal
    },

    props: {
        person: Object,
    },

    data() {
        return {
            show: false,
        }
    }
})
</script>