<template>
    <div>
        <product-indexlist
        :products="products"
        v-for="products is productslist"
        :key="products.key">
        </product-indexlist>
    </div>
</template>
<script>
import axios from 'axios';
import ProductIndexlist from './ProductIndexlist.vue';

export default{
    name: 'ProductIndex',
    props: {
    },
    data: function(){
        return{
            productslist:[]
        }
    },

    mounted: function() {
    axios.get('/ajax/products')
    .then(response => {
      this.productslist = response.data;
    })
    .catch(error => {
      console.log('データの取得に失敗しました。');
    });
  }
}
</script>
