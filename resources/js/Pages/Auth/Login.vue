<script setup>
import { useForm } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/vue3';
import { VTextField, VBtn, VAlert } from 'vuetify/components';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <v-alert v-if="status" type="success" class="mb-4">
            {{ status }}
        </v-alert>

        <v-form>
            <v-text-field
                v-model="form.email"
                label="Email"
                type="email"
                outlined
                dense
                autofocus
                @input="form.clearErrors('email')"
                :error-messages="form.errors.email"
                autocomplete="username"
            />
            <v-text-field
                v-model="form.password"
                label="Senha"
                type="password"
                outlined
                dense
                @input="form.clearErrors('password')"
                :error-messages="form.errors.password"
                autocomplete="current-password"
            />

            <div class="flex items-center justify-between mt-4">
                <Link
                    :href="route('register')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Cadastre-se
                </Link>
                <v-btn 
                    color="light-blue-darken-3"
                    variant="flat"
                    :loading="form.processing" 
                    @click="submit" 
                >
                    Login
                </v-btn>
            </div>
        </v-form>
    </GuestLayout>
</template>


