<template>
  <v-footer padless tile height="auto" color="black">
    <v-container fluid fill-height class="d-flex">
      <v-row class="justify-center mx-auto align-start">
        <v-col cols="12" sm="12" md="6" lg="3">
          <v-row class="d-flex flex-column align-center mx-auto px-5 text-center">
            <v-img src="/img/footer-icon.png" max-width="180px"></v-img>
            <span
              class="white--text font-weight-light"
            >Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, culpa!</span>
            <v-row class="align-center mt-10">
              <v-hover v-slot:default="{hover}">
                <v-btn large class="mr-3" icon>
                  <v-icon :color="`${hover?'blue':'white'}`">mdi-facebook</v-icon>
                </v-btn>
              </v-hover>
              <v-hover v-slot:default="{hover}">
                <v-btn large class="mr-3" icon>
                  <v-icon :color="`${hover?'blue':'white'}`">mdi-twitter</v-icon>
                </v-btn>
              </v-hover>
              <v-hover v-slot:default="{hover}">
                <v-btn large class="mr-3" icon>
                  <v-icon :color="`${hover?'blue':'white'}`">mdi-gmail</v-icon>
                </v-btn>
              </v-hover>
            </v-row>
          </v-row>
        </v-col>
        <v-col cols="12" sm="12" md="6" lg="3">
          <v-row class="d-flex flex-column align-center">
            <span class="text-h6 text-uppercase white--text">Navigation</span>
            <v-divider class="grey darken-2 mt-3" width="50%"></v-divider>
            <v-row class="mt-2">
              <v-col class="mr-2">
                <p class="text-center font-weight-light">
                  <v-hover v-slot:default="{hover}">
                    <router-link
                      to="/"
                      class="grey--text text-decoration-none"
                      :class="`${hover?'blue--text':''}`"
                    >Home</router-link>
                  </v-hover>
                </p>
                <p class="text-center font-weight-light">
                  <v-hover v-slot:default="{hover}">
                    <router-link
                      to="/features"
                      class="grey--text text-decoration-none"
                      :class="`${hover?'blue--text':''}`"
                    >Features</router-link>
                  </v-hover>
                </p>
                <p class="text-center font-weight-light">
                  <v-hover v-slot:default="{hover}">
                    <router-link
                      to="/about-us"
                      class="grey--text text-decoration-none"
                      :class="`${hover?'blue--text':''}`"
                    >About us</router-link>
                  </v-hover>
                </p>
              </v-col>
              <v-col class="ml-2">
                <p class="text-center font-weight-light">
                  <v-hover v-slot:default="{hover}">
                    <router-link
                      to="/contact-us"
                      class="grey--text text-decoration-none"
                      :class="`${hover?'blue--text':''}`"
                    >Contact Us</router-link>
                  </v-hover>
                </p>
                <p class="text-center font-weight-light">
                  <v-hover v-slot:default="{hover}">
                    <router-link
                      to="/blog"
                      class="grey--text text-decoration-none"
                      :class="`${hover?'blue--text':''}`"
                    >Blog</router-link>
                  </v-hover>
                </p>
                <p class="text-center font-weight-light">
                  <v-hover v-slot:default="{hover}">
                    <router-link
                      to="/testimonials"
                      class="grey--text text-decoration-none"
                      :class="`${hover?'blue--text':''}`"
                    >Testimonials</router-link>
                  </v-hover>
                </p>
              </v-col>
            </v-row>
          </v-row>
        </v-col>
        <v-col cols="12" sm="12" md="6" lg="3">
          <v-row class="d-flex flex-column align-center">
            <span class="text-h6 text-uppercase white--text">Contact Info</span>
            <v-divider class="grey darken-2 mt-3" width="50%"></v-divider>
            <v-row class="d-flex flex-column align-start white--text ml-3">
              <div class="mt-4">
                <v-icon color="blue" class="mr-4">mdi-phone</v-icon>
                <span>
                  <strong>(123)4567890</strong>
                </span>
              </div>

              <div class="mt-4">
                <v-icon color="blue" class="mr-4">mdi-email-outline</v-icon>
                <span>info@dataworkhsop.nepal</span>
              </div>
              <div class="mt-4">
                <v-icon color="blue" class="mr-4">mdi-clock-outline</v-icon>
                <span>Sun-Fri: 9:00 to 17:00</span>
              </div>
              <div class="mt-4">
                <v-icon color="blue" class="mr-4">mdi-map-marker</v-icon>
                <span>
                  <strong class="font-weight-light">Sallaghari-4</strong>
                  <span class="ml-2">Bhaktapur, Nepal</span>
                </span>
              </div>
            </v-row>
          </v-row>
        </v-col>
        <v-col cols="12" sm="12" md="6" lg="3">
          <v-row class="d-flex flex-column align-center">
            <span class="text-h6 text-uppercase white--text">Subscribe</span>
            <v-divider class="grey darken-2 mt-3" width="50%"></v-divider>
            <v-row class="d-flex flex-column align-center white--text ml-">
              <div class="mt-4">
                <span class="font-weight-light">Get latest updates and offers.</span>
              </div>
              <v-card
                class="d-flex flex-row mt-1 align-center"
                color="grey lighten-3"
                width="270"
                height="65"
              >
                <form class="ml-4">
                  <v-text-field label="Email" :rules="emailRules" clearable></v-text-field>
                </form>
                <v-hover v-slot:default="{hover}">
                  <v-btn icon text class="ml-3 mr-3">
                    <v-icon large :color="`${hover?'black':'email'}`">mdi-email-send</v-icon>
                  </v-btn>
                </v-hover>
              </v-card>
            </v-row>
          </v-row>
        </v-col>
      </v-row>
      <v-row class="text-center">
        <v-col class="pa-0">
          <v-divider class="grey darken-2 mb-5" width="100%"></v-divider>
          <span class="grey--text text-uppercase text-subtitle-2 font-weight-light">
            &copy;
            {{new Date().getFullYear()}} -
            <strong>DataWorkshop Nepal</strong>
          </span>
        </v-col>
      </v-row>
    </v-container>
  </v-footer>
</template>

<script>
export default {
  data() {
    return {
      emailRules: [
        v => !!v || "E-mail is required",
        v => /.+@.+\..+/.test(v) || "E-mail must be valid"
      ]
    };
  }
};
</script>

<style>
</style>