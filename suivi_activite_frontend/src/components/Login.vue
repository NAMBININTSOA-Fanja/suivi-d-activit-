<template>
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-4 shadow-sm">
          <h2 class="mb-4 text-center">AUTHENTIFICATION</h2>

          <div v-if="error" class="alert alert-danger">{{ error }}</div>

      <form  @submit.prevent="login">
        <div>
          <label for="email">Email:</label>
          <input v-model="email" type="email"  required>
        </div>

        <div>
          <label for="password">Mot de passe:</label>
          <input v-model="password" type="password" required>
        </div>

        <button type="submit">Se connecter</button>
        <p v-if="error" style="color:red">{{ error }}</p>
      </form>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: '',
        password: ''
      },
      error: ''
    }
  },
  methods: {
    async login() {
      try {
        await fetch('http://localhost:8000/sanctum/csrf-cookie', {
          credentials: 'include'
        });

        const response = await fetch('http://localhost:8000/login', {
          method: 'POST',
          credentials: 'include',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(this.form)
        });

        if (!response.ok) {
          const data = await response.json();
          this.error = data.message || 'Erreur de connexion.';
        } else {
          this.error = '';
          this.$router.push('/dashboard');
        }
      } catch (err) {
        this.error = 'Erreur réseau';
      }
    }
  }
}
</script>