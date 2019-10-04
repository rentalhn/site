<template>
<nav class="navbar navbar_first navbar-dark navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
          <router-link to="/"><a class="navbar-brand js-scroll-trigger" href="#page-top">
          <img class='logo' :src="'../storage/images/Logo_Rental.png'" /></a></router-link>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="    ">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#Renta">Renta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#Compra">Compra</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#Nosotros">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#Contacto">Contacto</a>
              </li>
              <router-link to="/Cart">
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="">
                    <span class='fa fa-shopping-cart fa-2x'>Carrito</span>
                    <span class='CarritoCount'>( {{ $store.state.cartCount }} )</span>
                  </a>
                </li>
              </router-link>
            </ul>
          </div>
        </div>
      </nav>
</template>

<script>
export default {

mounted(){
  /*
      if (localStorage.getItem("MaquinariaLocal")){
                        this.CarritoCount= JSON.parse(localStorage.getItem("MaquinariaLocal")).length;
                        console.log(this.CarritoCount);
      }
      */
  },
  data(){
    return{
          CarritoCount:0
    }    
  }
}
</script>