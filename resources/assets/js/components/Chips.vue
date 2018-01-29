<template>
  <v-select
    label="Your favorite hobbies"
    chips
    tags
    solo
    clearable
    outline
    v-model="chips"
  >
    <template slot="selection" slot-scope="data">
      <v-chip
        close
        @input="remove(data.item)"
        :selected="data.selected"
      >
        <strong>{{ data.item }}</strong>
      </v-chip>
    </template>
  </v-select>
</template>

<script>
  const chipsData = '/api/chips';

  export default {
    data () {
      return {
        chips: []
      }
    },
    created() {
      fetch(chipsData)
      .then(res => res.json())
      .then(res => {
        this.chips = res.chips;
      })

    },
    methods: {
      remove (item) {
        this.chips.splice(this.chips.indexOf(item), 1)
        this.chips = [...this.chips]
      }
    }
  }
</script>
