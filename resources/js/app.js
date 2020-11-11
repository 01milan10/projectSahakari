import Vue from "vue";
import router from "./router";
import vuetify from "./plugins/vuetify";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

Vue.component("App", require("./components/App").default);

Object.defineProperty(Vue.prototype, "$gsap", { value: gsap }); //defining gsap object to use it globally (Best practice to use js modules)
gsap.registerPlugin(ScrollTrigger);

new Vue({
    el: "#app",
    router,
    vuetify
});
