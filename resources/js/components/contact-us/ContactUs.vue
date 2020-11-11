<template>
  <v-dialog v-model="dialog" width="600" persistent>
    <template v-slot:activator="{on,attrs}">
      <v-btn v-bind="attrs" v-on="on" small outlined color="white">Contact Us</v-btn>
    </template>
    <v-card class="grey lighten-4">
      <v-card-title>
        <span class="text-h4 primary--text">Connect To us</span>
        <v-spacer></v-spacer>
        <v-btn icon color="danger" @click="dialog=false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-text class="py-4">
        <v-alert
          type="success"
          :value="messageAlert"
          dismissible
          outlined
          transition="slide-x-reverse-transition"
        >Your message has been sent.</v-alert>
        <v-alert
          type="error"
          :value="errorAlert"
          outlined
          dismissible
          transition="slide-x-reverse-transition"
        >Invalid Inputs</v-alert>
        <v-form color="blue" ref="form">
          <v-text-field
            label="Full Name"
            v-model="name"
            prepend-icon="mdi-clipboard-account"
            outlined
            :rules="nameRules"
          ></v-text-field>
          <v-text-field
            label="Email"
            v-model="email"
            prepend-icon="mdi-email"
            outlined
            :rules="emailRules"
          ></v-text-field>
          <v-text-field
            label="Subject"
            v-model="subject"
            prepend-icon="mdi-text-subject"
            :rules="subjectRules"
            outlined
          ></v-text-field>
          <v-textarea
            label="Message"
            v-model="message"
            prepend-icon="mdi-message-reply"
            auto-grow
            rows="1"
            outlined
            :rules="messageRules"
            clearable
          ></v-textarea>
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-btn block class="blue white--text" rounded @click="submit">Submit</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import Axios from "axios";
export default {
  name: "Contact",
  data() {
    return {
      dialog: false,
      name: "",
      email: "",
      subject: "",
      message: "",
      messageAlert: false,
      errorAlert: false,
      emailRules: [
        (v) => !!v || "E-mail is required",
        (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
      ],
      nameRules: [(v) => !!v || "Name is required"],
      subjectRules: [(v) => !!v || "Subject is required"],
      messageRules: [(v) => !!v || "Message is required"],
    };
  },
  methods: {
    submit() {
      if (this.$refs.form.validate()) {
        const input = {
          name: this.name,
          email: this.email,
          subject: this.subject,
          message: this.message,
        };
        Axios.post("http://sahakari-app.com/api/sendMessage", input).then(
          () => {
            this.messageAlert = true;
            this.$refs.form.reset();
            setTimeout(() => {
              this.dialog = false;
            }, 1500);
          }
        );
      } else {
        this.$refs.form.reset();
        this.errorAlert = true;
      }
      setTimeout(
        () => ((this.messageAlert = false), (this.errorAlert = false)),
        5000
      );
    },
  },
};
</script>

<style>
</style>