let cart = localStorage.getItem('MaquinariaLocal');
let cartCount = localStorage.getItem('MaquinariaCount');

let store ={
    state: {
        cart:cart ? JSON.parse(cart):[],
        cartCount:cartCount ? parseInt(cartCount):0
    },
    mutations:{
        addToCart(state,Maquinaria){
            let found = state.cart.indexOf(Maquinaria);            
            if (found>=0){
                console.log('ya existe en el carrito');
            }else
            {
                state.cart.push(Maquinaria);
                //console.log(item);
                state.cartCount++;
                this.commit('saveCartLocal');   
            }

        }, // Fin añadir al carrito
        saveCartLocal(state){
            const parsedMaquinaria =JSON.stringify(state.cart);
            localStorage.setItem("MaquinariaLocal",parsedMaquinaria);
            localStorage.setItem("MaquinariaCount",state.cartCount);
        },
        removeFromCart(state,MaquinariaDelete){
            let index = state.cart.indexOf(MaquinariaDelete);
            console.log(index);
            if (index>-1){
                let product = state.cart[index];
                state.cartCount=state.cartCount-1;
                state.cart.splice(index,1);                
            this.commit('saveCartLocal');   
            }
        }
    }
}

export default store;