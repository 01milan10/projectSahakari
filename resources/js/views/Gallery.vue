<template>
  <div>
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
    <v-carousel height="auto" hide-delimiters>
      <v-carousel-item v-for="(gallery,i) in album" :key="i">
        <v-container>
          <v-card class="pa-4 grey lighten-3 rounded-xl" elevation="5">
            <v-card-title class="black--text">{{gallery.title}}</v-card-title>
            <v-card-text>
              <v-row>
                <v-col cols="6" sm="4" md="3" v-for="(photo,i) in gallery.collection" :key="i">
                  <a
                    :href="photo.content"
                    data-fancybox="gallery"
                    data-caption="First Gallery"
                    buttons="download"
                  >
                    <v-img class="img" :src="photo.content" max-height="250" contain />
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
export default {
  data() {
    return {
      album: [
        {
          title: "Collection 1",
          collection: [
            {
              content: "/img/person_1.jpg"
            },
            {
              content: "/img/person_2.jpg"
            },
            {
              content: "/img/person_3.jpg"
            },
            {
              content: "/img/person_4.jpg"
            },
            {
              content: "/img/person_5.jpg"
            },
            {
              content: "/img/person_6.jpg"
            }
          ]
        },
        {
          title: "Collection 2",
          collection: [
            { content: "/img/gallery/1.jpg" },
            { content: "/img/gallery/2.jpg" },
            { content: "/img/gallery/3.jpg" },
            { content: "/img/gallery/4.jpg" },
            { content: "/img/gallery/5.jpg" },
            { content: "/img/gallery/6.jpg" },
            { content: "/img/gallery/7.jpg" },
            { content: "/img/gallery/8.jpg" },
            { content: "/img/gallery/9.jpg" },
            { content: "/img/gallery/10.jpg" },
            { content: "/img/gallery/11.jpg" },
            { content: "/img/gallery/12.jpg" },
            { content: "/img/gallery/13.jpg" },
            { content: "/img/gallery/14.jpg" },
            { content: "/img/gallery/15.jpg" },
            { content: "/img/gallery/16.jpg" }
          ]
        }
      ],
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/"
        },
        {
          text: "Gallery",
          disabled: true,
          href: "/gallery"
        }
      ]
    };
  }
};
</script>

<style scoped>
.img:hover {
  opacity: 0.85;
  transform: scale(0.98);
  transition: all 0.4s ease-in;
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