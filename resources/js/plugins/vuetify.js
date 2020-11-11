import Vue from "vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import "@mdi/font/css/materialdesignicons.css";

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        themes: {
            light: {
                black: "#282e3a",
                blue: "#44bef1",
                email: "#4b5d78",
                primary: "#24a3d8",
                grey_divider: "#e8e8e8",
                banner_blue: "#229dd1",
                danger: "#CA0B00"
            }
        }
    }
});
