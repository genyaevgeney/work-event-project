<template>
  <div class="edit-page container">
    <Header :pageName="pageName" />
    <ArticleSection :isEditSection="true" />
  </div>
</template>
<script>
import ArticleSection from "@/components/ArticleSection";
import Header from "@/components/Header";

export default {
  computed: {
    pageName() {
      return this.$t("EditPage");
    }
  },
  components: {
    ArticleSection,
    Header
  }
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/_EditPage.scss";
</style>
