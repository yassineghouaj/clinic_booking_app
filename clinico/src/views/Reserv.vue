<template>
  <Nav /><br><br>
  <div class="reservecontainer">
    <label for="birthday" style = "color:green;">Select a Date:</label>
    <input style = "background-color: green; width: 250px; color: white; padding: 10px" type="date" v-model="date" />
  </div>

  <div v-if="toreserve" class="results">
    <div v-for="(item, key) in toreserve" :key="key">
      <div>
        <h6>{{ key }}</h6>
        <div v-if="item == 'false'">
          <button style = "background-color: #4CAF50; padding: 20px; color: white"
            @click="reserve_it(this.date + ' ' + key.slice(0, 2) + ':00:00')"
          >
            reserve now
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Nav from "@/components/Nav.vue";
export default {
  name: "Reserve",
  components: {
    Nav,
  },
  data() {
    return {
      date: "",
      toreserve: undefined,
    };
  },
  methods: {
    reserve_it(date) {
      console.log(date);
      let token = localStorage.getItem("token");
      let dateTime = {
        a_date: date,
      };
      console.log(dateTime);
      fetch("http://localhost/clinico/app/appointment/reserve", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: "Bearer " + token,
        },
        body: JSON.stringify(dateTime),
      })
        .then((response) => response.json())
        .then((data) => console.log(data))
        .catch((err) => console.log(err.message));


      //console.log(res);
      //     let result = await res.json();
      //   if (res.status == 200) {
      //     console.log('hello');
      //     console.log(result);
      //     if (result != "false") {
      //       this.toreserve = undefined;
      //     }
      // } else {
      //   localStorage.clear();
      //   this.$router.push("Login");
      // }

      
    },
 
  async SearchbyDay() {
    console.log(this.date);
    let token = localStorage.getItem("token");

    const res = await fetch(
      "http://localhost/clinico/app/Appointment/searchbyday",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Authorization: "Bearer " + token
        },
        body: JSON.stringify({
          a_date: this.date,
        }),
      }
    );

    this.toreserve = [];
    if (res.status == 200) {
      let result = await res.json();
      console.log(result);

      if (result != "false") {
        this.toreserve = result;
      } else {
        localStorage.clear();
        this.$router.push("Login");
      }
    }
  }
   },
  watch: {
    date() {
      this.SearchbyDay();
    }
  },
};
</script>

<style >
</style>