<template>
  <div class="dashboard">
    <Header :pageName="pageName" />
    <div class="container">
      <ArticleSection @create="loadPageData(1)" :isCreateSection="true" />
      <PaginationMenu :backendData="pageData" />
      <Article
        @delete="loadPageData(1)"
        :id="article.id"
        :title="article.title"
        :subtitle="article.subtitle"
        :content="article.content"
        v-for="(article, index) in pageData.data"
        :key="index"
      />
    </div>
  </div>
</template>
<script>
import ArticleSection from "@/components/ArticleSection";
import Header from "@/components/Header";
import Article from "@/components/Article";
import PaginationMenu from "@/components/PaginationMenu";
import axios from "axios";

export default {
  data() {
    return {
      pageData: []
    };
  },
  computed: {
    pageName() {
      return this.$t("ArticlePage");
    }
  },
  components: {
    Header,
    Article,
    PaginationMenu,
    ArticleSection
  },
  mounted() {
    this.loadPageData(this.$route.params.num);
  },
  watch: {
    $route(to, from) {
      this.loadPageData(this.$route.params.num);
    }
  },
  methods: {
    checkPaginationRoute() {
      if (
        (this.pageData.pages !== 0 &&
          this.$route.params.num > this.pageData.pages) ||
        isNaN(Number(this.$route.params.num))
      ) {
        this.$router.push(`/${this.$i18n.locale}/error`);
      }
    },
    loadPageData(pageNum) {
      axios
        .get(
          `${process.env.VUE_APP_BASE_URL}/api/articles/{article}?page=${pageNum}`
        )
        .then(response => {
          this.pageData = response.data;
          this.pageData.pages = Math.ceil(
            this.pageData.total / this.pageData.per_page
          );
          console.log("Page data", this.pageData);
          this.checkPaginationRoute();
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  }
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/_Dashboard.scss";
</style>
