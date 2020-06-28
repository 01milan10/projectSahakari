<template>
  <div>
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">Our Services</h2>
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
          <v-row>
            <v-col cols="12" sm="4" v-for="(service,i) in services" :key="i">
              <v-card flat>
                <v-img :src="service.img"></v-img>
                <v-card-title class="pl-0">{{service.title}}</v-card-title>
                <v-card-text
                  class="pl-0 pb-0 font-weight-light"
                >Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse sint totam, quia odit a quas aliquam neque! Fugiat, distinctio rem!</v-card-text>
                <v-card-actions>
                  <v-btn x-small text rounded color="primary" class="px-0">
                    see more
                    <v-icon x-small>mdi-chevron-right</v-icon>
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
                  <v-btn small outlined color="white">Contact Us</v-btn>
                </v-card-text>
              </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="12">
              <v-card flat outlined>
                <v-carousel
                  height="370"
                  :show-arrows="false"
                  hide-delimiter-background
                  light
                  :continuous="true"
                  :cycle="true"
                >
                  <v-carousel-item v-for="(testimonial,i) in testimonials" :key="i">
                    <v-row class="flex-column align-center">
                      <v-avatar class="mt-5" size="100">
                        <img :src="testimonial.avatar" alt />
                      </v-avatar>
                      <span>
                        <p class="mt-5 px-10 text-center caption grey--text">{{testimonial.quote}}</p>
                        <p class="my-0 px-10 text-center font-weight-bold">{{testimonial.person}}</p>
                        <p
                          class="my-0 px-10 text-center font-weight-light grey--text"
                        >({{testimonial.position}})</p>
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
export default {
  data: () => ({
    items: [
      {
        text: "Home",
        disabled: false,
        href: "/"
      },
      {
        text: "Services",
        disabled: true,
        href: "/services"
      }
    ],
    services: [
      {
        title: "Financial Planning",
        img: "/img/service-1.jpg"
      },
      {
        title: "Investment Advising",
        img: "/img/service-2.jpg"
      },
      {
        title: "Taxation",
        img: "/img/service-3.jpg"
      },
      {
        title: "Retirement Planning",
        img: "/img/service-4.jpg"
      },
      {
        title: "Business Planning",
        img: "/img/service-5.jpg"
      },
      {
        title: "Risk Management",
        img: "/img/service-6.jpg"
      }
    ],
    testimonials: [
      {
        person: "Louise Smith",
        position: "CEO & Founder",
        avatar: "/img/person_1.jpg",
        quote:
          "Wow, I am so happy with your service. You managed to exceed my expectations! You guys are very efficient."
      },
      {
        person: "Jack Walsh",
        position: "CEO & Founder",
        avatar: "/img/person_2.jpg",
        quote:
          "Wow, I am so happy with your service. You managed to exceed my expectations! You guys are very efficient."
      },
      {
        person: "Adam Watson",
        position: "CEO & Founder",
        avatar: "/img/person_3.jpg",
        quote:
          "Wow, I am so happy with your service. You managed to exceed my expectations! You guys are very efficient."
      }
    ]
  })
};
</script>

<style scoped>
.btn-presentation {
  transform: scale(0.98);
  transition: 0.3s ease-in-out;
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