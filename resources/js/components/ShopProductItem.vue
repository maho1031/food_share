<template>
    <div v-if="product.id">
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
                        <span class="p-product__sentense">{{product.shop.name}}支店</span>
                    </li>
                </ul>
            </div>
            <div class="p-btnContainer" v-if="product.sold_flg === 0">
                <a :href="`/shop/products/${product.id}/edit`" class="p-btnContainer__btn">商品の編集</a>
            </div>
            <div class="p-btnContainer u-mb30">
                <a :href="`/shop/products/${product.id}/show`" class="p-btnContainer__btn is-detail">詳細を見る</a>
            </div>
    </div>
</template>
<script>
  export default {
    name: 'ShopProductItem',
    props:{
    product:{ type: Object, required: true }
  }

  }

</script>