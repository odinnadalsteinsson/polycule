<template>
    <v-form v-model="valid" ref="form" action="/register" method="post">
        <v-text-field
            name="name"
            label="Navn"
            v-model="name"
            hint="Brug dit fulde navn"
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
            label="Vælg dig en adgangskode"
            hint="Mindst 8 tegn"
            min="8"
            type="password"
            autocomplete="new-password"
            required
        ></v-text-field>
        <v-text-field
            name="password_confirmation"
            label="Bekræft adgangskoden"
            hint="Mindst 8 tegn"
            min="8"
            type="password"
            autocomplete="new-password-confirmation"
            required
        ></v-text-field>
    <v-btn @click="submit">Videre</v-btn>
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
          (v) => !!v || 'Du skal indtaste din adgangskode her'
        ],
        password_confirmation: '',
        passwordConfirmationRules: [
          (v) => !!v || 'Bekræft din adgangkode'
        ],
        name: '',
        nameRules: [
          (v) => !!v || 'Du skal skrive dit navn her'
        ],
        email: '',
        emailRules: [
            (v) => !!v || 'Du skal skrive din e-mail adresse her',
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
