<template>
  <div>
    <Product :title="'Featured'" :currency="'Ksh'" :products="products" />
    <Cards
      :products="products"
      :currency="'Ksh'"
      v-if="show"
      :title="'Featured'"
    />
  </div>
</template>

<script>
import Product from "../Product.vue";
import Cards from "./Cards.vue";
export default {
  components: { Cards, Product },
  props: ["currency", "products"],
  data() {
    return {
      show: false,
      more: {
        link: "/featured",
      },
      // featured: [
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