<template>
  <v-row>
    <v-col cols="12">
      <Cards
        :products="products"
        :currency="'Ksh'"
        :title="'You may also like'"
        v-if="show"
      />

      <Product
        :title="'You may also like'"
        :currency="'Ksh'"
        :products="products"
      />
    </v-col>
  </v-row>
</template>

<script>
import Product from "../Product.vue";
import Cards from "./Cards.vue";
export default {
  components: { Product, Cards },
  props: ["currency", "products"],
  data() {
    return {
      show: false,
      more: {
        link: "/featured",
      },
      // Like: [
      //   {
      //     title: "this is a test product which is featured",
      //     pricenow: 38889,
      //     offprice: 38398,
      //   },
      //   {
      //     title: "this is a test product which is featured",
      //     pricenow: 200,
      //     offprice: 500,
      //   },
      //   {
      //     title: "this is a test product which is featured",
      //     pricenow: 200,
      //     offprice: 500,
      //   },
      //   {
      //     title: "this is a test product which is featured",
      //     pricenow: 200,
      //     offprice: 500,
      //   },
      //   {
      //     title: "this is a test product which is featured",
      //     pricenow: 200,
      //     offprice: 500,
      //   },
      //   {
      //     title: "this is a test product which is featured",
      //     pricenow: 200,
      //     offprice: 500,
      //   },
      // ],
    };
  },
};
</script>

<style>
</style>