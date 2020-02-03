<template>
  <div class="article">
    <h2 class="title">{{title}}</h2>
    <span class="subtitle">{{subtitle}}</span>
    <p class="content">{{content}}</p>
    <router-link class="edit" :to="'/' + $i18n.locale + '/article/edit/' + id">{{ $t('Edit') }}</router-link>
    <button @click="deleteArticle" class="delete">{{ $t('Delete') }}</button>
  </div>
</template>
<script>
  import axios from "axios";

  export default {
    data() {
      return {
      };
    },
    props: ['title', 'subtitle', 'content', 'id'],
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
      deleteArticle() {
        axios
          .delete(`http://php-event-project.com/api/articles/${this.id}`)
          .then(response => {
            console.log(response);
            this.$emit('delete');
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