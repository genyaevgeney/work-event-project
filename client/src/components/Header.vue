<template>
  <header class="header">
    <div class="left-col">
      <router-link :to="'/' + $i18n.locale">{{ $t("HomeLink") }}</router-link>
    </div>
    <div class="middle-col">
      <span>{{ pageName }}</span>
    </div>
    <div class="right-col">
      <select v-model="$i18n.locale">
        <option v-for="(lang, i) in langs" :key="`Lang${i}`" :value="lang">{{
          lang
        }}</option>
      </select>
      <router-link :to="'/' + $i18n.locale + '/dashboard/page=1'">{{
        $t("Dashboard")
      }}</router-link>
    </div>
  </header>
</template>
<script>
// import axios from "axios";

export default {
  data() {
    return {
      langs: ["ru", "en"]
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    }
  },
  props: {
    pageName: {
      type: String,
      default: ""
    }
  },
  created() {
    if (this.pageName === "Homepage") this.pageName = this.$t("Homepage");
  }
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/layout/_AppHeader.scss";
</style>
