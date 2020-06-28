<template>
  <div>
    <v-container fluid class="grey lighten-4">
      <v-row class="flex-column align-center mt-7">
        <h1 class="font-weight-light display-1">About Us</h1>
        <v-divider class="black" width="25%"></v-divider>
        <v-container class="mx-auto">
          <v-row class="mt-7 justify-center align-start">
            <v-col cols="12" sm="10" md="5" lg="4">
              <v-img src="/img/about-us.svg" contain max-height="500px" class="mr-5"></v-img>
            </v-col>
            <v-col cols="12" sm="10" md="5" lg="4">
              <v-container>
                <h2 class="font-weight-light">Our Mission</h2>
                <p
                  class="my-3 grey--text"
                >Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, fugiat provident necessitatibus laudantium accusantium voluptas, cupiditate optio cum cumque animi deserunt blanditiis amet vel, magni odit possimus assumenda reprehenderit asperiores!</p>
                <span>
                  <p>
                    <v-icon color="success" class="pr-3">mdi-check</v-icon>Lorem ipsum dolor sit amet.
                  </p>
                  <p>
                    <v-icon color="success" class="pr-3">mdi-check</v-icon>Lorem ipsum.
                  </p>
                  <p>
                    <v-icon color="success" class="pr-3">mdi-check</v-icon>Sit amet.
                  </p>
                </span>
                <v-hover v-slot:default="{hover}">
                  <v-btn
                    class="mt-5"
                    rounded
                    outlined
                    text
                    :elevation="hover?3:0"
                    :class="`${hover?'blue--text':'blue white--text'}`"
                    to="/about-us"
                  >Learn More</v-btn>
                </v-hover>
              </v-container>
            </v-col>
          </v-row>
        </v-container>
      </v-row>
    </v-container>
    <v-container fluid class="my-16 px-7">
      <v-row class="flex-column align-center">
        <h1 class="display-1 font-weight-light text-center">Our Team</h1>
        <v-divider class="black" width="25%"></v-divider>
        <p
          class="font-weight-light grey--text mt-3 text-center"
        >Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias, facilis!</p>
        <v-row class="my-5 justify-center">
          <v-col cols="12" sm="6" md="4" lg="2" v-for="(person,i) in team" :key="i">
            <v-hover v-slot:default="{hover}">
              <v-card
                class="mx-auto mt-3 card rounded-t-xl rounded-b-xl"
                :class="`${hover?'blue':'grey lighten-4'}`"
                :elevation="hover?5:2"
                max-width="200"
              >
                <v-img class="img" :src="person.photo">
                  <v-expand-transition>
                    <div
                      v-if="hover"
                      class="d-flex justify-center black darken-4 reveal transition-fast-in-fast-out"
                      style="height:15%"
                    >
                      <span>
                        <v-btn icon>
                          <v-hover v-slot:default="{hover}">
                            <v-icon class="mx-2" :color="`${hover?'blue':'grey'}`">mdi-facebook</v-icon>
                          </v-hover>
                        </v-btn>
                        <v-btn icon>
                          <v-hover v-slot:default="{hover}">
                            <v-icon class="mx-2" :color="`${hover?'blue':'grey'}`">mdi-twitter</v-icon>
                          </v-hover>
                        </v-btn>
                        <v-btn icon>
                          <v-hover v-slot:default="{hover}">
                            <v-icon class="mx-2" :color="`${hover?'blue':'grey'}`">mdi-instagram</v-icon>
                          </v-hover>
                        </v-btn>
                      </span>
                    </div>
                  </v-expand-transition>
                </v-img>
                <v-card-title
                  class="my-2 font-weight-light"
                  :class="`${hover?'black--text':''}`"
                >{{person.name}}</v-card-title>
                <v-card-subtitle :class="`${hover?'white--text':'blue--text'}`">{{person.position}}</v-card-subtitle>
              </v-card>
            </v-hover>
          </v-col>
        </v-row>
        <v-btn rounded text class="mt-7 blue--text" to="/our-team">see more..</v-btn>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      team: [
        {
          name: "Chloe Marena",
          position: "President",
          photo: "/img/person_1.jpg"
        },
        {
          name: "John Rooster",
          position: "Marketing",
          photo: "/img/person_2.jpg"
        },
        {
          name: "Will Turner",
          position: "Marketing",
          photo: "/img/person_3.jpg"
        },
        {
          name: "Nicolas Stainer",
          position: "Financing",
          photo: "/img/person_4.jpg"
        },
        {
          name: "George Brook",
          position: "Founder",
          photo: "/img/person_5.jpg"
        },
        {
          name: "Emily Hopson",
          position: "Marketing",
          photo: "/img/person_6.jpg"
        }
      ]
    };
  }
};
</script>

<style>
.reveal {
  align-items: center;
  bottom: 0;
  justify-content: center;
  opacity: 0.7;
  position: absolute;
  width: 100%;
}
.card:hover {
  transform: scale(1.03);
  transition: 0.3s ease-in-out;
}
p {
  line-height: 30px;
}
</style>