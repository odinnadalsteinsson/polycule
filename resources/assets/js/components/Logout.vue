<template>
  <v-form ref="form" action="/logout" method="post">
    <v-btn @click="submit">Log ud</v-btn>
    <slot></slot>
  </v-form>
</template>

<script>
  export default {
    methods: {
      submit () {
        this.$refs.form.$el.submit()
      }
    }
  }
</script>
