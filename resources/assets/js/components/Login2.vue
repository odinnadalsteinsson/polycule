<template>
  <form action="/login" method="post">
    <v-text-field
      label="E-mail"
      v-model="email"
      :error-messages="emailErrors"
      @input="$v.email.$touch()"
      @blur="$v.email.$touch()"
      required
    ></v-text-field>
    <v-text-field
      label="Adgangskode"
      v-model="password"
      type="password"
      :error-messages="passwordErrors"
      @input="$v.password.$touch()"
      @blur="$v.password.$touch()"
      required
    ></v-text-field>
    <v-btn @click="submit">Log ind</v-btn>
  </form>
</template>

<script>
  import { validationMixin } from 'vuelidate'
  import { required, email } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],
    validations: {
      email: {
        required,
        email
      },
      password: {
        required
      }
    },
    data () {
      return {
        email: '',
        password: ''
      }
    },
    methods: {
      submit () {
        this.$v.$touch()
      },
      clear () {
        this.$v.$reset()
        this.email = ''
      }
    },
    computed: {
      emailErrors () {
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('E-mail adressen skal være gyldig')
        !this.$v.email.required && errors.push('Du skal skrive din e-mail adresse')
        return errors
      },
      passwordErrors () {
        const errors = []
        if (!this.$v.password.$dirty) return errors
        !this.$v.password.required && errors.push('Du skal skrive din adgangskode')
        return errors
      }
    }
  }
</script>
