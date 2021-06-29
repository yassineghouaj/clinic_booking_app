<template>
<Nav />
  <div class="home">
    <h1>Hello {{ fullname }}</h1><br>
    <h2 style = "color: green">Welcome To ClinicAA</h2><br>
    <h2 style = "color: green">Your Reference is {{ Reference }}</h2>
  </div>
</template>

<script>
import Nav from '@/components/Nav.vue';

export default {
  name: "Home",
  components: {
    Nav
  },

  data() {
    return {
      Reference: localStorage.getItem("prefer"),
      fullname: localStorage.getItem("fullname"),
    };
  },

  mounted() {
    console.log(this.$store.state.token);
  },
};
</script>