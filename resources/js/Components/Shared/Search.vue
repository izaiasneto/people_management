<template>
    <div class="w-[300px]">
      <v-text-field
        v-model="modelValue"
        label="Pesquisar..."
        variant="outlined"
        density="compact"
        append-inner-icon="mdi-magnify"
        @input="handleInput"
      ></v-text-field>
    </div>
</template>
<script> 
import {defineComponent} from 'vue';
import { VTextField, VContainer } from 'vuetify/components';

export default defineComponent({
    components: {
        VTextField,
        VContainer,
    },

    props: {
      modelValue: String,
      maxWidth: {
        type: Number,
        default: 100,
      },
    },

    emits: ['update:modelValue'],

    methods:{
      handleInput ( event )
      {
        const inputValue = event.target.value;
        this.$emit("update:modelValue", inputValue);
      },
    },

})
</script>

  