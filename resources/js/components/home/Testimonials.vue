<template>
  <v-container fluid class="grey lighten-4 mt-10">
    <v-row class="mx-auto flex-column align-center justify-center">
      <h1 class="font-weight-light display-1 text-center pt-10">Testimonials</h1>
      <v-divider class="black" width="25%"></v-divider>
      <v-carousel
        light
        hide-delimiter-background
        :show-arrows="false"
        :cycle="true"
        :continuous="true"
        style="width: 55%"
        delimiter-icon="mdi-circle-outline"
      >
        <v-carousel-item v-for="(carousel_item, i) in carousel_items" :key="i">
          <v-row class="justify-center mx-auto mt-10">
            <v-avatar size="100">
              <v-img :src="carousel_item.avatar"></v-img>
            </v-avatar>
            <span class="text-center">
              <p
                class="grey--text mt-5 font-weight-light font-italic carousel-content text-sm-body-2 text-md-h6 text-lg-h5"
              >"{{carousel_item.content}}"</p>
              <p class="black--text font-weight-bold mt-5 mb-0">{{carousel_item.person}}</p>
              <p class="font-weight-light grey--text">({{carousel_item.position}})</p>
            </span>
          </v-row>
        </v-carousel-item>
      </v-carousel>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      carousel_items: [
        {
          avatar: "/img/person_1.jpg",
          person: "Johan Hill",
          position: "CEO & Founder",
          content:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque officia praesentium voluptate iure molestiae perferendis facilis, libero optio molestias odio odit minima sit et nulla dolorem? At sunt voluptate assumenda?"
        },
        {
          avatar: "/img/person_2.jpg",
          person: "Jim Carry",
          position: "CEO & Founder",
          content:
            " Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque officia praesentium voluptate iure molestiae perferendis facilis, libero optio molestias odio odit minima sit et nulla dolorem? At sunt voluptate assumenda?"
        },
        {
          avatar: "/img/person_3.jpg",
          person: "Michael Carrick",
          position: "CEO & Founder",
          content:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque officia praesentium voluptate iure molestiae perferendis facilis, libero optio molestias odio odit minima sit et nulla dolorem? At sunt voluptate assumenda?"
        },
        {
          avatar: "/img/person_4.jpg",
          person: "Hilary Towle",
          position: "CEO & Founder",
          content:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque officia praesentium voluptate iure molestiae perferendis facilis, libero optio molestias odio odit minima sit et nulla dolorem? At sunt voluptate assumenda?"
        }
      ]
    };
  }
};
</script>

<style scoped>
.carousel-content {
  line-height: 1.7;
}

/* @media screen and (min-width: 1904px) {
  .carousel-content {
    max-width: 60% !important;
  }
} */
</style>

