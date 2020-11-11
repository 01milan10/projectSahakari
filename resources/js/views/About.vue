<template>
  <div class="page">
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">About Us</h2>
    </v-parallax>
    <v-container>
      <v-breadcrumbs :items="items" class="pa-0">
        <template v-slot:divider>
          <v-icon color="primary">mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </v-container>
    <v-container>
      <v-row>
        <v-col cols="12" md="8" lg="9">
          <v-img src="/img/about-1.jpg" contain />
          <v-layout class="my-10 pa-5">
            <v-row class="flex-column">
              <span>
                <p
                  class="text-h5 text-md-h4 font-weight-bold"
                >Doing the right thing, at the right time.</p>
                <p
                  class="font-weight-light"
                >Welcome to the leading company on the market! Our success is driven by the highest quality customer service. We can meet the requirements even of the whimsical clients; there are no complex tasks for us! Thanks for yourchoice! Our company can boast the reputation of the trusted partner known worldwide. We are proud of the uncompromising quality</p>
                <p
                  class="font-weight-light"
                >Thank you for visiting our site! You are at the right place! We are focused on providing integrated solutions and services to customers around the world. Putting our clients' interests first, we work hard to exceed your expectations.</p>
              </span>
              <v-row class="justify-center justify-md-space-between my-5">
                <v-col cols="12" sm="6" md="2" class="px-2">
                  <p class="text-center my-4 count">275</p>
                  <p class="body-2 text-center my-0">Cases Completed</p>
                </v-col>
                <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
                <v-col cols="12" sm="6" md="2" class="px-2">
                  <p class="text-center my-4 count">219</p>
                  <p class="body-2 text-center my-0">Consultants</p>
                </v-col>
                <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
                <v-col cols="12" sm="6" md="2" class="px-2">
                  <p class="text-center my-4 count">130</p>
                  <p class="body-2 text-center my-0">Awards</p>
                </v-col>
                <v-divider class="grey_divider hidden-sm-and-down" vertical></v-divider>
                <v-col cols="12" sm="6" md="2" class="px-2">
                  <p class="text-center my-4 count">723</p>
                  <p class="body-2 text-center my-0">Happy Clients</p>
                </v-col>
              </v-row>
            </v-row>
          </v-layout>
        </v-col>
        <v-col cols="12" md="4" lg="3">
          <v-row class="flex-column px-4">
            <v-col cols="12" sm="6" md="12">
              <span>
                <v-hover v-slot:default="{hover}">
                  <router-link
                    to="/features"
                    class="text-decoration-none"
                    :class="`${hover?'primary--text':' grey--text'}`"
                  >Services</router-link>
                </v-hover>
                <v-divider class="grey_divider my-3"></v-divider>
              </span>
              <span>
                <v-hover v-slot:default="{hover}">
                  <router-link
                    to="/our-team"
                    class="text-decoration-none"
                    :class="`${hover?'primary--text':'  grey--text'}`"
                  >Our Team</router-link>
                </v-hover>
                <v-divider class="grey_divider my-3"></v-divider>
              </span>
              <span>
                <v-hover v-slot:default="{hover}">
                  <router-link
                    to="/our-contacts"
                    class="text-decoration-none"
                    :class="`${hover?'primary--text':'  grey--text'}`"
                  >Our Contacts</router-link>
                </v-hover>
                <v-divider class="grey_divider my-3"></v-divider>
              </span>
            </v-col>
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
    <v-container>
      <v-row>
        <v-col cols="12" md="6">
          <p class="font-weight-bold text-h5">How we work</p>
          <v-img src="/img/about-1.jpg" contain></v-img>
        </v-col>
        <v-col cols="12" md="6">
          <p class="font-weight-bold text-h5">Our Mission</p>
          <span>
            <p class="font-weight-light">Our renowned coaching programs will allow you to:</p>
            <p>
              <v-icon small color="blue">mdi-check</v-icon>
              <span class="font-weight-light">Relationships with clients, with employees</span>
            </p>
            <p>
              <v-icon small color="blue">mdi-check</v-icon>
              <span class="font-weight-light">Integrity in all we do to achieve full potential</span>
            </p>
            <p>
              <v-icon small color="blue">mdi-check</v-icon>
              <span class="font-weight-light">Cut expenses without sacrificing quality</span>
            </p>
            <p>
              <v-icon small color="blue">mdi-check</v-icon>
              <span class="font-weight-light">Integrity in all we do to achieve full potential</span>
            </p>
            <p>
              <v-icon small color="blue">mdi-check</v-icon>
              <span class="font-weight-light">Hone sharp leadership skills to manage your team</span>
            </p>
            <p>
              <v-icon small color="blue">mdi-check</v-icon>
              <span class="font-weight-light">Manage your time so you'll get more done in less time</span>
            </p>
          </span>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import ContactUs from "../components/contact-us/ContactUs";
import axios from "axios";
export default {
  components: {
    ContactUs,
  },
  data() {
    return {
      testimonials: [],
      items: [
        {
          text: "Home",
          disabled: false,
          href: "/",
        },
        {
          text: "About Us",
          disabled: true,
        },
      ],
    };
  },
  created() {
    axios
      .get("http://sahakari-app.com/api/get-comments/3")
      .then((res) => (this.testimonials = res.data.data));
  },
};
</script>

<style scoped>
.count {
  font-weight: 900;
  font-size: 60px;
  color: #8acbe6;
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