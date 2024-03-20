<template>

    <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 rounded shadow">
                        <div class="card-body">
                            <h4>DATA POST</h4>
                            <table class="table table-striped table-bordered mt-4">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nama Destinasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in destinasis" :key="item.message">
                                        <td>{{ item.jenis_destinasi }}</td>
                                    </tr>
                                </tbody>
                            </table>
    
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
                destinasis: [],
            };
        },
        methods:{
            async fetchData() {
            const response = await axios.get("/api/destinasi");
            this.destinasis = response.data.data;
        },
            
        },
        created(){
            this.fetchData();
        }
    }
    </script>