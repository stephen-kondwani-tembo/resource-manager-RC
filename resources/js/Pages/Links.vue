<template>
  <div>
    <Navbar />

    <div class="p-10">
      <div class="flex justify-center">
        <div class="w-full max-w-3xl">
          <p class="text-2xl mt-8 mb-6">Links</p>

          <ul>
            <li v-for="(link, index) in links" :key="link.id">
              <span>{{ ++index }}. </span>
              <a
                class="cursor-pointer text-blue-400"
                :href="link.link"
                v-bind:target="
                  (link.open_in_new_tab && '_blank') ||
                  (!link.open_in_new_ta && '_self')
                "
                >{{ link.link }}</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
export default {
  name: "Links",
  components: {
    Navbar,
  },
  props: {
    links: Array,
  },
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
</style>