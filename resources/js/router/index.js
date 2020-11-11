import Vue from "vue";
import VueRouter from "vue-router";
import Landing from "../views/Landing.vue";
import Features from "../views/Features.vue";
import About from "../views/About.vue";
import Testimonials from "../views/Testimonials.vue";
import Gallery from "../views/Gallery.vue";
import Downloads from "../views/Downloads.vue";
import Career from "../views/Career.vue";
import Team from "../components/about/Team";
import Contacts from "../components/about/Contacts";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "Landing",
        component: Landing
    },
    {
        path: "/about-us",
        name: "About Us",
        component: About
    },
    {
        path: "/our-team",
        name: "Our Team",
        component: Team
    },
    {
        path: "/testimonials",
        name: "Testimonials",
        component: Testimonials
    },
    {
        path: "/our-gallery",
        name: "Gallery",
        component: Gallery
    },
    {
        path: "/downloads",
        name: "Downloads",
        component: Downloads
    },
    {
        path: "/career",
        name: "Career",
        component: Career
    },
    {
        path: "/our-contacts",
        name: "Our Contacts",
        component: Contacts
    },
    {
        path: "/our-features",
        name: "Features",
        component: Features,
    }
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

export default router;
