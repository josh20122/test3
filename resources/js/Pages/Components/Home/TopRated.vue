<template>
  <div>
    <Cards
      :products="products"
      :currency="currency"
      :title="'Top Rated'"
      :more="'/fearuesgs'"
      v-if="show"
    />

    <Product :title="'Top Rated'" :currency="'Ksh'" :products="products" />
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
    };
  },
};
</script>

<style>
</style>