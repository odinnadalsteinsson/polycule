<template>
  <v-form v-model="valid" ref="form" action="/login" method="post">
    <v-text-field
        name="email"
        label="Indtast din e-mail adresse"
        v-model="email"
        autocomplete="new-email"
        :rules="emailRules"
        required
    ></v-text-field>
    <v-text-field
        name="password"
        label="Indtast din adgangskode"
        type="password"
        v-model="password"
        autocomplete="new-password"
        required
        :rules="passwordRules"
    ></v-text-field>
    <v-btn @click="submit">Log ind</v-btn>
    <a href="/auth/facebook" style="text-decoration: none">
      <v-btn style="background-color: #3b5998; color: white">
        <v-icon>fa-facebook</v-icon>&nbsp;&nbsp;Log ind med facebook
      </v-btn>
    </a>
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
          (v) => !!v || 'Du skal skrive din adgangskode'
        ],
        email: '',
        emailRules: [
          (v) => !!v || 'Du skal skrive din e-mail adresse',
          (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail adressen er ugyldig'
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
