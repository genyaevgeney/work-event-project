<template>
  <div class="article-section">
    <h2 class="headline">{{ $t("Articles") }}</h2>
    <input v-model="formData.title" type="text" :placeholder="$t('Title')" />
    <div v-if="errors.title" class="alert alert-danger" role="alert">
      {{ errors.title[0] }}
    </div>
    <input
      v-model="formData.subtitle"
      type="text"
      :placeholder="$t('Subtitle')"
    />
    <div v-if="errors.subtitle" class="alert alert-danger" role="alert">
      {{ errors.subtitle[0] }}
    </div>
    <textarea v-model="formData.content" :placeholder="$t('Body')"></textarea>
    <div v-if="errors.content" class="alert alert-danger" role="alert">
      {{ errors.content[0] }}
    </div>
    <button v-if="isCreateSection" @click="createArticle">
      {{ $t("Save") }}
    </button>
    <button v-if="isEditSection" @click="editArticle">{{ $t("Edit") }}</button>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      formData: {
        title: "",
        subtitle: "",
        content: ""
      },
      errors: {}
    };
  },
  props: ["isCreateSection", "isEditSection", "article"],
  mounted() {
    if (this.isEditSection) {
      axios
        .get(
          `${process.env.VUE_APP_BASE_URL}/api/articles/${this.$route.params.id}/edit`
        )
        .then(response => {
          console.log(`Article ${this.$route.params.id}`, response);
          this.formData.title = response.data.data.title;
          this.formData.subtitle = response.data.data.subtitle;
          this.formData.content = response.data.data.content;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  },
  methods: {
    clearObject(obj) {
      for (let key in obj) {
        obj[key] = "";
      }
    },
    createArticle() {
      this.clearObject(this.errors);
      axios
        .post(`${process.env.VUE_APP_BASE_URL}/api/articles`, this.formData)
        .then(response => {
          for (let key in this.formData) {
            this.formData[key] = "";
          }
          console.log("New article", response);
          this.$emit("create");
          this.$router.push(`/${this.$i18n.locale}/dashboard/page=1`);
        })
        .catch(error => {
          this.errors = error.response.data.errors;
          console.log("Errors", error.response.data.errors);
        });
    },
    editArticle() {
      this.clearObject(this.errors);
      let data = this.formData;
      data._method = "put";
      axios
        .post(
          `${process.env.VUE_APP_BASE_URL}/api/articles/${this.$route.params.id}`,
          data
        )
        .then(response => {
          console.log("Updated article", response);
          this.$router.push(`/${this.$i18n.locale}/dashboard/page=1`);
        })
        .catch(error => {
          this.errors = error.response.data.errors;
          console.log("Errors", error.response.data.errors);
        });
    }
  }
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/_ArticleSection.scss";
</style>
