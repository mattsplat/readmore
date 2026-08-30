<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
  >
    <template #field>
      <textarea
        :id="field.attribute"
        v-model="value"
        :rows="field.rows || 5"
        :dusk="field.attribute"
        :disabled="field.readonly"
        :placeholder="field.placeholder || field.name"
        class="w-full form-control form-input form-input-bordered py-3 h-auto"
        :class="errorClasses"
      />
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  methods: {
    setInitialValue() {
      this.value = this.field.value ?? ''
    },

    fill(formData) {
      formData.append(this.field.attribute, this.value ?? '')
    },
  },
}
</script>
