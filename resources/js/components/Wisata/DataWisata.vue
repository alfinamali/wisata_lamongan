<template>
    <div class="wrapper">
      <navbar-component />
      <sidebar-component />
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid"></div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                  <div class="card-body">
                    <h4>DATA POST</h4>
                    <hr>
                    <div class="d-flex justify-content-end">
                      <router-link to="create-wisata" class="btn btn-md btn-success">TAMBAH WISATA</router-link>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered mt-4">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">GAMBAR</th>
                            <th scope="col">NAMA DESTINASI</th>
                            <th scope="col">KATEGORI</th>
                            <th scope="col">DESKRIPSI</th>
                            <th scope="col">LOKASI</th>
                            <th scope="col">HARGA</th>
                            <th scope="col">FASILITAS</th>
                            <th scope="col">MAPS</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="item in items" :key="item.message">
                            <td>
                              <img :src="'/storage/images/' + item.images" class="rounded" style="width: 120px" />
                            </td>
                            <td>{{ item.nama_destinasi }}</td>
                            <td>{{ item.destinasi_id }}</td>
                            <td>{{ item.deskripsi }}</td>
                            <td>{{ item.lokasi }}</td>
                            <td>{{ item.harga }}</td>
                            <td>{{ item.fasilitas }}</td>
                            <td>{{ item.maps }}</td>
                            <td>
                              <router-link :to="'/update-wisata/' + item.id" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></router-link>
                              <button class="btn btn-sm btn-danger mr-1" @click="hapusdata(item.id)"><i class="fas fa-trash-alt"></i></button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
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
    // components: { HeaderComponent },
    data() {
      return {
        destinasis: {},
        items: [],
      };
    },
    methods: {
      async fetch() {
        const response = await axios.get("/api/destinasi");
        this.destinasis = response.data.data;
      },
  
      async fetchData() {
        const response = await axios.get("/api/wisata");
        this.items = response.data.data;
      },
  
      async hapusdata(id) {
        const result = await Swal.fire({
          title: "Delete Confirmation",
          text: "Are you sure you want to delete this data?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Delete",
        });
  
        if (result.isConfirmed) {
          await axios.delete(`/api/wisata/${id}`);
          this.fetchData();
  
          Swal.fire("Deleted!", "The data has been deleted.", "success");
        }
      },
    },
    created() {
      this.fetch();
  
      this.fetchData();
    },
  };
  </script>
  