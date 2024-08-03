<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { VTextField, VBtn} from 'vuetify/components';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Cadastrar" />

            <v-form>
                <v-container>
                
                <v-text-field
                    v-model="form.name"
                    id="name"
                    label="Name"
                    type="text"
                    class="mt-1"
                    autofocus
                    @input="form.clearErrors('name')"
                    :error-messages="form.errors.name"
                >
                </v-text-field>


                <v-text-field
                    v-model="form.email"
                    id="email"
                    label="Email"
                    type="email"
                    class="mt-4"
                    @input="form.clearErrors('email')"
                    :error-messages="form.errors.email"
                >
                </v-text-field>

                <v-text-field
                    v-model="form.password"
                    id="password"
                    label="Password"
                    type="password"
                    class="mt-4"
                    @input="form.clearErrors('password')"
                    :error-messages="form.errors.password"
                >
                </v-text-field>

                <v-text-field
                    v-model="form.password_confirmation"
                    id="password_confirmation"
                    label="Confirm Password"
                    type="password"
                    class="mt-4"
                    @input="form.clearErrors('password_confirmation')"
                    :error-messages="form.errors.password_confirmation"
                >
                </v-text-field>

                <v-row class="mt-4">
                    <v-col class="flex justify-between items-center align-center">
                        <Link
                            :href="route('login')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Já está cadastrado?
                        </Link>

                        <v-btn
                            color="light-blue darken-3"
                            variant="flat"
                            :loading="form.processing"
                            @click="submit"
                            class="ml-4"
                        >
                            Cadastrar
                        </v-btn>
                    </v-col>
                </v-row>
                </v-container>
            </v-form>
    </GuestLayout>
</template>
