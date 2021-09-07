<template>
    <div class="p-product__list">
        <div
        v-for="product in products"
        class="p-product__item"
        :key="product.id">
        <product-item
        :product="product"
        ></product-item>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import ProductItem from './ProductItem.vue'

export default {
    name: 'product-list',
    props:{
        sort_id:{type: Number}
    },
    components: {
        ProductItem
    },
    data: function(){
        return{
            products: [],
        }
    },

    mounted: function() {
      axios.get('/ajax/products', {
          params:{
              sort_id:this.sort_id
          }
      })
      .then(response => {
        this.products = response.data;
        console.log(this.products);
      })
      .catch(error => {
          console.log('データの取得に失敗しました。');
      });
    }
}
</script>
