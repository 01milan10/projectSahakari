<template>
  <v-container fluid class="grey lighten-4 mt-10">
    <v-row class="mx-auto flex-column align-center justify-center">
      <h1 class="font-weight-light display-1 text-center pt-10">Testimonials</h1>
      <v-divider class="black" width="25%"></v-divider>
      <v-carousel
        light
        hide-delimiter-background
        :show-arrows="false"
        :cycle="true"
        :continuous="true"
        style="width: 55%"
        delimiter-icon="mdi-circle-outline"
      >
        <v-carousel-item v-for="(carousel_item, i) in carousel_items" :key="i">
          <v-row class="justify-center mx-auto mt-10">
            <v-avatar size="100">
              <v-img :src="carousel_item.image"></v-img>
            </v-avatar>
            <span class="text-center">
              <p
                class="grey--text mt-5 font-weight-light font-italic carousel-content text-sm-body-2 text-md-h6 text-lg-h5"
              >{{carousel_item.comment}}</p>
              <p class="black--text font-weight-regular mt-5 mb-0">{{carousel_item.name}}</p>
              <p class="font-weight-light grey--text">({{carousel_item.designation}})</p>
            </span>
          </v-row>
        </v-carousel-item>
      </v-carousel>
    </v-row>
  </v-container>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      carousel_items: [],
    };
  },
  methods: {
    async getData() {
      await axios
        .get("http://sahakari-app.com/api/get-comments/4")
        .then((res) => (this.carousel_items = res.data.data));
    },
  },
  async created() {
    await this.getData();
  },
};
</script>

<style scoped>
.carousel-content {
  line-height: 1.7 !important;
}
</style>

