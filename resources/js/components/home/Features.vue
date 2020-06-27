<template>
  <v-container fluid class="mt-5 pt-10">
    <v-row class="flex-column justify-center align-center mt-7">
      <h1 class="font-weight-light display-1 text-center">Our Services & Features</h1>
      <v-divider class="black" width="25%"></v-divider>
      <v-row class="justify-center mx-auto mt-10">
        <v-col cols="12" sm="11" md="6" lg="3" v-for="(item,i) in items" :key="i">
          <v-hover v-slot:default="{hover}">
            <v-card
              :elevation="hover?10:0"
              class="rounded-t-xl rounded-b-xl"
              :class="`${hover?'blue':'grey lighten-4'}`"
              width="auto"
            >
              <div class="d-flex justify-center">
                <v-icon class="mt-2" x-large fab :color="`${hover?'black':'blue'}`">{{item.icon}}</v-icon>
              </div>
              <v-card-text class="text-center">
                <span class="black--text subtitle-1">{{item.title}}</span>
              </v-card-text>
              <v-card-text
                id="text"
                class="font-weight-light"
                :class="`${hover?'black--text':'grey--text'}`"
              >Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint minus necessitatibus ratione totam rerum soluta possimus at, eum nulla debitis?</v-card-text>
              <v-card-actions class="justify-center">
                <v-btn
                  text
                  rounded
                  to="/features"
                  :elevation="hover?5:0"
                  :class="`${hover?'grey lighten-4 blue--text':''}`"
                >learn more</v-btn>
              </v-card-actions>
            </v-card>
          </v-hover>
        </v-col>
      </v-row>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          title: "Marketing Consulting",
          icon: "mdi-sync"
        },
        {
          title: "Market Analysis",
          icon: "mdi-domain"
        },
        {
          title: "Easy Purchase",
          icon: "mdi-basket"
        }
      ]
    };
  }
};
</script>

<style>
#text {
  line-height: 30px;
}
</style>