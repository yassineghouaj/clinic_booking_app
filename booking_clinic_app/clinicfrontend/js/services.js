 Vue.component('services',{
      
    props: ['id', 'services'],
    template: `<div :class="'animated fadeInRight component services ' + id">
            <table>
                 <thead>
                  <tr>
                   <th>service</th>
                   <th>price</th>
                  </tr>
                 </thead>
                 <tbody>
                     <tr v-for="pr in services">
                        <td>{{ pr.name }}</td>
                        <td>{{ pr.price }}</td>
                     </tr>
                 </tbody>
            </table>

        </div>`


 })