<template>
  <div>
    <Header />
    <router-view>
      <Home />
    </router-view>
    <Footer />
  </div>
</template>

<script>
import Header from "./frontend/layouts/Header";
import Footer from "./frontend/layouts/Footer";
import Home from "./frontend/Home";
export default {
  name: "App",
  components: {
    Header,
    Footer,
    Home
  }
};
</script>

<style>
</style>