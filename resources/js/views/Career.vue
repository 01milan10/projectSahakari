<template>
  <div>
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">Our Services</h2>
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
            <v-card-subtitle class="ml-2 primary--text font-italic">{{career.type}}</v-card-subtitle>
            <v-card-text class="ml-2">
              <p class="mb-0">
                Seats available:
                <span class="primary--text">{{career.seats}}</span>
              </p>
              <p>
                Requirements:
                <span class="requirements" v-html="career.requirements"></span>
              </p>
            </v-card-text>
          </v-card>
        </v-card-text>
        <v-card-actions>
          <span class="font-weight-light">
            Send your cv at:
            <a
              @click="redirect"
              class="primary--text font-weight-light"
            >someone@something.com</a>
          </span>
        </v-card-actions>
      </v-card>
    </v-container>
  </div>
</template>

<script>
export default {
  methods: {
    redirect() {
      const url = "https://www.gmail.com";
      window.open(url);
    }
  },
  data() {
    return {
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/"
        },
        {
          text: "Career",
          disabled: true
        }
      ],
      careers: [
        {
          type: "Job Vaccancy",
          position: "Sales Representative",
          seats: 10,
          requirements: `<p>Heading</p><p>Title</p><p>this is a new paragraph that i want to write and i want to be able to type properly.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus neque eaque magni in enim autem, a at accusamus. At hic voluptatem laudantium inventore quam veritatis suscipit exercitationem. Ex, distinctio alias.</p><p><br></p>`
        },
        {
          type: "Job Vaccancy",
          position: "Sales Manager",
          seats: 2,
          requirements: `<p>Heading</p><p>Title</p><p>this is a new paragraph that i want to write and i want to be able to type properly.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus neque eaque magni in enim autem, a at accusamus. At hic voluptatem laudantium inventore quam veritatis suscipit exercitationem. Ex, distinctio alias.</p><p><br></p>`
        }
      ]
    };
  }
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