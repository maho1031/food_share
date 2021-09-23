<template v-if="product">
    <div class="p-productDetail__item" v-if="product.id">
            <div class="p-productDetail__header">
                <div class="p-productDetail__name">
                    <span class="c-tag">{{product.category.name}}</span>
                    <h1>{{product.name}}</h1>
                </div>
            </div>
                <div class="p-productDetail__img">
                    <img :src="'../../storage/uploads/' + product.pic1" v-if="product.pic1" alt="">
                    <img :src="'../../storage/uploads/' + product.pic1" v-else alt="sampleIcon" class="">
                    <div class="p-product__soldOutBadge" v-if="product.sold_flg === 1 ">
                        <span class="p-product__soldOutBadgeText">SOLD</span>
                    </div>
                </div>
 
            <div class="p-productDetail__basicInfo">
                <div class="p-productDetail__price">
                    <span class="p-productDetail__price-main">¥{{product.price}}(税込)</span>
                </div>
                <div class="p-productDetail__foodDate">
                    <span class="p-productDetail__foodDate-exp">賞味期限：{{product.exp_date | moment("YYYY年MM月DD日")}}</span>
                </div>
                <div class="p-productDetail__comment">
                    <p class="p-productDetail__comment-text">商品詳細</p>
                    <p class="p-productDetail__comment-text">{{product.comment}}</p>
                </div>
            </div>

            <!-- <form method="POST" action="{{route('products.add', ['product_id' => product.id]) }}">
                @csrf
                 <div class="p-btnContainer">
                     @if($product->sold_id === '0')
                     <input type="hidden"  value="{{product.id}}">
                    <button type="submit" class="c-btn p-btnContainer__btn">購入予約をする</button>
                    @endif
                </div>
            </form> -->

            <div class="p-productDetail__snsShare u-mb20">
                <a href="" class="p-productDetail__snsShare-link">
                    <i class="fab fa-twitter sns_share_icon"></i>
                    Tweet
                </a>
            </div>

            <div class="p-productDetail__content">
                <h3 class="p-productDetail__content-title">店舗情報</h3>
                <dl class="p-productDetail__shopInfo">
                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">コンビニ名</dt>
                        <dd class="p-productDetail__shopInfo-dd">{{product.shop.conveni.name}}</dd>
                        
                    </div>

                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">支店名</dt>
                        <dd class="p-productDetail__shopInfo-dd">{{product.shop.name}}</dd>
                    </div>

                    <div class="p-productDetail__shopInfo-line">
                        <dt class="p-productDetail__shopInfo-dt">住所</dt>
                        <dd class="p-productDetail__shopInfo-dd">{{product.shop.address}}</dd>
                    </div>
                </dl>
            </div>
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'vue-moment';


export default {
    name: 'ProductShow',
    props: {
        // product: { type: Object, required: true },
        productid: {type: Number, required: true},
    },
    data: function(){
        return{
            product: {
            id: null,
            // name: null,
            exp_date: this.$moment().format(),
            shop: {
                name: null
            },
            category: {
                name: null
            }
        }
        }
    },

    mounted: function() {
      axios.get('/ajax/productShow', {
          params: {
              productid: this.productid,
          }
      })
      .then(response => {
        this.product = response.data[0];
        console.log(this.product);
        console.log(this.productid);
      })
      .catch(error => {
          console.log('データの取得に失敗しました。');
      });
    }
}
</script>
