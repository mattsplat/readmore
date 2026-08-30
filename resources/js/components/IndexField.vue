<template>
  <ReadMore
    v-if="hasValue"
    :text="String(field.value)"
    :characters="field.characters"
    :mask="field.mask"
  />
  <span v-else>&mdash;</span>
</template>

<script>
import ReadMore from './ReadMore'

export default {
  components: { ReadMore },

  props: ['resourceName', 'field'],

  computed: {
    hasValue() {
      return (
        this.field.value !== null &&
        this.field.value !== undefined &&
        this.field.value !== ''
      )
    },
  },
}
</script>
