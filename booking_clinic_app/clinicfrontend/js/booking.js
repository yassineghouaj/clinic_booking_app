Vue.component('booking',{
      
    props: ['id'],
    template: `<div :class="'animated fadeInRight component booking ' + id">
                
               <h1 v-if="afterSubmit" class = "animated bounceIn">We have recieved your Request Successfully!</h1>
               <span class="notifications first-noti animated shake>please, Select a date Before Selecting Time</span>
               <span class="notifications second-noti animated shake>please, Select a date before Submitting Request</span>
               <span class="notifications third-noti animated shake>please, Select a Time before Submitting Request</span>
               <span class="notifications last-noti animated shake>please, Write Your Name before Submitting Request</span>

               <div v-if="!afterSubmit">
                <form v-on:submit.prevent>
                 <div class="input-field col s6">
                 <label for="last_name" class="customerinfo">your_name</label>
                   <input id= "last_name" type="text" class="validate" v-mode="customerName">
                   
                </div>
                <div class="input-field col s6">
                   <label for="phone" class="customerinfo">your_Contact</label>
                   <input id="phone" type="text" class="validate" v-mode="customerNumber">
              
                </div>
                </form>
               </div>


        </div>`,


        data(){
            return {

                afterSubmit: false,
                customerName: "",
                customerNumber: "",
            }

        }

        
 })