<template>
  <v-layout class="grey lighten-4">
    <v-container>
      <carousel
        :items="carousel_items"
        :autoplay="true"
        :loop="true"
        :dots="false"
        :nav="false"
        :autoplayTimeout="timeOut"
      >
        <div v-for="(client,i) in clients" :key="i">
          <a href="#">
            <img :src="client.logo" alt="client" />
          </a>
        </div>
      </carousel>
    </v-container>
  </v-layout>
</template>

<script>
import carousel from "vue-owl-carousel";
export default {
  components: {
    carousel
  },
  data() {
    return {
      carousel_items: 6,
      timeOute: 10000,
      clients: [
        {
          logo: "/img/home-7.png"
        },
        {
          logo: "/img/home-8.png"
        },
        {
          logo: "/img/home-9.png"
        },
        {
          logo: "/img/home-10.png"
        },
        {
          logo: "/img/home-11.png"
        },
        {
          logo: "/img/home-12.png"
        }
      ]
    };
  }
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