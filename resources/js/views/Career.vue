<template>
  <div class="page">
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">Work with Us</h2>
    </v-parallax>
    <v-container>
      <v-breadcrumbs :items="bread_items" class="pa-0">
        <template v-slot:divider>
          <v-icon color="primary">mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </v-container>
    <v-container>
      <v-card flat>
        <v-card-title class="font-weight-light">Currently Available</v-card-title>
        <v-card-text>
          <v-card flat v-for="(career,i) in careers" :key="i">
            <v-card-title class="font-weight-regular">{{career.position}}</v-card-title>
            <v-card-subtitle class="ml-2 primary--text font-italic">{{career.opening}}</v-card-subtitle>
            <v-card-text class="ml-2">
              <p class="mb-0">
                Seats available:
                <span class="primary--text">{{career.seat}}</span>
              </p>
              <p>
                Requirements:
                <span class="requirements" v-html="career.requirement"></span>
              </p>
            </v-card-text>
          </v-card>
        </v-card-text>
        <v-card-actions>
          <span class="font-weight-light">
            Send your cv at:
            <a
              href="https://mail.google.com/mail/u/0/#inbox?compose=jrjtXJTXxmLKTPrrdSflBTmsgVKdBNjPnsQrmTHPmjLWlkpHVsLgtTSBTnrHxxvpxSvwrkDq"
              class="primary--text font-weight-light"
            >dataworkshopnepal@gmail.com</a>
          </span>
        </v-card-actions>
      </v-card>
    </v-container>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  methods: {
    redirect() {
      const url = "https://www.gmail.com";
      window.open(url);
    },
  },
  data() {
    return {
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/",
        },
        {
          text: "Career",
          disabled: true,
        },
      ],
      careers: [],
    };
  },
  created() {
    Axios.get("http://sahakari-app.com/api/get-oppurtunity").then(
      (response) => (this.careers = response.data.data)
    );
  },
};
</script>

<style scoped>
.requirements >>> p {
  margin-bottom: 0 !important;
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
</style>>