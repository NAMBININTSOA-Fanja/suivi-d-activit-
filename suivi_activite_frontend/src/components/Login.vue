<template>
  <form @submit.prevent="login" >
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
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const email = ref('')
const password = ref('')
const error = ref(null)

const login = async () => {
  error.value = null
  try {
    await axios.get('/sanctum/csrf-cookie') 
    await axios.post('/api/login', {
      email: email.value,
      password: password.value
    })
    alert('Vous êtes connecté !')
    
  } catch (err) {
    error.value = 'Email ou mot de passe incorrect'
  }
}
</script>
