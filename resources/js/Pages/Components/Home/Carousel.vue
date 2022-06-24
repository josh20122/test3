<template>
  <v-carousel
    reverse-transition="fade-transition"
    class="ma-0 pa-0"
    :show-arrows="false"
    interval="4000"
    hide-delimiter-background
    hide-delimiters
    transition="fade-transition"
    cycle
    continuous
    height="auto"
  >
    <v-carousel-item v-for="item in items" :key="item.image">
      <v-img eager :src="item.image" class="rounded-md"></v-img>
    </v-carousel-item>
  </v-carousel>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { image: "/images/carousel1.png" },
        { image: "/images/carousel2.png" },
      ],
    };
  },
};
</script>

<style>
</style>