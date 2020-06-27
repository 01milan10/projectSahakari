import Vue from "vue";
import VueRouter from "vue-router";
import Landing from "../views/Landing.vue";
import Features from "../views/Features.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "Landing",
        component: Landing
    },
    {
        path: "/features",
        name: "Features",
        component: Features,
        meta: {
            progress: {
                func: [
                    { call: "color", modifier: "temp", argument: "#ffb000" },
                    { call: "fail", modifier: "temp", argument: "#6e0000" },
                    { call: "location", modifier: "temp", argument: "top" },
                    {
                        call: "transition",
                        modifier: "temp",
                        argument: {
                            speed: ".25s",
                            opacity: "0.9s",
                            termination: 400
                        }
                    }
                ]
            }
        }
    }
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

export default router;
