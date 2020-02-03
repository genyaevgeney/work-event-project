<template>
  <router-view />
</template>

<script>
export default {
  mounted() {
    if (this.$route.path === "/") {
      this.$router.push({ path: `/en` });
    }
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/index.scss";
</style>