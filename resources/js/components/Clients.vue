<template>
  <v-layout class="grey lighten-4">
    <v-container>
      <div v-if="clients.length">
        <carousel
          :items="carousel_items"
          :autoplay="true"
          :loop="true"
          :nav="false"
          :dots="false"
          :responsive="responsive"
          :autoplayTimeout="timeOut"
        >
          <div v-for="(client,i) in clients" :key="i">
            <a :href="client.link">
              <img :src="`/uploaded_images/clients_logo/${client.logo}`" alt="client" />
            </a>
          </div>
        </carousel>
      </div>
    </v-container>
  </v-layout>
</template>

<script>
import carousel from "vue-owl-carousel";
import axios from "axios";
export default {
  components: {
    carousel,
  },
  data() {
    return {
      responsive: {
        0: { items: 2 },
        600: { items: 4 },
        960: { items: 6 },
      },
      carousel_items: 6,
      timeOut: 10000,
      clients: [],
      nextTick: "1",
    };
  },
  methods: {
    async getData() {
      await axios
        .get("http://sahakari-app.com/api/get-clients")
        .then((res) => (this.clients = res.data.data));
    },
  },
  created() {
    this.getData();
  },
};
</script>

<style scoped>
@media screen and (min-width: 768px) {
  .container {
    max-width: 750px !important;
  }
}
@media screen and (min-width: 992px) {
  .container {
    max-width: 970px !important;
  }
}
@media screen and (min-width: 1264px) {
  .container {
    max-width: 1200px !important;
  }
}
</style>