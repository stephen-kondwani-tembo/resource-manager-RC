<template>
  <div>
    <Navbar />

    <div class="p-10">
      <template v-if="showTable">
        <p class="text-xl text-gray-700 mt-8 mb-8">PDF Resources</p>

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
          >add pdf</a
        >

        <table class="table mt-2 mb-6 border shadow-sm bg-white">
          <thead>
            <tr></tr>
          </thead>
          <tbody>
            <tr v-for="(pdf, index) in pdfs" :key="pdf.id">
              <td class="p-2">{{ ++index }}.</td>
              <td class="p-2">
                <p>{{ pdf.title }}</p>
              </td>
              <td class="p-2">
                <Link :href="`/edit/${pdf.id}`">
                  <img
                    src="https://img.icons8.com/ios/20/000000/edit--v1.png"
                  />
                </Link>
              </td>
              <td class="p-2">
                <div>
                  <img
                    @click="deletePDF(pdf.id)"
                    src="https://img.icons8.com/material-rounded/24/000000/delete-forever.png"
                  />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </template>

      <template v-else>
        <AddPDF
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
import AddPDF from "./AddPDF.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  name: "PDFManager",

  components: {
    Navbar,
    AddPDF,
    Link,
  },

  data() {
    return {
      pdfs: null,
      pdf_id: "",
      showTable: true,
    };
  },

  methods: {
    deletePDF(id) {
      this.pdf_id = id;

      axios
        .delete(`/pdf/${id}`)
        .then((response) => {
          this.filterList();
        })
        .catch((err) => {
          console.log(err);
        });
    },

    filterList() {
      this.pdfs = this.pdfs.filter((pdf) => {
        return pdf.id !== this.pdf_id;
      });
    },

    toogleFormShow() {
      this.getPdfs();
      this.showTable = true;
    },

    toogleFormHide() {
      this.showTable = !this.showTable;
    },

    getPdfs() {
      axios.get("/pdf").then((response) => {
        this.pdfs = response.data;
      });
    },
  },

  created() {
    axios.get("/pdf").then((response) => {
      this.pdfs = response.data;
    });
  },
};
</script>

<style lang="css" scoped>
</style>