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
    name: 'ProductList',
    props: {
        products:{ type: Array, required: true },
    },
    components: {
        ProductItem
    },
    data: function(){
        return{
            product: {
                name: null,
                category_id: null,
                price: null,
                exp_date: null,
                comment: null,
                pic1: null,
            },
        }
    },

    // mounted: function() {
    //   axios.get('/ajax/products')
    //   .then(response => {
    //     this.products = response.data;
    //     console.log(this.products);
    //   })
    //   .catch(error => {
    //       console.log('データの取得に失敗しました。');
    //   });
    // }
}
</script>
