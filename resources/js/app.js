import Vue from "vue";
import App from "./components/App";
import router from "./router";
import vuetify from "./plugins/vuetify";
// import "bootstrap/dist/css/bootstrap.css";
// import "bootstrap";

new Vue({
    el: "#app",
    router,
    vuetify,
    render: h => h(App)
});
