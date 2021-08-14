import $ from 'jquery';
import Vue from 'vue'
import ProductList from './components/ProductList.vue'
import ProductItem from './components/ProductItem.vue'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// ハンバーガーメニュー 
// =======================================
$('.js-menuTarget').on('click', function () {
    
    if($(this).hasClass('is-active')){
      $(this).removeClass('is-active');
      $('.js-open-menu').removeClass('is-open');
   
    }else{
      $(this).addClass('is-active');
      $('.js-open-menu').addClass('is-open');
    }
   });
// ヘッダー
// =======================================
var $window = $(window),
$header = $('.p-header'),
headerBottom;

$window.on('scroll', function () {
headerBottom = $header.height();
if ($window.scrollTop() > headerBottom) {
  $header.addClass('is-triggered');
}
else {
  $header.removeClass('is-triggered');
}
});
$window.trigger('scroll');

 //フッターを最下部に固定
 // =======================================
var $ftr = $('.js-footer');
if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight()){
 $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) + 'px;'});
}

// 画像ライブプレビュー
// =======================================
var $dropArea = $('.js-pic');
var $fileInput = $('.js-input-file');

$fileInput.on('change', function(e){
  var file = this.files[0],            // 2. files配列にファイルが入っています
      $img = $(this).siblings('.js-prev'), // 3. jQueryのsiblingsメソッドで兄弟のimgを取得
      fileReader = new FileReader();   // 4. ファイルを読み込むFileReaderオブジェクト

  // 5. 読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
  fileReader.onload = function(event) {
  // 読み込んだデータをimgに設定
  $img.attr('src', event.target.result).show();
  };

  // 6. 画像読み込み
  fileReader.readAsDataURL(file);
});




window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//  Vue.component('product-index', require('./components/ProductIndex.vue').default);
//  Vue.component('product-indexlist', require('./components/ProductIndexlist.vue').default);
// Vue.component('product-indexitem', require('./components/ProductIndexitem.vue').default);

Vue.component('product-list', require('./components/ProductList.vue').default);
Vue.component("ProductList", ProductList)
Vue.component("ProductItem", ProductItem)

// Vue.component('product-item', require('./components/ProductItem.vue').default);

const app = new Vue({
    el: '#app'
});
