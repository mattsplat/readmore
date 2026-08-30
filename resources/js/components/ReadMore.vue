<template>
  <p class="readmore whitespace-pre-line">
    <span>{{ visibleText }}</span><button
      v-if="isTruncatable"
      type="button"
      class="readmore__toggle ml-1 cursor-pointer align-baseline font-bold text-primary-500 hover:underline focus:outline-none focus-visible:rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-500"
      :aria-expanded="expanded ? 'true' : 'false'"
      :aria-label="expanded ? lessLabel : moreLabel"
      @click="toggle"
    ><span
        v-if="!expanded"
        v-html="mask"
      /><span v-else>{{ lessLabel }}</span></button>
  </p>
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
      default: '...',
    },
    lessLabel: {
      type: String,
      default: 'Show less',
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

    moreLabel() {
      return 'Show more'
    },

    visibleText() {
      if (!this.isTruncated) {
        return this.text
      }

      const slice = this.text.slice(0, this.characters)
      const lastSpace = slice.lastIndexOf(' ')

      // Prefer a word boundary, but fall back to a hard cut for a single
      // very long word so something is always shown.
      const cut = lastSpace > 0 ? slice.slice(0, lastSpace) : slice

      return cut.replace(/\s+$/, '')
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
