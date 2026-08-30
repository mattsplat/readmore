<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <ReadMore
        v-if="hasValue"
        :text="String(field.value)"
        :characters="field.characters"
        :mask="field.mask"
        :less-label="field.lessLabel"
      />
      <span v-else>&mdash;</span>
    </template>
  </PanelItem>
</template>

<script>
import ReadMore from './ReadMore'

export default {
  components: { ReadMore },

  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

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
