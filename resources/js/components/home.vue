<template>
<div>
    <carousel/>
    <compra/>
    <renta/>
    <nosotros/>
    <contacto/>
</div>
    
</template>

<script>
/* Import front components home
    Include all components for home*/
import carousel from "./home/Carousel-section.vue";
import compra from "./home/Compra-section.vue" ;
import renta from "./home/Renta-section.vue";
import nosotros from "./home/Nosotros-section.vue";
import contacto from "./home/Contacto-section.vue";


export default {
    name:"home-app",
    components: {
        carousel,
        compra,
        renta,
        nosotros,
        contacto 

    }
}

</script>