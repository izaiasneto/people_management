import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createVuetify } from 'vuetify';
import { VTextField, VForm, VContainer, VBtn } from 'vuetify/components';
import '@mdi/font/css/materialdesignicons.css';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueTheMask from 'vue-the-mask'

import 'vuetify/styles';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const vuetify = createVuetify({
    components: {
        VTextField,
        VForm,
        VContainer,
        VBtn
    }
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify) 
            .use(VueSweetalert2)
            .use(VueTheMask)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
