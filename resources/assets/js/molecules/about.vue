<template>
<form method="post">
    <v-text-field
        v-model="about"
        :error-messages="aboutErrors"
        @input="$v.about.$touch()"
        @blur="$v.about.$touch()"
        required
        name="about"
        label="Profiltekst"
        placeholder="Skriv din profiltekst her."
        :value="about"
        multi-line
    ></v-text-field>
    </v-text-field>
    <v-card-actions>
        <v-spacer/>
        <v-btn @click="submit">Gem</v-btn>
    </v-card-actions>
</form>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required } from 'vuelidate/lib/validators'
export default {
    mixins: [validationMixin],
    validations: {
      about: { required },
    },
    data: () => ({
      about: '',
    }),
    props: {
        id: null,
        text: null
    },
    created() {
        this.about = this.text
    },
    computed: {
        aboutErrors () {
            const errors = []
            if (!this.$v.about.$dirty) return errors
            !this.$v.about.required && errors.push('Du skal skrive en profiltekst.')
            return errors
        }
    },
    methods: {
        submit () {
            this.$v.$touch()
            axios
                .put('/users/' + this.id, {
                    about: this.about,
                });
        },
    }
}
</script>
