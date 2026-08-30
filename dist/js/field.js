/**
 * mattsplat/readmore — compiled field bundle.
 *
 * This file is authored directly against Nova's global (runtime) `Vue` build so
 * the package works immediately after `composer require`, with no build step.
 * When you change anything under `resources/js`, regenerate this file with:
 *
 *     npm run nova:install
 *     npm run prod
 *
 * Keep the behaviour here in sync with the `.vue` source components.
 */
(function () {
  'use strict'

  var h = Vue.h

  function hasValue(field) {
    return (
      field.value !== null &&
      field.value !== undefined &&
      field.value !== ''
    )
  }

  var ReadMore = {
    name: 'ReadMore',

    props: {
      text: { type: String, default: '' },
      characters: { type: Number, default: 20 },
      mask: { type: String, default: ' ...' },
    },

    data: function () {
      return { expanded: false }
    },

    watch: {
      text: function () {
        this.expanded = false
      },
    },

    computed: {
      isTruncatable: function () {
        return (this.text || '').length > this.characters
      },
      isTruncated: function () {
        return this.isTruncatable && !this.expanded
      },
      visibleText: function () {
        return this.isTruncated
          ? this.text.substring(0, this.characters)
          : this.text
      },
    },

    methods: {
      toggle: function () {
        if (this.isTruncatable) {
          this.expanded = !this.expanded
        }
      },
    },

    render: function () {
      var children = [this.visibleText]

      if (this.isTruncated) {
        children.push(
          h('span', {
            class: 'font-bold text-primary-500 group-hover:text-primary-400',
            innerHTML: this.mask,
          })
        )
      }

      return h(
        'p',
        {
          class: ['group', { 'cursor-pointer': this.isTruncatable }],
          onClick: this.toggle,
        },
        children
      )
    },
  }

  function renderValue(field) {
    return hasValue(field)
      ? h(ReadMore, {
          text: String(field.value),
          characters: field.characters,
          mask: field.mask,
        })
      : h('span', '—')
  }

  var IndexField = {
    name: 'IndexReadMore',
    props: ['resourceName', 'field'],
    render: function () {
      return renderValue(this.field)
    },
  }

  var DetailField = {
    name: 'DetailReadMore',
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
    render: function () {
      var field = this.field

      return h(
        Vue.resolveComponent('PanelItem'),
        { index: this.index, field: field },
        { value: function () { return renderValue(field) } }
      )
    },
  }

  var FormField = {
    name: 'FormReadMore',
    props: ['resourceName', 'resourceId', 'field', 'errors', 'showHelpText'],

    data: function () {
      return { value: this.field.value == null ? '' : this.field.value }
    },

    methods: {
      fill: function (formData) {
        formData.append(
          this.field.attribute,
          this.value == null ? '' : this.value
        )
      },
    },

    render: function () {
      var self = this

      return h(
        Vue.resolveComponent('DefaultField'),
        {
          field: this.field,
          errors: this.errors,
          showHelpText: this.showHelpText,
        },
        {
          field: function () {
            return h('textarea', {
              id: self.field.attribute,
              dusk: self.field.attribute,
              rows: self.field.rows || 5,
              disabled: self.field.readonly,
              placeholder: self.field.placeholder || self.field.name,
              value: self.value,
              class:
                'w-full form-control form-input form-input-bordered py-3 h-auto',
              onInput: function (event) {
                self.value = event.target.value
              },
            })
          },
        }
      )
    },
  }

  Nova.booting(function (app, store) {
    app.component('index-read-more', IndexField)
    app.component('detail-read-more', DetailField)
    app.component('form-read-more', FormField)
  })
})()
