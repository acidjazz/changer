<template>
  <div class="container p-2 lg:p-8 flex flex-col max-w-xl">
    <div class="my-8 flex flex-col lg:flex-row items-center justify-between">
      <CurrencyInput v-model="price" label="Price" class="mb-4" />
      <CurrencyInput v-model="wallet" label="Wallet" class="mb-4" />
    </div>
    <div class="flex items-center justify-center lg:justify-end mb-4">
      <PushButton theme="indigo" @click.native="change">
        Get Change
      </PushButton>
    </div>
    <div class="flex items-center justify-center mt-4">
      <div v-if="result !== false" class="flex flex-col bg-white p-8 border rounded shadow-sm">
        <div
          v-for="(bill) in result.change"
          :key="bill.name"
          class="flex items-center my-1"
        >
          <div v-if="bill.name[0] !== '.'" class="flex">
            <IconMoneyBill
              v-for="n in bill.amount"
              :key="n"
              class="w-6 h-6"
              :class="{'-ml-2': n !== 1}"
              primary="text-green-400"
              secondary="text-green-500"
            />
          </div>
          <div v-else-if="bill.name !== '.1'" class="flex">
            <IconMoneyCoin
              v-for="n in bill.amount"
              :key="n"
              class="w-6 h-6"
              :class="{'-ml-2': n !== 1}"
            />
          </div>
          <div v-else class="flex">
            <IconMoneyCoin
              v-for="n in bill.amount"
              :key="n"
              class="w-6 h-6"
              :class="{'-ml-2': n !== 1}"
              primary="text-orange-800"
              secondary="text-orange-900"
            />
          </div>
          <div class="mx-2 text-sm text-gray-400">
            {{ bill.amount }}x
          </div>
          <div v-if="is_bill(bill)">
            ${{ bill.name }}
          </div>
          <div v-else>
            {{ bill.name.replace(/./, '') }}c
          </div>
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
    is_bill (bill) { return !bill.name.includes('.') },
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
