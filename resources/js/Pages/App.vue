<template>
  <div>
    <Navbar />

    <div class="p-10">
      <span><p class="text-center text-4xl text-gray-700">Resource Management</p></span>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
export default {
  name: "App",
  components: {
    Navbar,
  },
};
</script>

<style lang="scss" scoped>
</style>