<template>
    <div class="wrapper" >
    <navbar-component />
  <sidebar-component />
  <div class="content-wrapper" >
      <!-- Content Header (Page header) -->
      <div class="content-header">
                <div class="container-fluid">
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
    <div class="content">
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>TAMBAH DATA UMKM</h4>
                        <hr>

                        <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="images" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="images" ref="myImage" @change="previewFiles" />
                            </div>
                            <div class="mb-3">
                                <label for="nama_destinasi" class="form-label">Nama UMKM</label>
                                <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.nama_destinasi" />
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">DESKRIPSI</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="form.deskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="form.lokasi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.kontak" />
                            </div>
                            <div class="mb-3">
                                <label for="maps" class="form-label">Maps</label>
                                <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.maps" />
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <router-link to="data-umkm" class="btn btn-md btn-warning">Back</router-link>
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
import swal from 'sweetalert2';


export default {
    data() {
        return {
            umkms: {},
        form: {
            nama_destinasi: "",
            images: null,
            deskripsi: "",
            lokasi: "",
            kontak: "",
            maps: "",
        },
        };
    },
    methods: {
        handleSubmit() {
        let formData = new FormData();
        formData.append("nama_destinasi", this.form.nama_destinasi);
        formData.append("images", this.form.images);
        formData.append("deskripsi", this.form.deskripsi);
        formData.append("lokasi", this.form.lokasi);
        formData.append("kontak", this.form.kontak);
        formData.append("maps", this.form.maps);

        axios
            .post("/api/umkm", formData)
            .then((response) => {
            console.log(response);
            // reset form
            swal.fire('Success', 'Form submitted successfully', 'success');

            this.form.nama_destinasi = "";
            this.form.images = null;
            this.form.deskripsi = "";
            this.form.lokasi = "";
            this.form.kontak = "";
            this.form.maps = "";
            // Reset input file
            this.$refs.myImage.value = null;

            // Redirect to previous page
            this.$router.go(-1);
        })
                .catch((error) => {
            console.error(error);
            // Show SweetAlert error message
            swal.fire("Error", "Form submission failed", "error");
            });
        
        },
        previewFiles() {
        this.form.images = this.$refs.myImage.files[0];
        },
    },
    created(){
        this.fetchData();
    }
    };
</script>
