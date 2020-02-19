<template>
  <header class="header">
    <div class="left-col">
      <router-link to="/">{{ $t("HomeLink") }}</router-link>
    </div>
    <div class="middle-col">
      <span>{{ pageName }}</span>
    </div>
    <div class="right-col">
      <div class="dropdown">
        <div @click="toggleLangMenu" class="current-lang">
          <span class="lang">
            {{ locales[locale] }}
          </span>
          <img class="arrow" src="@/assets/media/images/down-arrow.png" alt="arrow">
        </div>
        <div class="lang-menu" :class="{ show : showLangMenu }">
          <span v-for="(value, key) in locales" :key="key" @click.prevent="setLocale(key)">
            {{ value }}
          </span>
        </div>
      </div>
      <router-link to="/dashboard/page=1">{{
        $t("Dashboard")
      }}</router-link>
    </div>
  </header>
</template>
<script>
import { mapGetters } from 'vuex'
import { loadMessages } from '@/plugins/i18n'

export default {
  data () {
    return {
      showLangMenu: false
    }
  },
  computed: mapGetters({
    locale: 'lang/locale',
    locales: 'lang/locales'
  }),
  props: {
    pageName: {
      type: String,
      default: ""
    }
  },
  methods: {
    setLocale (locale) {
      this.toggleLangMenu()
      if (this.$i18n.locale !== locale) {
        loadMessages(locale)
        this.$store.dispatch('lang/setLocale', { locale })
      }
    },
    toggleLangMenu () {
      this.showLangMenu = !this.showLangMenu
    }
  }
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/layout/_AppHeader.scss";
</style>
