<template  >
<div class="main-products" >
   <router-link to="/">
     <a href="#" class="button-previous ml-5">‹</a>
     </router-link>
 <div class="container" v-if="Maquinarias.length > 0" >  
   <div class='row' v-for="Maquinarias in Maquinarias" :key="Maquinarias.id_maquinaria">
       <div class ='product col-md-12'> <!--Inicio Product -->
          <div class='row product-body'>
            <div class ='product-img col-sm-4'>
              <img class='zoom' src = "https://www.spicyrocket.com//storage/uploads/2019/05/269/cortadorahuskvana-1557284143.jpg">
            </div>
                <div class ='product-detail col-sm-5'>
                   <div class='product-title'>
                      <h4>{{Maquinarias.Nombre_maquinaria}}</h4>
                    </div>
                        <div class='product-text'>
                         <p><br>{{Maquinarias.Detalles_maquinaria}}</p> 
                         </div>
            </div>
            <div class ='product-shop col-sm-3 '>
                <div class="price-wrap h4">
                    <span class="price"> {{Maquinarias.Precio_x_Hora}} </span>
                  </div> <!-- info-price-detail // -->
                  <p class="text-warning">precio/hora</p>
                  <br>
                  <p>
                    <a href="#" class="btn btn-warning text-white" 
                    @click='AddMaquinariaLocal(Maquinarias.id_maquinaria)'> 
                     Añadir 
                    </a>
                    <a href="#" class="btn btn-secondary">Más detalles</a>
                  </p>
                  <a href="#"><i class="fa fa-heart"></i> Add to wishlist</a>
             </div>   <!--Fin Product Shop -->  
            </div>    <!--Fin Product body -->  
        </div>      <!--Fin Product -->

   </div>        <!--Fin Row -->  
  </div>   <!--Fin Container--> 

<div class="main-products no-encontrado" v-else>
      <div class='container'>
        <div class='text-center'>
          <h2>Lo sentimos no hemos encontrado nada en tu búsqueda</h2>
        </div> 
            
      </div>
</div>
</div>
</template>
<script>
import { parse } from 'path';
export default {
  name:'Products',
  mounted(){

  },
  created(){

    axios.get('/api/Products/'+this.$route.query.idLocalidad+'/'+this.$route.query.idTipomaquinaria)
                    .then((response) => {
                        this.Maquinarias = response.data.Maquinaria
                        console.log(this.Maquinarias);
                    });
  },
  methods:{
    
      AddMaquinariaLocal(idmaquinarialocal){
           this.$store.commit('addToCart',idmaquinarialocal);           
      }
      
  },
  data(){
    return{
          Maquinarias:[],
          MaquinariasLocal:[]

    }
      
  }
}
</script>