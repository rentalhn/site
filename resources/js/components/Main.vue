<template>
<div>
    <div class='container' id="header_section">
            <Header/>
            <Header_1/>
    </div>    
            <div id ='Main'>
          <transition>
                <router-view :key="$route.fullPath"></router-view>
                </transition>
            </div>
</div>
</template>

<script>
/*Imports Navs To Headers */
 import Header from "./Layout/Header.vue";
 import Header_1 from "./Layout/Header_1.vue";
export default {
    name : 'Main-App',
    components:{Header,
                Header_1
               }
}
</script>