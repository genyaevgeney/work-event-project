import Vue from "vue";
import Router from "vue-router";
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
      path: "/dashboard/page=:num",
      name: "Dashboard",
      component: Dashboard,
      props: true
    },
    {
      path: "/article/edit/:id",
      name: "EditPage",
      component: EditPage,
      props: true
    },
    {
      path: "/",
      name: "Homepage",
      component: Homepage,
      props: true
    },
    {
      path: "*",
      name: "ErrorPage",
      component: ErrorPage
    }
  ]
});