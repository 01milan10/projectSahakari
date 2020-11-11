<template>
  <div class="page">
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">Our Album</h2>
    </v-parallax>
    <v-container>
      <v-breadcrumbs :items="bread_items" class="pa-0">
        <template v-slot:divider>
          <v-icon color="primary">mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </v-container>
    <v-carousel hide-delimiters height="auto">
      <v-carousel-item
        reverse-transition="slide-x-reverse-transition"
        transition="slide-x-transition"
        v-for="(album,i) in gallery"
        :key="i"
      >
        <v-container>
          <v-card class="pa-4 rounded-xl grey lighten-4" light>
            <v-card-title class="primary--text font-weight-light">{{album.category}}</v-card-title>
            <v-card-text>
              <v-row>
                <v-col cols="6" sm="4" md="3" v-for="(photo,i) in album.collection" :key="i">
                  <a
                    :href="`/uploaded_images/gallery/${photo.image}`"
                    :data-fancybox="photo.category"
                    :data-caption="photo.title"
                  >
                    <v-img
                      class="img"
                      :src="`/uploaded_images/gallery/${photo.image}`"
                      style="border-radius:10px; height:250px"
                    />
                  </a>
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
        </v-container>
      </v-carousel-item>
    </v-carousel>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  data() {
    return {
      gallery: [],
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/",
        },
        {
          text: "Gallery",
          disabled: true,
          href: "/gallery",
        },
      ],
    };
  },
  created() {
    Axios.get("http://sahakari-app.com/api/get-images/0").then(
      (res) => (this.gallery = res.data.data)
    );
  },
};
</script>

<style scoped>
.img:hover {
  opacity: 0.85;
  transform: scale(0.98);
  transition: all 0.4s ease-in-out;
}

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