import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from '@/store'
import VueCookie from "vue-cookie";
import i18n from '@/plugins/i18n'
Vue.use(VueCookie);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount("#app");