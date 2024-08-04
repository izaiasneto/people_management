<template>
    <form class="w-full flex flex-col space-y-2">
      <v-select
        v-model="form.address_type"
        label="Tipo de Endereço"
        :items="['Residencial', 'Comercial']"
        id="address_type"
        variant="outlined"
        density="compact"
        :error-messages="form.errors.address_type"
        class="col-span-2"
      />
      <v-text-field
        v-model="form.cep"
        label="CEP"
        id="cep"
        variant="outlined"
        density="compact"
        @input="searchAddresByCep"
        :error-messages="form.errors.cep"
        v-mask="'#####-###'"
        class="col-span-2"
        :loading="loading"
      />
      <v-text-field
        v-model="form.street"
        label="Logradouro"
        id="logradouro"
        variant="outlined"
        density="compact"
        @input="form.clearErrors('street')"
        :error-messages="form.errors.street"
        :disabled="isFieldDisabled('street')"
        class="col-span-2"
      />
      <div class="flex flex-row gap-2">
        <v-text-field
          v-model="form.number"
          label="Número"
          id="number"
          variant="outlined"
          density="compact"
          @input="form.clearErrors('number')"
          :error-messages="form.errors.number"
        />
        <v-text-field
          v-model="form.complement"
          label="Complemento"
          id="complement"
          variant="outlined"
          density="compact"
          @input="form.clearErrors('complement')"
          :error-messages="form.errors.complement"
        />
      </div>
      <v-text-field
        v-model="form.neighborhood"
        label="Bairro"
        id="neighborhood"
        variant="outlined"
        density="compact"
        @input="form.clearErrors('neighborhood')"
        :error-messages="form.errors.neighborhood"
        :disabled="isFieldDisabled('neighborhood')"
        class="col-span-2"
      />
      <div class="flex flex-row gap-2">
        <v-text-field
          v-model="form.state"
          label="Estado"
          id="state"
          variant="outlined"
          density="compact"
          @input="form.clearErrors('state')"
          :error-messages="form.errors.state"
          :disabled="isFieldDisabled('state')"
        />
        <v-text-field
          v-model="form.city"
          label="Cidade"
          id="city"
          variant="outlined"
          density="compact"
          @input="form.clearErrors('city')"
          :error-messages="form.errors.city"
          :disabled="isFieldDisabled('city')"
        />
      </div>
    </form>
</template>
  
<script>
import { defineComponent } from 'vue';
import { VTextField, VSelect } from 'vuetify/components';

export default defineComponent({
    name: 'AddressForm',

    components: {
        VTextField, 
        VSelect
    },

    props: {
        form: Object,
    },

    data() {
        return {
            loading: false,
            filledFields: {
                street: false,
                neighborhood: false,
                state: false,
                city: false
            }
        }
    },

    methods: {
        searchAddresByCep() {
            this.form.clearErrors('cep');

            let cep = this.form.cep;
            const cepFormatted = cep.replace(/\D/g, '');

            if (cepFormatted.length === 8) {

                this.loading = true;

                axios
                    .get(`https://viacep.com.br/ws/${cepFormatted}/json/`)
                    .then(response => {
                        const resposta = response.data;

                        if (!resposta.erro) {
                            this.setAddress(resposta);
                            this.markFieldsAsFilled(resposta)
                        } 

                        this.loading = false;
                    })
                    .catch(error => {
                        this.loading = false;
                    });
            } else {
                this.resetAddress();
                this.form.clearErrors('cep');
            }
        },

        resetAddress() {
            this.form.neighborhood = null;
            this.form.street = null;
            this.form.state = null;
            this.form.city = null;
        },

        setAddress(resposta) {
            this.form.state = resposta.uf;
            this.form.city = resposta.localidade;
            this.form.neighborhood = resposta.bairro;
            this.form.street = resposta.logradouro; 
        },

        markFieldsAsFilled(resposta) {
            this.filledFields = {
                street: !!resposta.logradouro,
                neighborhood: !!resposta.bairro,
                state: !!resposta.uf,
                city: !!resposta.localidade
            };
        },

        isFieldDisabled(field) {
            return this.filledFields[field];
        }
    }
})
</script>
  