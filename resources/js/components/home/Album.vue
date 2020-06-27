<template>
  <v-container fluid class="my-10">
    <v-row class="mx-auto flex-column align-center">
      <h1 class="display-1 font-weight-light text-center">Our Photo Album</h1>
      <v-divider class="black" width="25%"></v-divider>
      <v-container class="mt-5">
        <v-row justify="center">
          <v-col cols="12" sm="4" md="3" lg="2" v-for="(photo,i) in gallery" :key="i">
            <v-card flat class="my-1 rounded-t-lg">
              <v-img class="img" :src="photo.item" height="200"></v-img>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <v-btn rounded text color="blue">see more</v-btn>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      gallery: [
        {
          item: "/img/person_1.jpg"
        },
        {
          item: "/img/person_2.jpg"
        },
        {
          item: "/img/person_3.jpg"
        },
        {
          item: "/img/person_4.jpg"
        },
        {
          item: "/img/person_5.jpg"
        },
        {
          item: "/img/person_6.jpg"
        }
      ]
    };
  }
};
</script>

<style scoped>
.img:hover {
  transform: scale(1.025);
  transition: 0.4s ease;
}
</style>