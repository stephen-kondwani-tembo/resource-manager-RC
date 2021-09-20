<template>
  <div>
    <Navbar />

    <div class="p-20">
      <div v-for="snippet in snippets" :key="snippet.id">
        <span class="block text-2xl font-bold p-5 text-gray-700">{{
          snippet.title
        }}</span>
        <p class="text-gray-700 p-2">{{ snippet.description }}</p>
        <div v-cloak>
          <div class="p-5 shadow-md rounded-md">
            <div class="row">
              <div class="col-sm-12">
                <div class="snippet-code">
                  <span class="text-gray-600">//code snippet</span>
                  <span
                    class="
                      leading-4
                      text-m
                      font-extrabold
                      flex
                      justify-between
                      items-center
                      text-gray-600
                      p-2
                    "
                  >
                    <pre>{{ snippet.snippet }}</pre>
                    <span>
                      <img
                        title="click to copy snippet"
                        @click.stop.prevent="copySnippetCode"
                        src="https://img.icons8.com/material-rounded/24/000000/copy.png"
                      />
                    </span>
                  </span>

                  <input
                    type="hidden"
                    id="snippet-code"
                    :value="snippet.snippet"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
import Navbar from "./Navbar.vue";

export default {
  name: "Snippets",
  components: {
    Navbar,
  },
  props: {
    snippets: Array,
  },
  data() {
    return {};
  },

  methods: {
    copySnippetCode() {
      let snippetCodeToCopy = document.querySelector("#snippet-code");
      snippetCodeToCopy.setAttribute("type", "text");
      snippetCodeToCopy.select();

      try {
        var successful = document.execCommand("copy");
        var msg = successful ? "successful" : "unsuccessful";

        Swal.fire({
          toast: true,
          icon: "success",
          title: `code snippet copy ${msg}`,
          position: "top-right",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });
      } catch (err) {
        alert("Oops, unable to copy");
      }

      /* unselect the range */
      snippetCodeToCopy.setAttribute("type", "hidden");
      window.getSelection().removeAllRanges();
    },
  },
};
</script>

<style lang="css" scoped>
</style>