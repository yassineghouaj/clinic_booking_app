Vue.component('whyus', 
{


     props : ["id","about"],
   template : `<div :class="'animated fadeInRight component why-us ' + id">

   <span>because we are the best</span><hr class = 'hrhr'>
            
             </div>`

});