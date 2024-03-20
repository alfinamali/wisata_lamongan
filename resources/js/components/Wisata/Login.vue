<template>
    <body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>LOGIN PAGE</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">LOGIN TO YOUR ACCOUNT</p>

      <form @submit.prevent="login" method="post">
        <div class="input-group mb-3">
          <input v-model="email" type="email" id="email" required class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input v-model="password" type="password" id="password" required class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p v-if="error" class="error">{{ error }}</p>

      

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</body>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
      error: ''
    };
  },
  methods: {
    login() {
      axios.post('/api/login', {
        email: this.email,
        password: this.password
      })
      .then(response => {
        const token = response.data.token;
        // Simpan token ke local storage atau state Vuex
        localStorage.setItem('token', token);
        // Redirect ke halaman setelah login
        this.$router.push('/home');
      })
      .catch(error => {
        this.error = error.response.data.error;
      });
    }
  }
}
</script>

<style>
.error {
  color: red;
}
</style>