<template>
    <a :href="`/products/${product.id}/show`">
    <span class="c-tag">{{product.category.name}}</span>
                            <div class="p-product__image">
                                <img :src="'../../storage/uploads/' + product.pic1" v-if="product.pic1" alt="">
                                <img v-else :src="'../../../img/sample-img.jpg'" alt="sampleIcon" class="c-inputField__image">
                                <div class="p-product__soldOutBadge" v-if="product.sold_flg === 1 ">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{product.name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{product.price}}円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{product.shop.conveni.name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">{{ product.shop.name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">賞味期限：{{product.exp_date | moment("YYYY年MM月DD日")}}</span>
                                    </li>
                                </ul>
                            </div>
         </a>
</template>
<script>
import moment from 'vue-moment';

  export default {
    name: 'ProductItem',
    props:['product'],
  }

</script>