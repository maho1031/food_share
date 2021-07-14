<template>
                    <div class="p-product__item">
                            <div class="p-product__image">
                                <!-- <img src="{{asset('storage/uploads/'.product.pic1)}}" alt=""> -->
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
                                        <!-- <span class="p-product__sentense">コンビニ名：{{product.shop.convenis.name}}</span> -->
                                    </li>
                                    <li class="p-product__infomations">
                                        <span class="p-product__sentense">支店名：{{ product.shop.name}}</span>
                                    </li>
                                </ul>
                            </div>
                    </div>
</template>
<script>
  export default {
    name: 'ProductItem',
    props: ['product']
  }
</script>