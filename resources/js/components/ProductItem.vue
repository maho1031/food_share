<template>
    <a :href="`/products/${product.id}/show`">
                            <div class="p-product__image u-mt16">
                                <img :src="'../../storage/uploads/' + product.pic1" v-if="product.pic1" alt="">
                                <div class="p-product__soldOutBadge">
                                    <span class="p-product__soldOutBadgeText">SOLD</span>
                                </div>
                            </div>
                            
                            <div class="p-product__data">
                                <ul class="p-product__name">
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">商品名：{{product.name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">価格：{{product.price}}円(税込)</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">コンビニ名：{{product.shop.conveni.name}}</span>
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：{{ product.shop.name}}</span>
                                    </li>
                                </ul>
                            </div>
         </a>
</template>
<script>
  export default {
    name: 'ProductItem',
    props: ['product']
  }
</script>