<template>
    <div class="flex flex-col space-y-2">
      <v-text-field
          v-model="person.name"
          label="Nome"
          id="name"
          variant="outlined"
          density="compact"
          class="col-span-2"
          :readonly="true"
      />
      <v-text-field
          v-model="person.social_name"
          label="Nome Social"
          id="social_name"
          variant="outlined"
          density="compact"
          class="col-span-2"
          :readonly="true"
      />
      
      <div class="flex flex-row gap-2">
          <v-text-field
              v-model="person.cpf"
              label="CPF"
              id="cpf"
              v-mask="'###.###.###-##'"
              variant="outlined"
              density="compact"
              class="col-span-2"
              :readonly="true"
          />
          <v-text-field
              v-model="person.email"
              label="Email"
              id="email"
              variant="outlined"
              density="compact"
              type="email"
              :readonly="true"
          />
          <v-text-field
              v-model="person.phone"
              label="Telefone"
              id="phone"
              variant="outlined"
              density="compact"
              v-mask="'(##) # ####-####'"
              :readonly="true"
          />
      </div>
      
      <div class="flex flex-row gap-2">
          <v-text-field
              v-model="person.father_name"
              label="Nome do Pai"
              id="father_name"
              variant="outlined"
              density="compact"
              :readonly="true"
          />
          <v-text-field
              v-model="person.mother_name"
              label="Nome da Mãe"
              id="mother_name"
              variant="outlined"
              density="compact"
              :readonly="true"
          />
      </div>  
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import { VTextField} from 'vuetify/components';

export default defineComponent({   
  name: 'Person',

  components: {
    VTextField,
  },

  props: {
    person: Object,
  }
})
</script>