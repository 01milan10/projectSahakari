<template>
  <v-parallax src="/img/parallax-section.jpg" height="700">
    <v-container fluid class="mx-auto my-10">
      <v-row class="flex-column align-center my-10">
        <h1 class="display-1 font-weight-light text-center white--text">Contact Us</h1>
        <v-divider class="grey lighten-3" width="25%"></v-divider>
      </v-row>
      <v-row class="justify-center">
        <v-col cols="12" sm="12" md="8">
          <v-card class="grey lighten-4">
            <v-card-text>
              <v-form class="px-3" color="blue" ref="form">
                <v-text-field label="Full Name" prepend-icon="mdi-clipboard-account"></v-text-field>
                <v-text-field label="Email" prepend-icon="mdi-email"></v-text-field>
                <v-text-field label="Subject" prepend-icon="mdi-text-subject"></v-text-field>
                <v-textarea label="Message" prepend-icon="mdi-message-reply"></v-textarea>
                <v-row>
                  <v-spacer></v-spacer>
                  <v-btn class="mx-0 mt-3 blue white--text" rounded>
                    Submit
                    <template v-slot:loader>
                      <span class="custom-loader">
                        <v-icon light>mdi-cached</v-icon>
                      </span>
                    </template>
                  </v-btn>
                </v-row>
              </v-form>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-parallax>
</template>

<script>
export default {
  name: "Contact"
};
</script>

<style scoped>
.v-parallax img {
  opacity: 0.5;
}
</style>