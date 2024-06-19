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
                        <h4>TAMBAH WISATA</h4>
                        <hr>

                        <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="images" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="images" ref="myImage" @change="previewFiles" />
                            </div>
                            <div class="mb-3">
                                <label for="nama_destinasi" class="form-label">Nama Destinasi</label>
                                <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.nama_destinasi" />
                            </div>
                            <div class="mb-3">
                                <label for="destinasi_id" class="form-label">Kategori</label>
                                <!-- <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.destinasi_id" /> -->
                                <select class="form-control select2" v-model="form.destinasi_id">
                                    <option value >Pilih Kategori</option>
                                    <option v-for="destinasi in destinasis" :key="destinasi.id" :value="destinasi.id"> {{ destinasi.jenis_destinasi }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">DESKRIPSI</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="form.deskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.lokasi" />
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Harga</label>
                                <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.harga" />
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Fasilitas</label>
                                <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" v-model="form.fasilitas"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Maps</label>
                                <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.maps" />
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <router-link to="data-wisata" class="btn btn-md btn-warning">Back</router-link>
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
            destinasis: {},
        form: {
            nama_destinasi: "",
            destinasi_id: "",
            images: null,
            deskripsi: "",
            lokasi: "",
            harga: "",
            fasilitas: "",
            maps: "",
        },
        };
    },
    methods: {
        handleSubmit() {
        let formData = new FormData();
        formData.append("nama_destinasi", this.form.nama_destinasi);
        formData.append("destinasi_id", this.form.destinasi_id);
        formData.append("images", this.form.images); 
        formData.append("deskripsi", this.form.deskripsi);
        formData.append("lokasi", this.form.lokasi);
        formData.append("harga", this.form.harga);
        formData.append("fasilitas", this.form.fasilitas);
        formData.append("maps", this.form.maps);

        axios
            .post("/api/wisata", formData)
            .then((response) => {
            console.log(response);
            swal.fire('Success', 'Form submitted successfully', 'success');

            this.form.nama_destinasi = "";
            this.form.destinasi_id = "";
            this.form.images = null;
            this.form.deskripsi = "";
            this.form.lokasi = "";
            this.form.harga = "";
            this.form.fasilitas = "";
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
        async fetchData() {
        const response = await axios.get("/api/destinasi");
        this.destinasis = response.data.data;
    },
    },
    created(){
        this.fetchData();
    }
    };
</script>