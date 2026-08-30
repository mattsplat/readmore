<template>
  <p
    class="group"
    :class="{ 'cursor-pointer': isTruncatable }"
    @click="toggle"
  >{{ visibleText }}<span
      v-if="isTruncated"
      class="font-bold text-primary-500 group-hover:text-primary-400"
      v-html="mask"
    /></p>
</template>

<script>
export default {
  name: 'ReadMore',

  props: {
    text: {
      type: String,
      default: '',
    },
    characters: {
      type: Number,
      default: 20,
    },
    mask: {
      type: String,
      default: ' ...',
    },
  },

  data: () => ({
    expanded: false,
  }),

  watch: {
    // Collapse again if the underlying text changes (e.g. a reused row).
    text() {
      this.expanded = false
    },
  },

  computed: {
    isTruncatable() {
      return (this.text || '').length > this.characters
    },

    isTruncated() {
      return this.isTruncatable && !this.expanded
    },

    visibleText() {
      return this.isTruncated
        ? this.text.substring(0, this.characters)
        : this.text
    },
  },

  methods: {
    toggle() {
      if (this.isTruncatable) {
        this.expanded = !this.expanded
      }
    },
  },
}
</script>
