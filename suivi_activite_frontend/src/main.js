import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import axios from 'axios'

createApp(App).mount('#app')
axios.defaults.baseURL='http://localhost:8080'
axios.defaults.withCredentials=true
