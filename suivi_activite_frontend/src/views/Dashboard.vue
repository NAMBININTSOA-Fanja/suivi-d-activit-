<template>
  <div>
    <h1>Bienvenue sur le tableau de bord</h1>
    
    <Logout />
  </div>
</template>

<script setup>
import Logout from './Logout.vue'
import {onMountend} from 'vue'

onMounted(async () => {
  const response = await fetch('http://localhost:8000/user', {
    credentials: 'include'
  });

  const data = await response.json();
  console.log(data); 
})

</script>
