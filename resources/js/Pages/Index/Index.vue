<template>
  <Head :title="'testando'" v-once/>
  <div class="flex justify-center align-center items-center bg-green-100 w-screen h-screen">
    <div class="flex flex-col text-center">
      <span class="font-medium text-5xl">Pronto para iniciar o projeto</span>
      <span class="font-medium text-5xl">Boa sorte Izaias!!!</span>
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
</script>