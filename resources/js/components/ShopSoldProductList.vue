<template>
    <div>
        <div class="p-product__list">
            <div
                v-for="product in getProducts"
                class="p-product__item"
                :key="product.id">
                <shop-product-item
                :product="product"
                ></shop-product-item>
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
import ShopProductItem from './ShopProductItem.vue';
import paginate from 'vuejs-paginate'


export default {
    name: 'ShopSoldProduct',
    components: {
        ShopProductItem
    },
    data: function(){
        return{
           products:[],
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
    mounted: function() {
      axios.get('/shop/ajax/shopSoldProducts')
      .then(response => {
        this.products = response.data;
        console.log(this.products);
     
      })
      .catch(error => {
          console.log("ERRRR:: ",error.response.data);
      });
    }
}
</script>
