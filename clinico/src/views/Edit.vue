<template>
  <Nav />
  <div class="reservecontainer">
      <p>{{this.$route.params.a_id}}</p>
    <label for="date">Select a Date:</label>
    <input style = "background-color: green; width: 250px; color: white; padding: 10px" type="date" v-model="date" />
  </div>
  <div v-if="toreserve" class="results">
    <div
      :class="[]"
      v-for="(item, key) in toreserve"
      :key="key">
      <div>
        <h6>{{ key }}</h6>
        <div v-if="item == 'false'">
          <button style = "background-color: #4CAF50; padding: 20px; color: white"
          @click="edit(this.date+' '+key.slice(0, 2)+':00:00')">reserve now</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Nav from '@/components/Nav.vue';
export default {
  name: "Reserve",
  components: {
    Nav
  },
  data() {
    return {
      date: "",
      toreserve: undefined,
    };
  },
  methods: {
    async edit(date){
      console.log(date)
      let token = localStorage.getItem("token");
      const res = await fetch(
        "http://localhost/clinico/app/appointment/edit_appointment",
        {
          method: "POST",
          headers: {
            "authorization": "Bearer " + token,
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            a_date: date,
            a_id: this.$route.params.a_id
          }),
        }
      );
      console.log(res);
      if (res.status == 200) {
        let result = await res.json();
        if (result) {
          this.toreserve= undefined
        }else {
          localStorage.clear();
     this.$router.push('Login')
        }
      }
    },
    async SearchbyDay() {
      let token = localStorage.getItem("token");
      const res = await fetch(
        "http://localhost/clinico/app/appointment/searchbyday",
        {
          method: "POST",
          headers: {
            "authorization": "Bearer " + token,
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            a_date: this.date,
          }),
        }
      );
      this.toreserve = [];
      if (res.status == 200) {
        let result = await res.json();
        if (result!="false") {
          this.toreserve = result;
        }else {
          localStorage.clear();
     this.$router.push('Login')
        }
      }
    },
  },
  // mounted(){
  //     this.SearchbyDay();
  // },
  watch: {
    date() {
      this.SearchbyDay();
    },
  },


  /*async SearchbyDay() {
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
          date: this.date,
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
  },*/

};

///////
</script>

