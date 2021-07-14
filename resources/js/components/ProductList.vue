<template>
    <div class="p-product__list">
        <div
        v-for="product in products"
        class=""
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
    components: {
        ProductItem
    },
    data: function(){
        return{
            products: [],
        }
    },

    mounted: function() {
      axios.get('/ajax/products')
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
