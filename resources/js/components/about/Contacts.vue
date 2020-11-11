<template>
  <div class="page">
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">Our Contacts</h2>
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
            <v-col cols="12" sm="4" v-for="(contact,i) in contacts" :key="i">
              <v-card class="rounded-lg" elevation="4">
                <v-card-title class="font-weight-light subtitle-1 grey lighten-4 mb-1">
                  Field Office,
                  {{contact.district}}
                </v-card-title>
                <v-card-text class="grey--text">
                  <v-row class="flex-column mx-auto">
                    <span>
                      Address:
                      <span>{{contact.address}}</span>
                    </span>
                    <span>
                      Telephone:
                      <span class="blue--text">{{contact.phone}}, {{contact.alt_phone}}</span>
                    </span>
                    <span>
                      Fax:
                      <span>{{contact.fax}}</span>
                    </span>
                    <span>
                      Email:
                      <span>{{contact.email}}</span>
                    </span>
                  </v-row>
                </v-card-text>
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
                      <v-avatar class="mt-5" size="80">
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
  data() {
    return {
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/",
        },
        {
          text: "Our Contacts",
          disabled: true,
        },
      ],
      contacts: [],
      testimonials: [],
    };
  },
  created() {
    Axios.get("http://sahakari-app.com/api/get-contacts").then(
      (res) => (this.contacts = res.data.data)
    );
    Axios.get("http://sahakari-app.com/api/get-comments/3").then(
      (res) => (this.testimonials = res.data.data)
    );
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