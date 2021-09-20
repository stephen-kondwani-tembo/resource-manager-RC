<template>
  <div>
    <Navbar />

    <div class="p-10">
      <template v-if="showTable">
        <p class="text-xl text-gray-700 mt-8 mb-8">Link Resources</p>

        <a
          class="
            text-gray-50 text-sm
            font-bold
            bg-indigo-500
            hover:bg-indigo-700
            px-8
            py-1
            rounded-md
            cursor-pointer
          "
          @click="toogleFormHide"
          >add link</a
        >

        <table class="table mt-2 mb-6 border shadow-sm bg-white">
          <thead>
            <tr></tr>
          </thead>
          <tbody>
            <tr v-for="(link, index) in links" :key="link.id">
              <td class="p-2">{{ ++index }}.</td>
              <td class="p-2">
                <p>{{ link.title }}</p>
              </td>
              <td class="p-2">
                <a
                  class="cursor-pointer text-blue-400"
                  :href="link.link"
                  v-bind:target="
                    (link.open_in_new_tab && '_blank') ||
                    (!link.open_in_new_ta && '_self')
                  "
                  >{{ link.link }}</a
                >
              </td>
              <td class="p-2">
                <Link :href="`/editLink/${link.id}`">
                  <img
                    src="https://img.icons8.com/ios/20/000000/edit--v1.png"
                  />
                </Link>
              </td>
              <td class="p-2">
                <div>
                  <img
                    @click="deleteLink(link.id)"
                    src="https://img.icons8.com/material-rounded/24/000000/delete-forever.png"
                  />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </template>

      <template v-else>
        <AddLink
          @toogleFormShowEvent="toogleFormShow($event)"
          @toogleFormHideEvent="toogleFormHide($event)"
        />
      </template>
    </div>
  </div>
</template>


<script>
import axios from "axios";
import Navbar from "./Navbar.vue";
import AddLink from "./AddLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  name: "LinkManager",
  components: {
    Navbar,
    AddLink,
    Link,
  },

  data() {
    return {
      links: Array,
      link_id: "",
      showTable: true,
    };
  },

  methods: {
    deleteLink(id) {
      this.link_id = id;

      axios
        .delete(`/link/${id}`)
        .then((response) => {
          this.filterList();
        })
        .catch((err) => {
          console.log(err);
        });
    },

    filterList() {
      this.links = this.links.filter((link) => {
        return link.id !== this.link_id;
      });
    },

    toogleFormShow() {
      this.getLinks();
      this.showTable = true;
    },

    toogleFormHide() {
      this.showTable = !this.showTable;
    },

    getLinks() {
      axios.get("/links").then((response) => {
        this.links = response.data;
      });
    },
  },
  created() {
    axios.get("/links").then((response) => {
      this.links = response.data;
    });
  },
};
</script>

<style lang="scss" scoped>
</style>