<template>
  <div>
    <v-parallax src="/img/services-parallax.jpg" class="mt-5 hidden-sm-and-down" height="150">
      <v-row class="justify-center my-5">
        <v-col cols="12" sm="6" md="2">
          <p id="cases" class="text-center my-4 count">275</p>
          <p class="body-2 text-center my-0">Cases Completed</p>
        </v-col>
        <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
        <v-col cols="12" sm="6" md="2">
          <p id="consultants" class="text-center my-4 count">219</p>
          <p class="body-2 text-center my-0">Consultants</p>
        </v-col>
        <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
        <v-col cols="12" sm="6" md="2">
          <p id="awards" class="text-center my-4 count">130</p>
          <p class="body-2 text-center my-0">Awards</p>
        </v-col>
        <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
        <v-col cols="12" sm="6" md="2">
          <p id="clients" class="text-center my-4 count">723</p>
          <p class="body-2 text-center my-0">Happy Clients</p>
        </v-col>
      </v-row>
    </v-parallax>
    <v-container class="mt-5 hidden-md-and-up banner_blue">
      <v-row class="justify-center my-5">
        <v-col cols="12" sm="6" md="2">
          <p class="text-center my-4 count">275</p>
          <p class="body-2 text-center my-0 white--text">Cases Completed</p>
        </v-col>
        <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
        <v-col cols="12" sm="6" md="2">
          <p class="text-center my-4 count">219</p>
          <p class="body-2 text-center my-0 white--text">Consultants</p>
        </v-col>
        <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
        <v-col cols="12" sm="6" md="2">
          <p class="text-center my-4 count">130</p>
          <p class="body-2 text-center my-0 white--text">Awards</p>
        </v-col>
        <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
        <v-col cols="12" sm="6" md="2">
          <p class="text-center my-4 count">723</p>
          <p class="body-2 text-center my-0 white--text">Happy Clients</p>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  mounted() {
    let counters = this.$gsap.timeline();
    let snap = this.$gsap.utils.snap(1);
    const cases = document.getElementById("cases");
    const consultants = document.getElementById("consultants");
    const awards = document.getElementById("awards");
    const clients = document.getElementById("clients");
  },
};
</script>

<style scoped>
.count {
  font-weight: 900;
  font-size: 60px;
  color: #44bef1;
}
</style>