<template>
    <div>
        <div class="c-container p-search">
                   <div class="p-search__content">
            <div class="p-search__header">
                <p class="c-title">商品検索</p>
            </div>
            <div class="p-searchForm">
                <form>
                    <ul class="p-searchFrom__list u-mb30">
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">カテゴリーで探す</p>
                            <div class="c-select">
                                <select 
                                    id="search.category_id"
                                    v-model="search.category_id"
                                    class="p-searchForm__select">
                                    <option value="0">全て</option>
                                    <option v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                    >{{category.name}}</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">都道府県で探す</p>
                            <div class="c-select">
                                <select 
                                    id="search.category_id"
                                    v-model="search.prefecture_id"
                                    class="p-searchForm__select">
                                    <option value="0">指定なし</option>
                                    <option v-for="prefecture in prefectures"
                                    :key="prefecture.id"
                                    :value="prefecture.id"
                                    >{{prefecture.name}}</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">価格で探す</p>
                            <div class="c-select">
                                <div class="p-searchForm__price">
                                    <input 
                                    type="number"
                                    id="search.price_min"
                                    v-model="search.price_min"
                                    class="c-searchForm__inputPrice"><span class="p-searchForm__span">円から</span>
                                    <input 
                                    type="number"
                                    id="search.price_max"
                                    v-model="search.price_max"
                                    class="c-searchForm__inputPrice"><span class="p-searchForm__span">円まで</span>
                                </div>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                            <p class="p-searchForm__text">賞味期限で探す</p>
                            <div class="c-select">
                                <select 
                                id="search.sort_date" 
                                v-model="search.sort_date"
                                class="p-searchForm__select"
                                >
                                    <option
                                    v-for="sort_date in sort_dates"
                                    :value="sort_date.id"
                                    :key="sort_date.id"
                                    >{{sort_date.label}}</option>
                                </select>
                            </div>
                        </li>
                        <li class="p-searchForm__item">
                        <p class="p-searchForm__text">検索ワード</p>
                            <div class="c-select">
                                <input 
                                type="text"
                                id="search.keyword"
                                v-model="search.keyword"
                                class="c-searchForm__input">
                            </div>
                        </li>
                    </ul>

                    <div class="p-btnContainer">
                        <button
                        type="submit" 
                        @click.prevent="submit"
                        class="c-btn p-btnContainer__btn">検索する</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

    

    <section class="c-container p-product">
            <div class="p-productContainer">
                <div class="p-product__header u-mb10">
                    <p class="c-title">商品一覧</p>
                </div>
                <div class="p-product__wrapper">
                    <product-list
                    :products="products"
                    ></product-list>
                </div>
            </div>
    </section>
    </div>
</template>
<script>
import axios from 'axios';
import ProductList from './ProductList.vue';

export default{
    name: 'ProductIndex',
    props:{
        categories: { type: Array, required: true }
  },
    components: {
      ProductList
    },
    data: function(){
        return{
            products:[],
            search: {
                category_id: '0',
                sort_price: '0',
                sort_date: '0',
                prefecture_id: '0',
                keyword: '',
                price_min: '',
                price_max: '' 
            },
            sort_prices: [
                {id: '0', label:"指定なし"},
                {id: '1', label: "価格の高い順"},
                {id: '2', label: "価格の安い順"},
            ],
            sort_dates: [
                {id: '0', label:"指定なし"},
                {id: '3', label: "賞味期限の新しい順"},
                {id: '4', label: "賞味期限の古い順"},
            ],
            prefectures:[],
            
        }
    },
    methods: {
        submit: function(){
            axios.post('ajax/search',this.search)
            .then(response => {
            this.products = response.data;
            // console.log(this.search);
            // console.log(this.products);
        })
        .catch(error => {
            console.log("ERRRR:: ",error.response.data);
        });
        },

    },
    mounted: function() {
      axios.get('/ajax/products')
      .then(response => {
        this.products = response.data;
        // console.log(this.products);
      })
      .catch(error => {
           console.log("ERRRR:: ",error.response.data);
      });

      /*都道府県の取得*/
            axios.get('/prefectureList/ajax')
                .then(response => {
                this.prefectures = response.data;
                // console.log(response.data);
            });
    }
}
</script>
