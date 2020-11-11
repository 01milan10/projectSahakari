<template>
  <v-parallax src="/img/parallax-section.jpg" height="700">
    <v-container fluid class="mx-auto my-10">
      <v-row class="flex-column align-center my-10">
        <h1 class="display-1 font-weight-light text-center white--text">Contact Us</h1>
        <v-divider class="grey lighten-3" width="25%"></v-divider>
      </v-row>
      <v-row class="justify-center contactForm">
        <v-col cols="12" sm="12" md="8">
          <v-card class="grey lighten-4">
            <v-card-text>
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
                <v-row>
                  <v-spacer></v-spacer>
                  <v-btn class="mx-0 mt-3 blue white--text" rounded @click="submit">Submit</v-btn>
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
import Axios from "axios";
export default {
  name: "Contact",
  data() {
    return {
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
  mounted() {
    let t1 = this.$gsap.timeline({
      scrollTrigger: {
        trigger: ".contactForm",
        start: "top center",
        end: "bottom top",
        toggleActions: "restart pause resume pause",
      },
    });

    t1.fromTo(
      ".contactForm",
      {
        xPercent: 30,
        opacity: 0,
      },
      {
        xPercent: 0,
        duration: 2.5,
        ease: "back",
        opacity: 1,
      }
    );
  },
};
</script>

<style scoped>
.v-parallax img {
  opacity: 0.5;
}
</style>