<template>
  <v-container fluid class="mt-5">
    <v-row class="align-center justify-center mx-auto flex-wrap-reverse">
      <v-col cols="12" sm="12" lg="3">
        <v-hover v-slot:default="{hover}">
          <v-card flat class="d-flex flex-column mx-auto" height="auto">
            <h1 class="font-weight-light">Make Your Business More Profitable</h1>
            <v-row class="justify-start">
              <v-btn rounded color="blue" text :elevation="hover?3:0">
                take tour
                <v-icon small right>mdi-chevron-right</v-icon>
              </v-btn>
              <v-btn outlined rounded class="blue white--text ml-3" elevation="1">Join Now</v-btn>
            </v-row>
          </v-card>
        </v-hover>
      </v-col>
      <v-col cols="12" sm="12" lg="8">
        <v-hover v-slot:default="{hover}">
          <v-card flat class="mx-auto text-center ml-5">
            <v-sparkline
              auto-draw
              :auto-draw-duration="draw"
              :value="value"
              color="black"
              height="170"
              padding="0"
              stroke-linecap="round"
              line-width="1"
              radius="5"
              fill
              smooth
            ></v-sparkline>
            <v-expand-transition>
              <div
                v-if="hover"
                class="d-flex flex-column transition-fast-in-fast-out v-card--reveal grey lighten-3"
                style="height: 35%;"
              >
                <span
                  class="font-weight-light text-uppercase mb-2 text-sm-h6"
                >Join us on our incredible journey...</span>
                <v-btn rounded outlined color="black" class="text-sm">Join Now</v-btn>
              </div>
            </v-expand-transition>
          </v-card>
        </v-hover>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "Home",
  data: () => ({
    value: [
      42,
      44,
      65,
      51,
      59,
      61,
      69,
      76,
      70,
      78,
      95,
      88,
      83,
      71,
      90,
      95,
      90,
      93,
      89,
      95,
      97,
      99,
      89,
      87,
      84,
      81,
      79,
      85,
      93,
      100
    ],
    draw: 4500
  })
};
</script>

<style>
.v-card--reveal {
  align-items: center;
  bottom: 0;
  justify-content: center;
  opacity: 0.7;
  position: absolute;
  width: 100%;
}
h1 {
  font-size: 50px;
}
@media screen and (max-width: 1264px) {
  h1 {
    font-size: 30px;
  }
}
</style>