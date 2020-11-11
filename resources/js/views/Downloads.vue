<template>
  <div class="page">
    <v-parallax src="/img/services-parallax.jpg" height="150">
      <h2 class="text-center display-1">Downloads</h2>
    </v-parallax>
    <v-container>
      <v-breadcrumbs :items="bread_items" class="pa-0">
        <template v-slot:divider>
          <v-icon color="primary">mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </v-container>
    <v-container>
      <v-card class="grey lighten-4 rounded-lg">
        <v-card-title>
          <span class="font-weight-light">Downloadables list</span>
          <v-spacer></v-spacer>
          <v-text-field
            class="font-weight-light"
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            clearable
          ></v-text-field>
        </v-card-title>
        <v-data-table
          :headers="headers"
          :items="download_items"
          :search="search"
          mobile-breakpoint="768"
          loading-text="Loading... Please Wait!"
        >
          <template v-slot:item.color="{ item }">
            <v-tooltip top>
              <template v-slot:activator="{on,attrs}">
                <v-btn
                  :color="item.color"
                  icon
                  v-bind="attrs"
                  v-on="on"
                  :href="`/downloadables/${item.id}`"
                >
                  <v-icon>mdi-download</v-icon>
                </v-btn>
              </template>
              <span>Download {{item.file}}</span>
            </v-tooltip>
          </template>
          <template v-slot:item.name="{item}">
            <span class="font-weight-light">{{item.name}}</span>
          </template>
        </v-data-table>
      </v-card>
    </v-container>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  data() {
    return {
      search: "",
      bread_items: [
        {
          text: "Home",
          disabled: false,
          href: "/",
        },
        {
          text: "Downloads",
          disabled: true,
          href: "/downloads",
        },
      ],
      headers: [
        {
          text: "Downloadable Name",
          align: "start",
          sortable: true,
          value: "title",
        },
        {
          text: "",
          value: "color",
          sortable: false,
        },
      ],
      download_items: [],
    };
  },
  created() {
    Axios.get("http://sahakari-app.com/api/get-downloads").then(
      (res) => (this.download_items = res.data.data)
    );
  },
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
</style>>

</style>