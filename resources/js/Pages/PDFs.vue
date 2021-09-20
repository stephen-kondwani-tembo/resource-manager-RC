<template>
  <div>
    <Navbar />

    <div class="p-10">
      <div class="flex justify-center">
        <div class="w-full max-w-3xl">
          <p class="text-2xl mt-8 mb-6">PDFs</p>

          <ul>
            <li v-for="(pdf, index) in pdfs" :key="pdf.id">
              {{ ++index }}. {{ pdf.title }}
              <a
                class="text-blue-400 cursor-pointer"
                @click="download(pdf.file_url, pdf.title)"
                >download</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Navbar from "./Navbar.vue";

export default {
  name: "PDFs",
  components: {
    Navbar,
  },
  props: {
    pdfs: Array,
  },
  data() {
    return {};
  },

  methods: {
    download(file, filename) {
      axios({
        url: "http://localhost:8000/download",
        method: "GET",
        headers: { "Content-Type": "application/pdf" },
        params: { pdfFile: file },
        responseType: "blob",
      }).then((response) => {
        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
        var fileLink = document.createElement("a");

        fileLink.href = fileURL;
        fileLink.setAttribute("download", `${filename}.pdf`);
        document.body.appendChild(fileLink);

        fileLink.click();
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>