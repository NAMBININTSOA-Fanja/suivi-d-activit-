<template>
  <button @click="logout" class="logout-button">
    Se déconnecter
  </button>
</template>

<script setup>
import axios from 'axios'

const logout = async () => {
  try {
    await axios.post('/api/logout')
    alert('Déconnexion.')
    window.location.href = '/login' 
  } catch (err) {
    alert('Erreur lors de la déconnexion.')
    console.error(err)
  }
}
</script>

<style scoped>
.logout-button {
  padding: 8px 16px;
  background-color: #f44336;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>
