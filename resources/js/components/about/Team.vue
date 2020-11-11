<template>
  <div class="page">
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">Our Team</h2>
    </v-parallax>
    <v-container>
      <v-breadcrumbs :items="bread_items" class="pa-0">
        <template v-slot:divider>
          <v-icon color="primary">mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </v-container>
    <v-container>
      <v-row>
        <v-col cols="12" md="8" lg="9">
          <v-row>
            <v-col cols="12" md="4" v-for="(person,i) in team" :key="i">
              <v-card flat>
                <v-img
                  :src="`/uploaded_images/team_avatar/${person.image}`"
                  style="border-radius:10px; height:240"
                ></v-img>
                <v-card-title class="px-0">
                  <h4>{{person.name}}</h4>
                </v-card-title>
                <v-card-subtitle class="px-0">
                  <h4 class="font-weight-light">{{person.designation}}</h4>
                </v-card-subtitle>
                <v-divider class="grey_divider"></v-divider>
                <v-card-actions class="pt-0 px-0">
                  <v-btn small icon :href="person.facebook">
                    <v-icon>mdi-facebook</v-icon>
                  </v-btn>
                  <v-btn small icon :href="person.gmail">
                    <v-icon>mdi-gmail</v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
        <v-col cols="12" md="4" lg="3">
          <v-row class="flex-column">
            <v-col cols="12" sm="6" md="12">
              <v-card class="primary">
                <v-card-text class="pl-5 white--text">
                  <h2 class="pb-4">Do you need help?</h2>
                  <p
                    class="caption text-left"
                  >Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi facere est distinctio veniam hic dolor?</p>
                  <ContactUs />
                </v-card-text>
              </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="12">
              <v-card flat outlined>
                <v-carousel
                  height="450"
                  :show-arrows="false"
                  hide-delimiter-background
                  light
                  :continuous="true"
                  :cycle="true"
                  delimiter-icon="mdi-circle-outline"
                >
                  <v-carousel-item v-for="(testimonial,i) in testimonials" :key="i">
                    <v-row class="flex-column align-center">
                      <v-avatar class="mt-5" size="100">
                        <img :src="testimonial.image" alt />
                      </v-avatar>
                      <span>
                        <p class="mt-5 px-10 text-center caption grey--text">{{testimonial.comment}}</p>
                        <p class="my-0 px-10 text-center font-weight-bold">{{testimonial.name}}</p>
                        <p
                          class="my-0 px-10 text-center font-weight-light grey--text"
                        >({{testimonial.designation}})</p>
                      </span>
                    </v-row>
                  </v-carousel-item>
                </v-carousel>
              </v-card>
              <v-hover v-slot:default="{hover}">
                <v-btn
                  large
                  block
                  class="mt-10"
                  text
                  outlined
                  :class="`${hover?'primary white--text btn-presentation':'primary--text'}`"
                >
                  <v-icon left :color="`${hover?'white':'pink'}`">mdi-file-pdf</v-icon>Company presentation
                </v-btn>
              </v-hover>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import Axios from "axios";
import ContactUs from "../contact-us/ContactUs";
export default {
  components: {
    ContactUs,
  },
  name: "About",
  data() {
    return {
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/",
        },
        {
          text: "About Us",
          disabled: false,
          href: "/about-us",
        },
        {
          text: "Our Team",
          disabled: true,
          route: "/our-team",
        },
      ],
      testimonials: [],
      team: [],
    };
  },
  async created() {
    await Axios.get("http://sahakari-app.com/api/get-comments/3").then(
      (res) => (this.testimonials = res.data.data)
    );
    await Axios.get("http://sahakari-app.com/api/get-team/0").then(
      (res) => (this.team = res.data.data)
    );
  },
};
</script>

<style scoped>
.v-card__actions > .v-btn:hover {
  color: #24a3d8;
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