<template>
  <form form @submit.prevent="Submit_login" class="form login">
    <div class="container">
      <h3>Welcome to clinicAA</h3>
      <p>"Never Go To a Doctor Whose Office Plants Have Died"</p>
      <hr />

      <label for="email"><b>Email</b></label>
      <input
        type="text"
        placeholder="Enter Email"
        name="email"
        id="email"
        required
        v-model="email"
      />

      <label for="pwd"><b>Password</b></label>
      <input
        type="password"
        placeholder="Enter Password"
        name="pwd"
        id="psw"
        required
        v-model="pwd"
      />

      <p>
        By creating an account you agree to our <a href="#">Terms & Privacy</a>.
      </p>
      <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
      <p>Already have an account? <a href="register">register</a>.</p>
    </div>
  </form>
</template>



<script>
export default {
  name: "Login",
  components: {},
  data() {
    return {
      email: "",
      pwd: "",
    };
  },
  methods: {
    async Submit_login() {
      let form = {
        email: this.email,
        pwd: this.pwd,
      };
      const res = await fetch("http://localhost/clinico/app/patient/login", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(form),
      });
      if (res.status == 200) {
        let result = await res.json();
        if (result) {
          let token = result.token;
          let full_name = result.data.f_nom + " " + result.data.l_nom;
          localStorage.setItem("token", token);
          localStorage.setItem("full_name", full_name);
          localStorage.setItem("prefer", result.data.prefer);
          this.$store.state.token = token;
          this.$router.push("/");
        }
      }
    },
  },
};
</script>


<style scoped>
* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

p {
  color: #04aa6d;
  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  font-size: 20px;
}
/* Full-width input fields */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type="text"]:focus,
input[type="password"]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04aa6d;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

  