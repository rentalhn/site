<template>
<nav class="navbar navbar_two text-white navbar-expand-lg fixed-top fixed-top-2" >
        <div class="container">
                     <div class="form-inline">
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label" for="que_buscas">Que Buscas? </label>
                                <select v-model="selectLocalidad" @change="setLocalidades">
                                <option v-for = "Localidades in Localidades" :key="Localidades.id_localidad"
                                v-bind:value="Localidades.id_localidad">
                                {{Localidades.nombre_localidad}}
                                </option>          
                                </select>    
                                </div>
                                <div class="col-md-3 form-group">
                                        <label class="col-form-label" for="que_buscas">Donde? </label>                                
                                <select v-model="selectTipoMaquinaria">
                                <option v-for = "TipoMaquinaria in TipoMaquinaria" :key="TipoMaquinaria.Id_tipo_maquinaria"
                                v-bind:value="TipoMaquinaria.Id_tipo_maquinaria">
                                {{TipoMaquinaria.Tipo_maquinarias}}
                                </option>          
                                </select>  
                                    </div>
                            <div class="col-md-3 form-group">
                                    <label class="col-form-label" for="que_buscas">Que deseas? </label>
                                    <select id="select_buscas" data-style="btn-inverse">
                                            <option value="Volqueta">Rentar</option>
                                            <option value="Camion"> Comprar</option>
                                        </select>     
                                </div>
                          <router-link :to="{name:'Products',
                                        query:{idLocalidad:this.selectLocalidad,
                                               idTipomaquinaria:this.selectTipoMaquinaria}}" >
                            <button type="button" class="btn btn-warning text-white btn-sm">Buscar</button>
                            </router-link> 
                            <!-- <router-link :to="`/Products/${this.selectLocalidad}`">
                            <button type="button" class="btn btn-warning text-white btn-sm">Buscar</button>
                            </router-link> !-->
                    </div>

          </div>
    </nav>
    </template>

<script>

export default {
        data(){
                return{
                        Localidades:[],
                        TipoMaquinaria:[],
                        selectLocalidad:'',
                        selectTipoMaquinaria:''
                }
        },
        mounted(){

                 axios.get('/api/Localidad').then((Response)=>{
                     this.Localidades = Response.data;      
                });                     
        
        },
        methods:{
                
                setLocalidades(){                        
                axios.get('/api/TipoMaquinaria/'+this.selectLocalidad)
                        .then((Response)=>{
                              //  console.log(Response.data);
                        this.TipoMaquinaria = Response.data;
                    //    this.$emit('new');      
                });
                
                }
        }

}
</script>