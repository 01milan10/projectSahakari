import Vue from "vue";
import VueRouter from "vue-router";
import App from "../components/App";
import Login from "../components/frontend/Authentication/Login";
import Register from "../components/frontend/Authentication/Register";
import AboutUs from "../components/frontend/AboutUs";
import ContactUs from "../components/frontend/ContactUs";
import ProgramServices from "../components/frontend/ProgramServices";
import Testimonials from "../components/frontend/Testimonials";
import Gallery from "../components/frontend/Gallery";
import Home from "../components/frontend/Home";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },
    {
        path: "/login",
        name: "login",
        component: Login
    },
    {
        path: "/register",
        name: "regsister",
        component: Register
    },
    {
        path: "/about-us",
        name: "about-us",
        component: AboutUs
    },
    {
        path: "/contact-us",
        name: "contact-us",
        component: ContactUs
    },
    {
        path: "/program-services",
        name: "program-services",
        component: ProgramServices
    },
    {
        path: "/testimonials",
        name: "testimonials",
        component: Testimonials
    },
    {
        path: "/gallery",
        name: "gallery",
        component: Gallery
    }
];

const router = new VueRouter({
    routes
});

export default router;
