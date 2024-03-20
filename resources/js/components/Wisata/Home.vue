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
    <div class="container">
      
      <section class="jumbotron text-center">
        <div class="container">
          <!-- <h1 class="jumbotron-heading">Selamat Datang</h1>
        <p class="lead text-muted">Temukan tempat wisata di Sumenep yang ingin kamu kunjungi</p> -->
        <h1 class="display-4" style="color: #0077b6;">Selamat Datang</h1>
        <h5 style="color: #233d4d;">Temukan tempat wisata di Sumenep yang ingin kamu kunjungi</h5>
          <p>
            <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
              <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
          </p>
        </div>
      </section>
  
      <!-- <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Selamat Datang!</h1>
        <p>Temukan tempat wisata di Sumenep yang ingin kamu kunjungi</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div> -->
  
      <div class="album py-5 bg-light">
        <div class="container">
  
          <div class="row" >
            <div class="col-md-4 d-flex align-items-stretch"  v-for="item in destinasi" :key="item.message">
              <div class="mb-4 box-shadow ">
              <div class="card h-100">
                <!-- <img class="card-img-top" src="images/giliyang.jpg" alt="Card image cap"> -->
                <!-- <img class="card-img-top" src="{{asset('images/giliyang.jpg')}}"> -->
                <!-- <img class="card-img-top" src="https://student-activity.binus.ac.id/himpar/wp-content/uploads/sites/106/2021/03/wisata-sehat-ke-giliyang-sumenep-pulau-berkualitas-oksigen-terbaik-dunia-lbx.jpg" width="150" height="200"> -->
                <img class="card-img-top" :src="'/storage/images/' + item.images"  />
                <div class="card-body h-100">
                  <h3>{{ item.nama_destinasi }}</h3>
                  <p class="card-text">{{ item.deskripsi }}</p>
                  <div class="d-flex justify-content-between align-destinasi-center">
                    <div class="btn-group">
                      <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                      <!-- <i class="fa-regular fa-thumbs-up"></i> -->
                      <x-icons.plus-sm />
                    </div>
                    <!-- <small class="text-muted">9 mins</small> -->
                  </div>
                </div>
              </div>
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
  
  export default {
    // components: { HeaderComponent },
    data() {
      return {
        destinasi: [],
      };
    },
    methods: {
      async fetchData() {
        const response = await axios.get("/api/wisata");
        this.destinasi = response.data.data;
      },
    },
    created() {
      // Panggil method fetchData saat pertama kali dijalankan
      this.fetchData();
    },
  };
  </script>