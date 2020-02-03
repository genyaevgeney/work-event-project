<template>
  <div class="Dashboard__pagination">
      {{ createIterator() }}
      <ul v-if="backendData.pages > 1" class="pagination text-center">
        <li v-if="backendData.current_page == 1" class="disabled">
          <span>{{ $t('First') }}</span>
        </li>
        <li v-else><router-link to="page=1">{{ $t('First') }}</router-link></li>
        <li v-if="iterator !== 1" class="disabled"><span>...</span></li>
        <template v-for="i in backendData.pages">
          <template
            v-if="
              iterator <= Number(backendData.current_page) + 4 &&
                iterator <= backendData.pages
            "
          >
            <li v-if="iterator == backendData.current_page" class="active">
              <span>{{ iterator }}</span>
            </li>
            <li v-else>
              <router-link :to="'page=' + iterator">{{ iterator }}</router-link>
            </li>
            <li
              v-if="
                iterator == Number(backendData.current_page) + 4 &&
                  iterator < backendData.pages
              "
              class="disabled"
            >
              <span>...</span>
            </li>
            {{ incrementIterator() }}
          </template>
        </template>
        <li
          v-if="backendData.current_page == backendData.pages"
          class="disabled"
        >
          <span>{{ $t('Last') }}</span>
        </li>
        <li v-else>
          <router-link :to="'page=' + backendData.pages">{{ $t('Last') }}</router-link>
        </li>
      </ul>
    </div>
</template>
<script>

  export default {
    data() {
      return {
      };
    },
    props: ['backendData'],
    computed: {
    },
    components: {
    },
    mounted() {
    },
    watch: {
    },
    created() {
    },
    methods: {
      createIterator() {
        this.iterator =
          Number(this.backendData.current_page) > 5
            ? Number(this.backendData.current_page) - 4
            : 1;
      },
      incrementIterator() {
        this.iterator++;
      }
    }
  };
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/_PaginationMenu.scss";
</style>