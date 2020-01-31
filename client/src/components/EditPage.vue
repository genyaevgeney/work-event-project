<template>
  <div class="edit-page container">
    <ArticleSection :isEditSection="true"/>
  </div>
</template>
<script>
  import ArticleSection from "@/components/ArticleSection";

  export default {
    data() {
      return {
        
      };
    },
    computed: {
    },
    components: {
      ArticleSection
    },
    mounted() {
    },
    watch: {
    },
    created() {
    },
    methods: {
    }
  };
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/_EditPage.scss";
</style>