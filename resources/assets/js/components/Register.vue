<template>
    <v-form v-model="valid" ref="form" action="/register" method="post">
        <v-text-field
            name="name"
            label="Name"
            v-model="name"
            hint="Your real name, please"
            autocomplete="new-name"
            required
            :rules="nameRules"
        ></v-text-field>
        <v-text-field
            name="email"
            label="E-mail"
            v-model="email"
            autocomplete="new-email"
            required
            :rules="emailRules"
        ></v-text-field>
        <v-text-field
            name="password"
            label="Enter your password"
            hint="At least 8 characters"
            min="8"
            type="password"
            autocomplete="new-password"
            required
        ></v-text-field>
        <v-text-field
            name="password_confirmation"
            label="Confirm your password"
            hint="At least 8 characters"
            min="8"
            type="password"
            autocomplete="new-password-confirmation"
            required
        ></v-text-field>
    <v-btn @click="submit">Start</v-btn>
    <a href="/login"><v-btn>Log ind</v-btn></a>
    <slot></slot>
  </v-form>
</template>

<script>
  export default {
    data () {
      return {
        valid: false,
        password: '',
        passwordRules: [
          (v) => !!v || 'Password is required'
        ],
        password_confirmation: '',
        passwordConfirmationRules: [
          (v) => !!v || 'Password confirmation is required'
        ],
        name: '',
        nameRules: [
          (v) => !!v || 'Name is required'
        ],
        email: '',
        emailRules: [
            (v) => !!v || 'E-mail is required',
            (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
        ]
      }
    },
    methods: {
      submit () {
        if (this.$refs.form.validate()) {
          this.$refs.form.$el.submit()
        }
      },
      clear () {
        this.$refs.form.reset()
      }
    }
  }
</script>
