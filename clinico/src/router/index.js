import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Reserv from '../views/Reserv.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import About from '../views/About.vue'
import Logout from '../views/Logout.vue'
import Myreserv from '../views/Myreserv.vue'
import Edit from '../views/Edit.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    component: About


  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  
  },
  {
    path: '/register',
    name: 'Register',
    component: Register
 
  },
  {
    path: '/reserv',
    name: 'Reserv',
    component: Reserv
 
  },
  {
    path: '/logout',
    name: 'Logout',
    component: Logout
  
  },
  {
    path: '/Myreserv',
    name: 'Myreserv',
    component: Myreserv
  
  },
  {
    path: '/Edit',
    name: 'Edit',
    component: Edit
  
  }

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
