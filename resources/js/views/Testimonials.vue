<template>
  <div>
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="display-1 text-center">Testimonials</h2>
    </v-parallax>
    <v-container>
      <v-timeline class="pa-sm-0">
        <v-slide-x-reverse-transition group hide-on-leave>
          <v-timeline-item v-for="(testimony,i) in testimonials" :key="i" class="py-5">
            <template v-slot:icon>
              <v-avatar size="65">
                <img :src="testimony.avatar" />
              </v-avatar>
            </template>
            <template v-slot:opposite>
              <v-row class="flex-column">
                <span class="font-weight-light primary--text text-h6">{{testimony.name}}</span>
                <span class="font-weight-light grey--text">{{testimony.position}}</span>
              </v-row>
            </template>
            <v-card class="elevation-2 rounded-xl grey lighten-4">
              <v-card-text
                class="grey--text"
              >Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an salutandi sententiae.</v-card-text>
            </v-card>
          </v-timeline-item>
        </v-slide-x-reverse-transition>
      </v-timeline>
    </v-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      testimonials: [
        {
          avatar: "/img/person_1.jpg",
          name: "Johan Hill",
          position: "CEO & Founder",
          message:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur saepe repudiandae sint quia hic et."
        },
        {
          avatar: "/img/person_2.jpg",
          name: "David De Gea",
          position: "CEO & Founder",
          message:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur saepe repudiandae sint quia hic et."
        },
        {
          avatar: "/img/person_3.jpg",
          name: "Jack Black",
          position: "CEO & Founder",
          message:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur saepe repudiandae sint quia hic et."
        },
        {
          avatar: "/img/person_4.jpg",
          name: "Hilary Clinton",
          position: "CEO & Founder",
          message:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur saepe repudiandae sint quia hic et."
        },
        {
          avatar: "/img/person_5.jpg",
          name: "Jack Sparrow",
          position: "CEO & Founder",
          message:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur saepe repudiandae sint quia hic et."
        },
        {
          avatar: "/img/person_6.jpg",
          name: "David Beckham",
          position: "CEO & Founder",
          message:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur saepe repudiandae sint quia hic et."
        }
      ],
      transition: true
    };
  }
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