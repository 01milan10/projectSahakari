<template>
  <div class="pt-10">
    <Home />
    <Features />
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
export default {
  components: {
    Home,
    Features,
    About,
    Testimonials,
    Album,
    Contact
  }
};
</script>

<style>
</style>