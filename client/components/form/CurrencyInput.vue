<template>
  <div id="CurrencyInput">
    <label :for="label" class="block text-sm font-medium leading-5 text-gray-700">{{ label }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm sm:leading-5">$</span>
      </div>
      <input
        :id="label"
        v-model="local"
        class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5"
        placeholder="0.00"
        aria-describedby="price-currency"
        v-bind="props"
      >
      <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <span id="price-currency" class="text-gray-500 sm:text-sm sm:leading-5">USD</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: [String, Number, null],
      required: true,
    },
    label: {
      type: String,
      required: true,
    },
  },
  computed: {
    props () {
      return {
        ref: 'input',
      }
    },
    local: {
      get () {
        return this.value
      },
      set (value) {
        this.$emit('input', value)
      },
    },
  },
  methods: {
    update (value) {
      this.$emit('input', value)
    },
  },
}
</script>
