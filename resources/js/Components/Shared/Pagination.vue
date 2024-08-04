<template>
  <v-container class="flex justify-start my-5 !p-0">
      <v-pagination
        v-model:page="meta.current_page"
        :length="totalPages"
        circle
        total-visible="3"
        density="compact"
        @update:modelValue="toPage"
      ></v-pagination>
  </v-container>
</template>

<script>
import { defineComponent } from 'vue'
import { VPagination, VContainer } from 'vuetify/components'

export default defineComponent({
  components:{
    VPagination,
    VContainer
  },

  props: {
    meta: Object,
  },

  computed: {
        totalPages() {
          const total = this.meta.total/this.meta.per_page;
          const rounded = Math.round(total);
          if (total < rounded)
              return rounded
              
          return total == rounded ? rounded : rounded + 1
        }
    },
  
  methods: {
    toPage(pageNumber) {
        const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        const query = Object.keys(params).length > 0 ? window.location.search.split('&') : [];
        
        if(params.page) { query.pop() };            
        
        const filters = query.length > 0 ? query.join('&') + `&page=${pageNumber}` : `page=${pageNumber}`;
        
        return this.$inertia.get(`${this.meta.path}?${filters}`, {}, {
            preserveState: true,  // Preserve the current state of the page
            onSuccess: (page) => {
                this.meta.current_page = page.meta.current_page;  // Update current_page after successful navigation
            }
        });
    }
  }
})
</script>
