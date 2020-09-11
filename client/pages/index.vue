<template>
  <div class="container p-2 lg:p-8 flex flex-col max-w-xl">
    <div class="my-8 flex flex-col lg:flex-row items-center justify-between">
      <CurrencyInput v-model="price" label="Price" class="mb-4" />
      <CurrencyInput v-model="wallet" label="Wallet" class="mb-4" />
    </div>
    <div class="flex items-center justify-end">
      <PushButton theme="indigo" @click.native="change">
        Get Change
      </PushButton>
    </div>
    <div v-if="result !== false" class="flex flex-col items-center">
      <div
        v-for="(amount, bill) in result.change"
        :key="bill"
        class="flex w-36 justify-start items-center"
      >
        <div v-if="bill[0] !== '.'" class="flex">
          <IconMoneyBill
            v-for="n in amount"
            :key="n"
            class="w-6 h-6"
            :class="{'-ml-2': n !== 1}"
            primary="text-green-400"
            secondary="text-green-500"
          />
        </div>
        <div v-else-if="bill !== '.1'" class="flex">
          <IconMoneyCoin
            v-for="n in amount"
            :key="n"
            class="w-6 h-6"
            :class="{'-ml-2': n !== 1}"
          />
        </div>
        <div v-else class="flex">
          <IconMoneyCoin
            v-for="n in amount"
            :key="n"
            class="w-6 h-6"
            :class="{'-ml-2': n !== 1}"
            primary="text-orange-800"
            secondary="text-orange-900"
          />
        </div>
        <div class="mx-2 text-sm text-gray-400">
          {{ amount }}x
        </div>
        <div v-if="is_bill(bill)">
          ${{ bill }}
        </div>
        <div v-else>
          {{ bill.replace(/./, '') }}c
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      price: '',
      wallet: '',
      result: false,
    }
  },
  methods: {
    parse (string) {
      return parseInt(string.replace(/\./, ''))
    },
    is_bill (value) { return !value.includes('.') },
    async change () {
      const price = this.parse(this.price)
      const wallet = this.parse(this.wallet)
      try {
        this.result = (await this.$axios.get('/change', { params: { price, wallet } })).data.data
      } catch (e) {}
    },
  },
}
</script>
