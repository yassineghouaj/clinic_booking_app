Vue.component('contact',{
      
    props: ['id'],
    template: `<div :class="'animated fadeInRight component contact ' + id">
                
               <i class ="material-icons-two-tone">phone</i>
               <span>0606060600</span><hr class = 'hrhr'>

               <i class ="material-icons-two-tone">email</i>
               <span>clinicaa@gmail.com</span><hr class = 'hrhr'>

               <i class ="material-icons-two-tone">location</i>
               <span>10800 Collins Ave, Miami Beach, FL 33154, États-Unis</span><hr class = 'hrhr'>

        </div>`

        
 })