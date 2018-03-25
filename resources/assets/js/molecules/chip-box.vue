<template>
  <div>
    <v-select
      label="Hobbyer"
      chips
      tags
      prepend-icon=""
      append-icon=""
      v-model="chips"
      hint="Tilføj hobbyer"
      persistent-hint
    >
      <template slot="selection" slot-scope="data">
        <v-chip
          close
          @input="remove(data.item)"
          :selected="data.selected"
          outline
        >
          {{ data.item }}
        </v-chip>
      </template>
    </v-select>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        chips: ['Programmering', 'Spille spil', 'Se film', 'Sove!']
      }
    },

    methods: {
      remove (item) {
        this.chips.splice(this.chips.indexOf(item), 1)
        this.chips = [...this.chips]
      }
    }
  }
</script>
