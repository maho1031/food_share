<template>
    <div>
        <div class="p-product__list">
            <div
            v-for="product in getProducts"
            class="p-product__item"
            :key="product.id">
            <product-item
            :product="product"
            ></product-item>
            </div>
        </div>
        <paginate
            :page-count="getPageCount"
            :page-range="3" 
            :margin-pages="2"
            :click-handler="clickCallback"
            :prev-text="'＜'"
            :next-text="'＞'"
            :container-class="'c-pagination'"
            :page-class="'page-item'"
            >
            </paginate>
    </div>
</template>

<script>
import axios from 'axios';
import ProductItem from './ProductItem.vue';
import paginate from 'vuejs-paginate'
import moment from 'vue-moment';
// import paginate from './paginate.vue';

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
            //     name: null,
            //     category_id: null,
            //     price: null,
              exp_date: this.$moment().format(),
            //     comment: null,
            //     pic1: null,
            },
            parPage: 20,
            currentPage: 1,
        }
    },
    // ページネーション
    methods: {
        clickCallback: function (pageNum) {
        this.currentPage = Number(pageNum);
      }
    },
     //ページネーション
    computed: {
      getProducts: function() {
        let current = this.currentPage * this.parPage;
        let start = current - this.parPage;
        return this.products.slice(start, current);
      },
      getPageCount: function() {
        return Math.ceil(this.products.length / this.parPage);
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
