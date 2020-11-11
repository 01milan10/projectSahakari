<template>
  <div class="pt-10 page">
    <Home />
    <Features />
    <ProgressCount />
    <About />
    <Testimonials />
    <Album />
    <Contact />
  </div>
</template>

<script>
import Home from "../components/home/Home";
import Features from "../components/home/Features";
import About from "../components/home/About";
import Testimonials from "../components/home/Testimonials";
import Album from "../components/home/Album";
import Contact from "../components/home/Contact-Form";
import ProgressCount from "../components/home/ProgressCount";
export default {
  components: {
    Home,
    Features,
    About,
    Testimonials,
    Album,
    Contact,
    ProgressCount,
  },
};
</script>

<style>
</style>