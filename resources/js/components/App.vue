<template>
  <v-app>
    <Navbar />
    <v-main>
      <router-view></router-view>
    </v-main>
    <Clients />
    <Footer />
    <v-btn
      small
      v-scroll="onScroll"
      v-show="fab"
      fab
      dark
      fixed
      bottom
      right
      color="primary"
      @click="toTop"
    >
      <v-icon>mdi-chevron-up</v-icon>
    </v-btn>
  </v-app>
</template>

<script>
import Navbar from "../components/layout/Navbar";
import Footer from "../components/layout/Footer";
import Clients from "./Clients";

export default {
  name: "App",

  components: {
    Navbar,
    Footer,
    Clients
  },

  data: () => ({
    fab: false
  }),
  methods: {
    onScroll(e) {
      if (typeof window === "undefined") return;
      const top = window.pageYOffset || e.target.scrollTop || 0;
      this.fab = top > 20;
    },
    toTop() {
      this.$vuetify.goTo(0);
    }
  }
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
}
</style>
