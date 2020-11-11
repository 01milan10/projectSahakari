<template>
  <div class="page">
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="display-1 text-center">Testimonials</h2>
    </v-parallax>
    <v-container>
      <v-breadcrumbs :items="bread_items" class="pa-0">
        <template v-slot:divider>
          <v-icon color="primary">mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </v-container>
    <v-container>
      <v-timeline class="pa-sm-0">
        <v-timeline-item v-for="(testimony,i) in testimonials" :key="i" class="py-5">
          <template v-slot:icon>
            <v-avatar size="65">
              <img :src="testimony.image" />
            </v-avatar>
          </template>
          <template v-slot:opposite>
            <v-row class="flex-column">
              <span class="font-weight-light primary--text text-h6">{{testimony.name}}</span>
              <span class="font-weight-light grey--text">{{testimony.designation}}</span>
            </v-row>
          </template>
          <v-card class="elevation-2 rounded-xl grey lighten-4">
            <v-card-text class="grey--text">{{testimony.comment}}</v-card-text>
          </v-card>
        </v-timeline-item>
      </v-timeline>
    </v-container>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      testimonials: [],
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/",
        },
        {
          text: "Testimonials",
          disabled: true,
          href: "/testimonials",
        },
      ],
    };
  },
  created() {
    axios
      .get("http://sahakari-app.com/api/get-comments/0")
      .then((res) => (this.testimonials = res.data.data));
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