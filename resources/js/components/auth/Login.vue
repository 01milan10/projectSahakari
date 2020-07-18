<template>
  <v-toolbar-items>
    <v-dialog width="400px" persistent v-model="login_dialog">
      <template v-slot:activator="{ on, attrs }">
        <v-hover v-slot:default="{hover}">
          <v-btn
            class="font-weight-light"
            text
            :color="`${hover?'blue':'grey'}`"
            :elevation="hover?1:0"
            v-bind="attrs"
            v-on="on"
            v-if="!isAuth"
          >Login</v-btn>
        </v-hover>
      </template>
      <v-card class="grey lighten-2 border-lg">
        <v-form class="px-3" ref="form" action="/login" method="POST">
          <v-card-title>
            <h2 class="font-weight-light black--text">Login</h2>
            <v-spacer></v-spacer>
            <v-btn icon color="error" @click="login_dialog=false">
              <v-icon color="red">mdi-close</v-icon>
            </v-btn>
          </v-card-title>
          <v-card-text class="py-0">
            <input type="hidden" name="_token" :value="token" />
            <v-text-field
              label="Email"
              prepend-icon="mdi-account"
              v-model="email"
              name="email"
              required
              :rules="emailRules"
              outlined
            ></v-text-field>
            <v-text-field
              label="Password"
              type="password"
              required
              prepend-icon="mdi-lock"
              v-model="password"
              name="password"
              outlined
              :rules="passwordRules"
            ></v-text-field>
          </v-card-text>
          <v-card-actions class="px-4">
            <v-row>
              <v-col cols="12">
                <v-row>
                  <v-btn color="blue" dark block type="submit" @click="validate">Login</v-btn>
                </v-row>
              </v-col>
            </v-row>
          </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
  </v-toolbar-items>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      login_dialog: false,
      loading: false,
      email: "",
      password: "",
      emailRules: [
        v => !!v || "Email is required",
        v => /.+@.+\..+/.test(v) || "E-mail must be valid"
      ],
      passwordRules: [v => !!v || "Password is required"]
    };
  },
  computed: {
    token() {
      let token = document.head.querySelector('meta[name="csrf-token"]');
      return token.content;
    }
  },
  methods: {
    validate(e) {
      if (!this.$refs.form.validate()) {
        e.preventDefault();
      }
    }
  },
  props: ["isAuth"]
};
</script>

<style scoped>
.custom-loader {
  animation: loader 1s infinite;
  display: flex;
}
@-moz-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>