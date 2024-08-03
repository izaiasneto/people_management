<template>
    <GuestLayout>
        <Head title="Log in" />

        <v-alert v-if="status" type="success" class="mb-4">
            {{ status }}
        </v-alert>

        <v-form @submit.prevent="submit">
            <v-text-field
                v-model="form.email"
                label="Email"
                type="email"
                outlined
                dense
                autofocus
                autocomplete="username"
            />

            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                outlined
                dense
                autocomplete="current-password"
            />

            <div class="flex items-center justify-between mt-4">
                <Link method="get" :href="route('register')">
                    <v-btn>
                        Cadastre-se
                    </v-btn>
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

<script setup>
import { useForm } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/vue3';
import { VTextField, VCheckbox, VBtn, VAlert } from 'vuetify/components';
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

