<template>
  <div>
    <Navbar />

    <div class="p-10">
      <div v-if="showTable">
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
          >add snippet</a
        >

        <div class="w-full max-w-6xl mt-5">
          <div class="grid grid-cols-6 gap-4 shadow-lg p-5">
            <template v-for="(snippet, index) in snippets" :key="snippet.id">
              <div>{{ ++index }}. {{ snippet.title }}</div>
              <div class="col-span-2">{{ snippet.description }}</div>
              <div class="col-span-2">{{ snippet.snippet }}</div>
              <div class="flex items-center">
                <Link :href="`/editSnippet/${snippet.id}`">
                  <img
                    src="https://img.icons8.com/ios/20/000000/edit--v1.png"
                  />
                </Link>
                <img
                  @click="deleteSnippet(snippet.id)"
                  src="https://img.icons8.com/material-rounded/24/000000/delete-forever.png"
                />
              </div>
            </template>
          </div>
        </div>
      </div>

      <div v-else>
        <AddSnippet
          @toogleFormShowEvent="toogleFormShow($event)"
          @toogleFormHideEvent="toogleFormHide($event)"
        />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Navbar from "./Navbar.vue";
import AddSnippet from "./AddSnippet.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  name: "SnippetManager",
  components: {
    Navbar,
    Link,
    AddSnippet,
  },
  data() {
    return {
      snippets: Array,
      snippet_id: "",
      showTable: true,
    };
  },

  methods: {
    deleteSnippet(id) {
      this.snippet_id = id;

      axios
        .delete(`/snippet/${id}`)
        .then((response) => {
          this.filterList();
        })
        .catch((err) => {
          console.log(err);
        });
    },

    filterList() {
      this.snippets = this.snippets.filter((snippet) => {
        return snippet.id !== this.snippet_id;
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
      axios.get("/snippets").then((response) => {
        this.snippets = response.data;
      });
    },
  },
  created() {
    axios.get("/snippets").then((response) => {
      this.snippets = response.data;
    });
  },
};
</script>

<style lang="scss" scoped>
</style>