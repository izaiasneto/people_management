<template>
    <AuthenticatedLayout :title="'Pessoas'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pessoas</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between py-4 h-fit">
                    <Search v-model="searchInput" @keyup="search"/>
                    <Link :href="route('person.create')">     
                        <v-btn color="light-blue-darken-3" variant="flat">
                            Cadastrar
                        </v-btn>
                    </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <PersonTable :people="people.data"/>
                </div>
                <Pagination :meta="people" v-if="people.total > 0"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { defineComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PersonTable from '@/Components/Table/PersonTable.vue';
import Pagination from '@/Components/Shared/Pagination.vue'
import Search from '@/Components/Shared/Search.vue';
import { VBtn  } from 'vuetify/components';
import { Link } from '@inertiajs/vue3';
import _ from 'lodash';

export default defineComponent({   
    name: 'PersonIndex',

    components: {
        PersonTable,
        AuthenticatedLayout,
        Pagination,
        VBtn,
        Search,
        Link
    },

    props: {
        people: Object,
    },

    data() {
        return {
            searchInput: '',
        }
    },

    methods: {
        search: _.throttle(function() {
            this.$inertia.replace(route('person.index', {search: this.searchInput}));
        }, 200),
    }
})
</script>