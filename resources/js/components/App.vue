<template>
  <v-app>
    <Navbar :isAuth="authenticated" />
    <v-main>
      <router-view />
    </v-main>
    <Clients />
    <Footer />
    <div class="hidden-sm-and-down">
      <v-hover v-slot:default="{hover}">
        <v-btn
          v-scroll="onScroll"
          v-show="fab"
          fab
          dark
          fixed
          bottom
          right
          :color="`${hover?'primary':'#229dd1'}`"
          @click="toTop"
        >
          <v-icon>mdi-chevron-up</v-icon>
        </v-btn>
      </v-hover>
    </div>
  </v-app>
</template>

<script>
import Navbar from "../components/layout/Navbar";
import Footer from "../components/layout/Footer";
import Clients from "./Clients";

export default {
  name: "App",
  props: ["isAuth"],
  components: {
    Navbar,
    Footer,
    Clients,
  },

  data: () => ({
    fab: false,
    authenticated: "",
  }),
  methods: {
    onScroll(e) {
      if (typeof window === "undefined") return;
      const top = window.pageYOffset || e.target.scrollTop || 0;
      this.fab = top > 20;
    },
    toTop() {
      this.$vuetify.goTo(0);
    },
  },
  mounted() {
    if (this.isAuth == 1) {
      return (this.authenticated = true);
    } else {
      return (this.authenticated = false);
    }
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
}
</style>
