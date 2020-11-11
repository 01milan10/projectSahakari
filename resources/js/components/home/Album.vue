<template>
  <v-container fluid class="my-10 ourAlbum">
    <v-row class="mx-auto flex-column align-center">
      <h1 class="display-1 font-weight-light text-center">Our Photo Album</h1>
      <v-divider class="black" width="25%"></v-divider>
      <v-container class="mt-5">
        <v-row justify="center">
          <v-col
            class="eachPhoto"
            cols="12"
            sm="4"
            md="3"
            lg="2"
            v-for="(item,i) in gallery"
            :key="i"
          >
            <v-card flat class="my-1 rounded-t-lg">
              <a
                :href="`/uploaded_images/gallery/${item.image}`"
                :data-fancybox="item.id"
                :data-caption="item.title"
              >
                <v-img class="img" :src="`/uploaded_images/gallery/${item.image}`" height="200"></v-img>
              </a>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <v-btn rounded text color="blue" to="/our-gallery">see more..</v-btn>
    </v-row>
  </v-container>
</template>

<script>
import Axios from "axios";
export default {
  data() {
    return {
      gallery: [],
    };
  },
  methods: {
    async getData() {
      await Axios.get("http://sahakari-app.com/api/get-images/6").then(
        (res) => (this.gallery = res.data)
      );
      this.animate();
    },
    animate() {
      let t1 = this.$gsap.timeline({
        scrollTrigger: {
          trigger: ".ourAlbum",
          start: "top center",
          end: "bottom top",
          toggleActions: "restart pause resume pause",
        },
      });

      t1.fromTo(
        ".ourAlbum .eachPhoto",
        {
          opacity: 0,
          yPercent: -50,
        },
        {
          stagger: {
            each: 0.3,
            from: "start",
          },
          yPercent: 0,
          duration: 3,
          ease: "back",
          opacity: 1,
        }
      );
    },
  },
  created() {
    this.getData();
  },
};
</script>

<style scoped>
.img:hover {
  opacity: 0.85;
  transform: scale(0.98);
  transition: all 0.4s ease-in;
}
</style>