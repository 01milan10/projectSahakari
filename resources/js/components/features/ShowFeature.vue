<template>
  <div>
    <v-btn x-small text rounded color="primary" class="px-0" @click="dialog=true">
      see more
      <v-icon x-small>mdi-chevron-right</v-icon>
    </v-btn>
    <v-dialog v-model="dialog" max-width="500">
      <v-card>
        <v-img
          class="align-end"
          height="300px"
          :src="`/uploaded_images/services_images/${feature.image}`"
        ></v-img>
        <v-card-title>
          <span class="text-h4 dark--text">{{feature.title}}</span>
        </v-card-title>

        <v-card-text class="grey--text my-2 pb-0">
          <span class="body">{{feature.description}}</span>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn rounded outlined color="danger" @click="dialog=false">Close</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
    };
  },
  props: ["feature"],
};
</script>

<style>
</style>