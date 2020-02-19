import Vue from "vue";
import Router from "vue-router";
import RouterView from "../components/RouterView.vue";
import Homepage from "../components/Homepage.vue";
import Dashboard from "../components/Dashboard.vue";
import EditPage from "../components/EditPage.vue";
import ErrorPage from "../components/Error.vue";
import { i18n } from "../main.js";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/:lang",
      component: RouterView,
      beforeEnter(to, from, next) {
        const lang = to.params.lang;
        if (!["en", "ru"].includes(lang)) return next("ru");
        if (i18n.locale !== lang) {
          i18n.locale = lang;
        }
        return next();
      },
      children: [
        {
          path: "dashboard/page=:num",
          name: "Dashboard",
          component: Dashboard,
          props: true,
          meta: {
            title: 'Dashboard'
          }
        },
        {
          path: "article/edit/:id",
          name: "EditPage",
          component: EditPage,
          props: true,
          meta: {
            title: 'Edit page'
          }
        },
        {
          path: "/",
          name: "Homepage",
          component: Homepage,
          props: true,
          meta: {
            title: 'Homepage'
          }
        }
      ]
    },
    {
      path: "*",
      name: "ErrorPage",
      component: ErrorPage,
      meta: {
        title: 'Error page'
      }
    }
  ]
});