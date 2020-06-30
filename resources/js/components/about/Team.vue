<template>
  <div>
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
                <v-img :src="person.photo" style="border-radius:10px; height:240"></v-img>
                <v-card-title class="px-0">
                  <h4>{{person.name}}</h4>
                </v-card-title>
                <v-card-subtitle class="px-0">
                  <h4 class="font-weight-light">{{person.position}}</h4>
                </v-card-subtitle>
                <v-divider class="grey_divider"></v-divider>
                <v-card-text class="px-0">
                  <span>{{person.description}}</span>
                </v-card-text>
                <v-card-actions class="pt-0 px-0">
                  <v-btn small icon>
                    <v-icon>mdi-facebook</v-icon>
                  </v-btn>
                  <v-btn small icon>
                    <v-icon>mdi-twitter</v-icon>
                  </v-btn>
                  <v-btn small icon>
                    <v-icon>mdi-google-plus</v-icon>
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
                  delimiter-icon="mdi-circle-outline"
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
  name: "About",
  data() {
    return {
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/"
        },
        {
          text: "About Us",
          disabled: false,
          href: "/about-us"
        },
        {
          text: "Our Team",
          disabled: true,
          href: "/our-team"
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
      ],
      team: [
        {
          id: 1,
          name: "Chloe Marena",
          position: "President",
          photo: "/img/person_1.jpg",
          description:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, consectetur!"
        },
        {
          id: 2,
          name: "John Rooster",
          position: "Marketing",
          photo: "/img/person_2.jpg",
          description:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, consectetur!"
        },
        {
          id: 3,
          name: "Will Turner",
          position: "Marketing",
          photo: "/img/person_3.jpg",
          description:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, consectetur!"
        },
        {
          id: 4,
          name: "Nicolas Stainer",
          position: "Financing",
          photo: "/img/person_4.jpg",
          description:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, consectetur!"
        },
        {
          id: 5,
          name: "George Brook",
          position: "Founder",
          photo: "/img/person_5.jpg",
          description:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, consectetur!"
        },
        {
          id: 6,
          name: "Emily Hopson",
          position: "Marketing",
          photo: "/img/person_6.jpg",
          description:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, consectetur!"
        }
      ]
    };
  }
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