<template>
  <v-form v-model="valid" ref="form" action="/login" method="post">
    <v-text-field
        name="email"
        label="E-mail"
        v-model="email"
        autocomplete="new-email"
        :rules="emailRules"
        required
    ></v-text-field>
    <v-text-field
        name="password"
        label="Enter your password"
        hint="At least 8 characters"
        min="8"
        type="password"
        v-model="password"
        autocomplete="new-password"
        required
        :rules="passwordRules"
    ></v-text-field>
    <v-btn @click="submit">Log ind</v-btn>
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
