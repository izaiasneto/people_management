<template>
      <form class="flex flex-col space-y-2">
        <v-text-field
            v-model="form.name"
            label="Nome"
            id="name"
            variant="outlined"
            density="compact"
            @input="form.clearErrors('name')"
            :error-messages="form.errors.name"
            class="col-span-2"
            :disabled="disabled"
        />
        <v-text-field
            v-model="form.social_name"
            label="Nome Social"
            id="social_name"
            @input="form.clearErrors('social_name')"
            :error-messages="form.errors.social_name"
            variant="outlined"
            density="compact"
            class="col-span-2"
            :disabled="disabled"
        />
        
        <div class="flex flex-row gap-2">
            <v-text-field
                v-model="form.cpf"
                label="CPF"
                id="cpf"
                @input="form.clearErrors('cpf')"
                :error-messages="form.errors.cpf"
                v-mask="'###.###.###-##'"
                variant="outlined"
                density="compact"
                class="col-span-2"
                :disabled="disabled"
            />
            <v-text-field
                v-model="form.email"
                label="Email"
                id="email"
                variant="outlined"
                density="compact"
                type="email"
                @input="form.clearErrors('email')"
                :error-messages="form.errors.email"
                :disabled="disabled"
            />
            <v-text-field
                v-model="form.phone"
                label="Telefone"
                id="phone"
                variant="outlined"
                density="compact"
                @input="form.clearErrors('phone')"
                :error-messages="form.errors?.phone"
                v-mask="'(##) # ####-####'"
                :disabled="disabled"
            />
        </div>
        
        <div class="flex flex-row gap-2">
            <v-text-field
                v-model="form.father_name"
                label="Nome do Pai"
                id="father_name"
                variant="outlined"
                density="compact"
                @input="form.clearErrors('father_name')"
                :error-messages="form.errors?.father_name"
                :disabled="disabled"
            />
            <v-text-field
                v-model="form.mother_name"
                label="Nome da Mãe"
                id="mother_name"
                @input="form.clearErrors('mother_name')"
                :error-messages="form.errors?.mother_name"
                variant="outlined"
                density="compact"
                :disabled="disabled"
            />
        </div>
        
      </form>
      <slot/>
</template>
<script>
import { defineComponent } from 'vue';

export default defineComponent({   
    name: 'PersonForm',

    props: {
        form: Object,
        disabled: {
            type: Boolean,
            default: false,
        }
    }
})
</script>