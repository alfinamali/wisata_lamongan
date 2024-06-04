<template>
    <div class="wrapper">
      <!-- Komponen navbar dan sidebar -->
      <navbar-component />
    <sidebar-component />
      <div class="content-wrapper">
        <div class="content-header">
          <!-- Bagian header konten -->
        </div>
        <div class="content">
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                  <div class="card-body">
                    <h4>UPDATE UMKM</h4>
                    <hr />
  
                    <form @submit.prevent="updateUmkm" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="images" class="form-label">Gambar</label>
                        <input
                          type="file"
                          class="form-control"
                          id="images"
                          name="images"
                          placeholder="input image"
                          ref="myImage"
                          @change="previewFiles"
                        />
                        <div class="col-sm-6 customPadding">
                          <p>{{ fileName }}</p>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="nama_destinasi" class="form-label">Nama Destinasi</label>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="items.nama_destinasi" />
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">DESKRIPSI</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="items.deskripsi"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="items.kontak" />
                      </div>
                      <div class="mb-3">
                        <label for="maps" class="form-label">Maps</label>
                        <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="items.maps" />
                      </div>
  
                      <button type="submit" class="btn btn-md btn-primary">Save</button>
                      <router-link to="data-wisata" type="submit" class="btn btn-md btn-warning">Back</router-link>
                    </form>
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
  import axios from "axios";
  import Swal from "sweetalert2";
  
  export default {
    data() {
      return {
        items: {
          nama_destinasi: "",
          images: null,
          deskripsi: "",
          kontak: "",
          maps: ""
        },
        fileName: "",
        itemID: null
      };
    },
    methods: {
      async fetchData() {
        this.itemID = this.$route.params.id;
        const response = await axios.get(`/api/wisata/${this.itemID}`);
        this.items = response.data.data;
      },
      updateWisata() {
        let formData = new FormData();
        formData.append("nama_destinasi", this.items.nama_destinasi);
        formData.append("images", this.items.images);
        formData.append("deskripsi", this.items.deskripsi);
        formData.append("kontak", this.items.kontak);
        formData.append("maps", this.items.maps);
  
        axios
          .post(`/api/umkm/${this.itemID}`, formData)
          .then(response => {
            console.log(response);
            this.showAlert();
          })
          .catch(error => {
            console.error(error);
          });
      },
      previewFiles() {
        const file = this.$refs.myImage.files[0];
        this.fileName = file.name;
        this.items.images = file;
  
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = e => {
          this.items.images = e.target.result;
        };
      },
      showAlert() {
        Swal.fire({
          title: "Data Berhasil di update!",
          icon: "success",
          confirmButtonText: "OK"
        }).then(() => {
          // Redirect to the previous page
          this.$router.go(-1);
        });
      }
    },
    created() {
      this.fetchData();
    }
  };
  </script>
  
  <style scoped>
  .customPadding {
    padding-top: 35px;
  }
  </style>
  