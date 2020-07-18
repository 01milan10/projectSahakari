import Vue from "vue";
import router from "./router";
import vuetify from "./plugins/vuetify";

Vue.component("App", require("./components/App").default);

new Vue({
    el: "#app",
    router,
    vuetify
});
