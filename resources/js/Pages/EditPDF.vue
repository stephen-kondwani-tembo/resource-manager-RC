<template>
  <div>
    <Navbar />

    <div class="flex justify-center">
      <div class="w-full max-w-3xl">
        <form
          @submit.prevent="updatePDF"
          class="bg-white shadow-md rounded-md px-8 pt-6 pb-8 mb-4 my-10"
        >
          <div class="mb-4">
            <input
              class="
                rounded-lg
                border
                w-full
                py-2
                px-3
                text-grey-darker
                leading-tight
                focus:outline-none
                focus:border-indigo-400
              "
              required
              type="text"
              placeholder="title"
              v-model="formData.title"
            />
          </div>

          <div class="mb-4">
            <div
              class="flex items-center justify-between border rounded-lg p-1"
              v-if="url"
            >
              <embed
                :src="url"
                type="application/pdf"
                height="80px"
                width="200"
              />
              <img
                title="change pdf"
                @click="
                  url = null;
                  formData.pdf = '';
                "
                src="https://img.icons8.com/ios/25/000000/cancel.png"
              />
            </div>
            <div v-else>
              <label
                class="
                  custom-file-upload
                  flex
                  items-center
                  rounded-lg
                  border
                  py-1
                  px-3
                  text-gray-400
                "
              >
                <input
                  @change="onFileChange"
                  hidden
                  type="file"
                  accept="application/pdf"
                />
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  x="0px"
                  y="0px"
                  width="30"
                  height="30"
                  viewBox="0 0 172 172"
                  style="fill: #000000"
                >
                  <g
                    fill="none"
                    fill-rule="nonzero"
                    stroke="none"
                    stroke-width="1"
                    stroke-linecap="butt"
                    stroke-linejoin="miter"
                    stroke-miterlimit="10"
                    stroke-dasharray=""
                    stroke-dashoffset="0"
                    font-family="none"
                    font-weight="none"
                    font-size="none"
                    text-anchor="none"
                    style="mix-blend-mode: normal"
                  >
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#4338ca">
                      <path
                        d="M48.375,21.5c-8.84221,0 -16.125,7.28279 -16.125,16.125v48.375h10.75v-48.375c0,-3.02579 2.34921,-5.375 5.375,-5.375h48.375v32.25h32.25v21.5h10.75v-29.10059l-35.39941,-35.39941zM107.5,39.85059l13.89942,13.89941h-13.89942zM32.25,96.75v53.75h10.75v-21.5h5.375c8.84221,0 16.125,-7.28279 16.125,-16.125c0,-8.84221 -7.28279,-16.125 -16.125,-16.125zM75.25,96.75v53.75h16.125c8.84221,0 16.125,-7.28279 16.125,-16.125v-21.5c0,-8.84221 -7.28279,-16.125 -16.125,-16.125zM118.25,96.75v53.75h10.75v-21.5h10.75v-10.75h-10.75v-10.75h21.5v-10.75zM43,107.5h5.375c3.02579,0 5.375,2.34921 5.375,5.375c0,3.02579 -2.34921,5.375 -5.375,5.375h-5.375zM86,107.5h5.375c3.02579,0 5.375,2.34921 5.375,5.375v21.5c0,3.02579 -2.34921,5.375 -5.375,5.375h-5.375z"
                      ></path>
                    </g>
                  </g>
                </svg>
                {{ formData.pdf }}
              </label>
            </div>
          </div>

          <button
            class="
              mt-2
              py-2
              px-10
              rounded-md
              font-bold
              bg-gray-100
              shadow-md
              text-indigo-600
              flex
              items-center
              hover:bg-white
            "
            type="submit"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              x="0px"
              y="0px"
              width="30"
              height="30"
              viewBox="0 0 172 172"
              style="fill: #000000"
            >
              <g
                fill="none"
                fill-rule="nonzero"
                stroke="none"
                stroke-width="1"
                stroke-linecap="butt"
                stroke-linejoin="miter"
                stroke-miterlimit="10"
                stroke-dasharray=""
                stroke-dashoffset="0"
                font-family="none"
                font-weight="none"
                font-size="none"
                text-anchor="none"
                style="mix-blend-mode: normal"
              >
                <path d="M0,172v-172h172v172z" fill="none"></path>
                <g fill="#4f46e5">
                  <path
                    d="M86,27.95c-17.02155,0 -31.72533,11.76121 -35.56738,28.18936c-10.47695,1.34375 -19.04742,8.92754 -21.65537,19.14004c-15.98525,0.6966 -28.77725,13.91551 -28.77725,30.07061c0,16.598 13.502,30.1 30.1,30.1h47.3v-4.3h-47.3c-14.22655,0 -25.8,-11.57345 -25.8,-25.8c0,-14.22225 11.56804,-25.7958 25.84619,-25.7958h0.0084l2.1374,0.04619l0.0084,-0.05459c1.16606,-0.02734 2.09765,-0.97943 2.09961,-2.1458c-0.00148,-0.81629 -0.4651,-1.56133 -1.19678,-1.92324c2.55714,-8.49043 10.11616,-14.61914 19.14844,-15.20117l1.23877,-0.07978c0.05312,0.00337 0.10635,0.00478 0.15957,0.0042c1.18741,0 2.15,-0.96259 2.15,-2.15c-0.0007,-0.74999 -0.39218,-1.44542 -1.03301,-1.83506c3.70936,-14.01578 16.43347,-23.96494 31.13301,-23.96494c13.33,0 25.44609,8.40136 30.15459,20.90791l0.0168,0.04619c-0.04709,0.17815 -0.07108,0.36162 -0.07139,0.5459c0,1.18741 0.96259,2.15 2.15,2.15c1.01986,-0.00106 1.89864,-0.71847 2.10381,-1.71748c1.47359,-0.25831 2.93457,-0.43252 4.34619,-0.43252c14.22655,0 25.8,11.57345 25.8,25.8c0,2.14355 -0.29499,4.35298 -0.87764,6.57178l-0.5627,2.129l2.1416,0.50811c9.71155,2.3177 16.49873,10.90866 16.49873,20.89111c0,11.8551 -9.6449,21.5 -21.5,21.5h-47.3v4.3h47.3c14.22655,0 25.8,-11.57345 25.8,-25.8c0,-11.26385 -7.1979,-21.05189 -17.7501,-24.49404c0.3655,-1.88555 0.5501,-3.76341 0.5501,-5.60596c0,-16.598 -13.502,-30.1 -30.1,-30.1c-1.7028,0 -3.45028,0.16051 -5.21543,0.47871c-5.76415,-13.2182 -18.99357,-21.97871 -33.48457,-21.97871zM62.35,55.9c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM70.95,60.2c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM120.4,60.2c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM77.4,66.65c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM120.4,68.8c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM40.85,75.25c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM49.45,79.55c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM55.9,86c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM88.15,91.77813l-18.61094,18.61094l3.04023,3.04023l13.4207,-13.4207v54.79141h4.3v-54.79141l13.4207,13.4207l3.04023,-3.04023zM148.35,92.45c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM144.05,98.9c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM88.15,159.1c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15zM88.15,167.7c-1.18741,0 -2.15,0.96259 -2.15,2.15c0,1.18741 0.96259,2.15 2.15,2.15c1.18741,0 2.15,-0.96259 2.15,-2.15c0,-1.18741 -0.96259,-2.15 -2.15,-2.15z"
                  ></path>
                </g>
              </g>
            </svg>
            <span class="ml-4"> update</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
import Navbar from "./Navbar.vue";

export default {
  name: "EditPDF",
  components: {
    Navbar,
  },
  props: {
    item: Object,
  },
  data() {
    return {
      formData: {
        id: this.item.id,
        title: this.item.title,
        pdf: this.item.file_url,
      },
      url: null,
    };
  },

  methods: {
    updatePDF() {
      let dataArray = new FormData();
      dataArray.append("id", this.formData.id);
      dataArray.append("pdf", this.formData.pdf);
      dataArray.append("title", this.formData.title);
      dataArray.append("_method", "put");

      this.$inertia.post("/pdf", dataArray);
    },

    onFileChange(e) {
      var file = e.target.files[0];
      if (file["type"] === "application/pdf") {
        this.formData.pdf = file;
        this.url = URL.createObjectURL(file);
      } else {
        Swal.fire({
          toast: true,
          icon: "warning",
          title: "invalid file seleted",
          position: "top-right",
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          },
        });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>