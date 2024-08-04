<template>
    <v-table>
        <thead>
            <tr>
                <th class="text-left">
                    ID
                </th>
                <th class="text-left">
                    Nome
                </th>
                <th class="text-left">
                    CPF
                </th>
                <th class="text-left">
                    Email
                </th>
                <th class="text-left">
                    Telefone
                </th>
                <th class="text-center">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="people.length === 0">
                <td colspan="6" class="text-center text-gray-400">Sem pessoas</td>
            </tr>
            <tr v-else
                v-for="(person, index) in people"
                :key="index"
            >
                <td>{{ person.id }}</td>
                <td>{{ person.name }}</td>
                <td>{{ person.cpf ? formatCPF(person.cpf) : '' }}</td>
                <td>{{ person.email }}</td>
                <td>{{ person.phone }}</td>
                <td>
                    <div class="flex flex-row justify-center gap-2">
                        <!-- <v-btn color="amber-darken-1" icon="mdi-pen" size="x-small"></v-btn> -->
                        <Link :href="route('person.show', { person: person.id})">
                            <v-btn color="light-blue-darken-3" icon="mdi-eye" size="x-small"></v-btn>
                        </Link>
                    </div>
                </td>
            </tr>
        </tbody>
    </v-table>
</template>
<script>
import {defineComponent} from "vue";
import { VTable } from 'vuetify/components';
import { Link } from '@inertiajs/vue3';

export default defineComponent({
    components: {
        VTable,
        Link
    },
    
    props: {
        people: Array,
    },

    methods:{
        formatCPF(cpf) {
            return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        },
    }
});
</script>
