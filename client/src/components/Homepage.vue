<template>
  <div class="Homepage">
    <Header :pageName="pageName" />
    <VideoBg :sources="['media/videos/homepage.mp4']" img="demo/assets/bg.jpg">
    </VideoBg>
  </div>
</template>
<script>
import Header from "@/components/Header";
import VideoBg from "vue-videobg";
export default {
  computed: {
    pageName() {
      return this.$t("Homepage");
    }
  },
  components: {
    VideoBg,
    Header
  }
};
</script>

<style lang="scss" scoped>
.Homepage {
  margin-top: -73px;
}
</style>
