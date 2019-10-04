<template>
<div  style="padding-top:160px;">   <!--Inicio main--> 
<div class="container mb-4 form">
  <div class ="row form-register"> <!-- Inicio Register-->
    <div class="col-12 form-detail-client">      
        
        <p v-if="errors.length" id="ErrorsLines">
            <b> Favor ingresar los siguientes campos: </b>
            <ul>
                <li v-for ="error in errors" :key="error">{{error}}</li>
            </ul>
        </p>
    <form>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="nombres">Nombres:</label>
                <input type="text" v-model="Nombres" class="form-control" placeholder="Nombres*" value="" />
            </div>
            <div class="col-sm-6">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" v-model="Apellidos" class="form-control" placeholder="Apellidos *" value="" />
            </div>
        </div> 
         <div class="form-group row">
             <div class="col-sm-6">
                <label for="Identidad">Identidad:</label>
                <input type="number" v-model="Identidad"  class="form-control" placeholder="0801199414905 *" value="" />
            </div>
            <div class="col-sm-6">
                <label for="Telefono">Teléfono:</label>
                <input type="number" v-model="Telefono" class="form-control" placeholder="Teléfono*" value="" />
            </div>          
        </div>  <!-- Fin form-left -->
        <div class="form-group row">
            <div class="col-sm-6">   <!-- Inicio form-right -->            
                <label for="Email">Correo Electronico:</label>
                <input type="email" v-model="Email" class="form-control" placeholder="ejemplo@ejemplo.com*" value="" />
            </div>
            <div class="col-sm-6">
                <label for="Departamento">Departamento:</label>
                 <select v-model="selectLocalidad">
                                <option v-for = "Localidades in Localidades" :key="Localidades.id_localidad"
                                v-bind:value="Localidades.id_localidad">
                                {{Localidades.nombre_localidad}}
                                </option>          
                 </select>
            </div>
         </div> 
            <div class="form-group row">
                <div class="col-sm-6">
                <label for="Direccion">Dirección:</label>
                <input type="text" v-model="Direccion" class="form-control" placeholder="col barrio casa*" value="" />
                </div>
                <div class="col-sm-6">
                <label for="rtn">RTN:</label>
                <input type="text" v-model="RTN" class="form-control" placeholder="" value="" />
                </div>
        </div>  <!-- Fin form-right -->
        </form>
     </div> <!-- Fin columan registro-->     
</div> <!-- Fin Register-->

    <div class="row cart">
        <div class="col-12 shopping-cart">
            <div class="page-header">
                <h1> Detalles de la solicitud</h1>      
              </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Maquinaria</th>
                            <th scope="col" class="text-center">Horas</th>
                            <th scope="col" class="text-right">Precio * hora</th>
                            <th scope="col" class="text-right">Subtotal</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(MaquinariaLocals,index) in MaquinariaLocal" :key="MaquinariaLocals.id_maquinaria">                            
                            <td>{{MaquinariaLocals.Nombre_maquinaria}}</td>
                            <td><input v-model.number="MaquinariaLocals.hora" class="form-control" type="number" value=1></td> 
                            <td class="text-right"><input type="number" readonly v-model.number="MaquinariaLocals.Precio_x_hora"></td>                              
                            <td class="text-right"><input type="number" readonly v-model.number="subtotalRow[index]"></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"  @click.prevent="removeFromCart(MaquinariaLocals.id_maquinaria,index)">
                                                        Eliminar
                                <i class="fa fa-trash"></i>
                                </button>
                                </td>
                         </tr> 
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>                                              
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{total}}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                  <router-link to="/Products"><button class="btn btn-block btn-light">Continuar Buscando</button> </router-link>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button @click="ValidarFormulario" class="btn btn-lg btn-block btn-warning text-white text-uppercase">Enviar Solicitud</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>  <!--Fin main--> 
</template>

<script>
export default {
    name :"cart",
     data(){
        return{
            MaquinariaLocal:[],
            errors :[],
            Localidades:[],
            Nombres:null,
            Apellidos:null,
            Identidad:null,
            Telefono:null,
            Email:null,
            Direccion:null,
            selectLocalidad:null,
            RTN:null
        }
    },
    mounted(){
                 axios.get('/api/Localidad').then((Response)=>{
                     this.Localidades = Response.data;     
                     });
    },  
    created(){
            let data = localStorage.getItem('MaquinariaLocal');                                  

                 axios.post('/api/Cart/',{data:data})
                 .then((Response)=>{                     
                     this.MaquinariaLocal=Response.data;      
                     console.log(this.MaquinariaLocal);
                });
    },
    computed:{
        
        subtotalRow(){
                return this.MaquinariaLocal.map((MaquinariaLocals)=>{
                    return Number(MaquinariaLocals.hora*MaquinariaLocals.Precio_x_hora);
                });
            },
        total() {
          return this.MaquinariaLocal.reduce((total,MaquinariaLocals) => {
            return total + (MaquinariaLocals.hora*MaquinariaLocals.Precio_x_hora);
          }, 0);
        }
            
    },
    methods:{
            removeFromCart(idmaquinariaremove,index){
                this.$store.commit('removeFromCart',idmaquinariaremove);
                this.MaquinariaLocal.splice(index,1);
            },

            ValidarFormulario:function (e){
                if (this.Nombres && 
                     this.Apellidos && 
                     this.Identidad &&
                     this.Telefono &&
                     this.Email &&
                     this.selectLocalidad &&
                     this.Direccion ){
                         console.log(this.Identidad);
                        this.GuardarFormulario();   
                     }

                     this.errors=[];

                     if (!this.Nombres){
                         this.errors.push('Nombre es requerido');
                         window.scrollTo(0,'ErrorsLines');  
                     }

                     if (!this.Apellidos){
                         this.errors.push('Apellidos es requerido');
                         window.scrollTo(0,'ErrorsLines');                         
                     }

                     if (!this.Identidad){
                         this.errors.push('Identidad es requerido');
                         window.scrollTo(0,'ErrorsLines');  
                     }

                     if (!this.Telefono){
                         this.errors.push('Telefono es requerido');
                         window.scrollTo(0,'ErrorsLines');  
                     }

                     if (!this.Email){
                         this.errors.push('Email es requerido');
                         window.scrollTo(0,'ErrorsLines');  
                     }

                    if (!this.selectLocalidad){
                         this.errors.push('Departamento es requerido');
                         window.scrollTo(0,'ErrorsLines');  
                     }

                     if (!this.Direccion){
                         this.errors.push('Dirección es requerido');
                         window.scrollTo(0,'ErrorsLines');  
                     }

                     e.preventDefault();
            },

             GuardarFormulario(){                 

                axios.post('/api/SaveCart',{
                    Nombres: this.Nombres,
                    Apellidos :this.Apellidos,
                    Identidad: this.Identidad,
                    Telefono:  this.Telefono,
                    Email:      this.Email,
                    Departamento: this.selectLocalidad,
                    Direccion : this.Direccion
                }).then((Response)=> {
                    alert("se han guardao los datos");
                })
            }
    }

}
</script>