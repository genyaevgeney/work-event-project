<template>
  <div class="article-section">
    <h2 class="headline">{{ $t('Articles') }}</h2>
    <input v-model="formData.title" type="text" :placeholder="$t('Title')">
    <input v-model="formData.subtitle" type="text" :placeholder="$t('Subtitle')">
    <textarea v-model="formData.content" :placeholder="$t('Body')"></textarea>
    <button v-if="isCreateSection" @click="createArticle">{{ $t('Save') }}</button>
    <button v-if="isEditSection" @click="editArticle">{{ $t('Edit') }}</button>
  </div>
</template>
<script>
  import axios from "axios";

  export default {
    data() {
      return {
        formData: {
          title:"",
          subtitle:"",
          content:""
        }
      };
    },
    props: ['isCreateSection', 'isEditSection', 'article'],
    computed: {
    },
    components: {
    },
    mounted() {
      if (this.isEditSection) {
        axios
          .get(`http://php-event-project.com/api/articles/${this.$route.params.id}/edit`)
          .then(response => {
            console.log(`Article ${this.$route.params.id}`, response);
            this.formData.title = response.data.title;
            this.formData.subtitle = response.data.subtitle;
            this.formData.content = response.data.content;
          })
          .catch(error => {
            console.log(error.response.data);
          });
      }
    },
    watch: {
    },
    created() {
    },
    methods: {
      createArticle() {
        axios
          .post("http://php-event-project.com/api/articles", this.formData)
          .then(response => {
            for (let key in this.formData) {
              this.formData[key] = "";
            }
            console.log("New article", response);
            this.$emit('create');
          })
          .catch(error => {
            console.log(error.response.data);
          });
      },
      editArticle() {
        let data = this.formData;
        data._method = "put";
        axios
          .post(`http://php-event-project.com/api/articles/${this.$route.params.id}`, data)
          .then(response => {
            console.log("Updated article", response);
            this.$router.push(`/${this.$i18n.locale}/dashboard/page=1`);
          })
          .catch(error => {
            console.log(error.response.data);
          });
      }
    }
  };
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/_ArticleSection.scss";
</style>