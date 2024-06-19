<template>
    <section class="section" id="portfolio">
        <div class="container text-center">
            <h6 class="section-title mb-6">WISATA</h6>
            <!-- row -->
            <div class="row">
                <div class="col-md-4 d-flex align-items-stretch mb-4" v-for="item in destinasi" :key="item.message">
                    <a href="#" class="portfolio-card">
                        <img :src="'/storage/images/' + item.images"  class="portfolio-card-img" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                    <h5>{{ item.nama_destinasi }}</h5>
                                    <p class="font-weight-normal">Kategori:{{ item.destinasi_id }}</p>
                            </span>
                        </span>
                    </a>
                </div>
              </div><!-- end of row -->
              
        </div><!-- end of container -->
        <div class="container text-center">
            <h6 class="section-title mb-6">UMKM</h6>
            <!-- row -->
            <div class="row">
                <div class="col-md-4 d-flex align-items-stretch mb-4" v-for="item in umkm" :key="item.message">
                    <a href="#" class="portfolio-card">
                        <img :src="'/storage/images/' + item.images"  class="portfolio-card-img" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                    <h5>{{ item.nama_destinasi }}</h5>
                                    <p class="font-weight-normal">Kategori: UMKM</p>
                            </span>
                        </span>
                    </a>
                </div>
              </div><!-- end of row -->
              
        </div><!-- end of container -->
    </section>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    // components: { HeaderComponent },
    data() {
      return {
        destinasi: [],
        umkm: []
      };
    },
    methods: {
      async fetchData() {
        const response = await axios.get("/api/wisata");
        this.destinasi = response.data.data;
      },
      async fetchUmkm() {
        const response = await axios.get("/api/umkm");
        this.umkm = response.data.data;
      },
    },
    created() {
      // Panggil method fetchData saat pertama kali dijalankan
      this.fetchData();
      this.fetchUmkm();
    },
  };
  </script>