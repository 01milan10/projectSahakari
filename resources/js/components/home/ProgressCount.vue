<template>
  <v-parallax src="/img/services-parallax.jpg" height="150" class="mt-5">
    <v-row class="justify-center my-5">
      <v-col cols="12" md="2">
        <p class="text-center my-4 count">275</p>
        <p class="body-2 text-center my-0">Cases Completed</p>
      </v-col>
      <v-divider class="grey_divider" vertical></v-divider>
      <v-col cols="12" md="2">
        <p class="text-center my-4 count">219</p>
        <p class="body-2 text-center my-0">Consultants</p>
      </v-col>
      <v-divider class="grey_divider" vertical></v-divider>
      <v-col cols="12" md="2">
        <p class="text-center my-4 count">130</p>
        <p class="body-2 text-center my-0">Awards</p>
      </v-col>
      <v-divider class="grey_divider" vertical></v-divider>
      <v-col cols="12" md="2">
        <p class="text-center my-4 count">723</p>
        <p class="body-2 text-center my-0">Happy Clients</p>
      </v-col>
    </v-row>
  </v-parallax>
</template>

<script>
export default {};
</script>

<style scoped>
.count {
  font-weight: 900;
  font-size: 60px;
  color: #44bef1;
}
</style>