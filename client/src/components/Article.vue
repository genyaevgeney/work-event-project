<template>
  <div class="article">
    <h2 class="title">{{ title }}</h2>
    <span class="subtitle">{{ subtitle }}</span>
    <p class="content">{{ content }}</p>
    <router-link
      class="edit"
      :to="'/article/edit/' + id"
      >{{ $t("Edit") }}</router-link
    >
    <button @click="deleteArticle" class="delete">{{ $t("Delete") }}</button>
  </div>
</template>
<script>
import axios from "axios";

export default {
  props: ["title", "subtitle", "content", "id"],
  methods: {
    deleteArticle() {
      axios
        .delete(`${process.env.VUE_APP_BASE_URL}/api/articles/${this.id}`)
        .then(response => {
          console.log(response);
          this.$emit("delete");
          this.$router.push(`/dashboard/page=1`);
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  }
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/_Article.scss";
</style>
