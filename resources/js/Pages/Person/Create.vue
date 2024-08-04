<template>
    <AuthenticatedLayout :title="'Cadastrar Pessoa'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastrar Pessoa</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto py-10 px-10 bg-white shadow-md rounded-lg">
                <PersonForm :form="form" :disabled="person">
                    <div v-if="!person" class="flex items-center justify-between mt-4">
                        <Link :href="route('person.index')" >
                            <v-btn 
                                color="grey-lighten-1"
                                variant="flat"
                                class="text-gray-100"
                            >
                                Cancelar
                            </v-btn>
                        </Link>
                        <v-btn 
                            color="light-blue-darken-3"
                            variant="flat"
                            :loading="form.processing" 
                            @click="store" 
                        >
                            Cadastrar
                        </v-btn>
                    </div>
                </PersonForm>
                <div v-if="person" class="w-full my-10 flex justify-end">
                    <v-btn 
                        color="light-blue-darken-3"
                        variant="flat"
                        :loading="form.processing" 
                        @click.prevent="show = true" 
                    >
                        Cadastrar Endereço
                    </v-btn>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <DialogModal title="Cadastrar Endereço" :show="show" @close="handleClose">
        <template #content>
            <AddressForm :form="addressForm"/>
        </template>
        <template #footer>
            <div class="w-full flex !justify-between mt-4">
                <v-btn 
                    color="grey-lighten-1"
                    variant="flat"
                    class="text-gray-100"
                    :loading="addressForm.processing"
                    @click="handleClose"
                >
                    Cancelar
                </v-btn>
                <v-btn 
                    color="light-blue-darken-3"
                    variant="flat"
                    :loading="addressForm.processing" 
                    @click.prevent="storeAddress" 
                >
                    Cadastrar
                </v-btn>
            </div>
        </template>
    </DialogModal>
</template>
<script>
import { defineComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PersonForm from '@/Components/Form/Person/Form.vue';
import AddressForm from '@/Components/Form/Address/Form.vue';
import { useForm, Link } from '@inertiajs/vue3';
import { VBtn } from 'vuetify/components';
import DialogModal from '@/Components/Shared/DialogModal.vue';
export default defineComponent({   
    name: 'PersonCreate',

    components: {
        AuthenticatedLayout,
        PersonForm,
        Link,
        VBtn,
        DialogModal,
        AddressForm
    },

    props: {
        person: {
            type: Object,
            default: null
        }
    },

    data() {
        return {
            show: null,
            form: useForm({
                name: null,
                social_name: null,
                cpf: null,
                father_name: null,
                mother_name: null,
                email: null,
                phone: null
            }),
            addressForm: useForm({
                address_type: null,
                cep: null,
                street: null,
                number: null,
                complement: null,
                neighborhood: null,
                state: null,
                city: null,
            })
        }
    },

    methods: {
        store(){
            this.form.post(route('person.store'), {
                preserveState : true,
                only: ['person', 'flash']
            });
        },

        storeAddress(){
            this.addressForm.post(route('address.store', {person: this.person.id}), {
                preserveState : true,
                only: ['person', 'flash']
            });
        },


        handleClose(){
            this.addressForm.clearErros();
            this.addressForm.reset();
            this.show = false;
        }
    }
})
</script>