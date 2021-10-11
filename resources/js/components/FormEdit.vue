<template>
    <form>
        <div v-if="successFlg" class="c-flash-message u-mb30">
            <p>{{ this.message }}</p>
        </div>

        <ul v-show="errors" class="c-error__list u-mb16">
                        <li  v-for="error in errors" class="c-error__item">
                            <strong>{{ error }}</strong>
                        </li>
            </ul>

        <div class="c-inputField u-mb30">
            <label for="name" class="p-productForm__text u-mb10">商品名</label>
                <input 
                    type="name" 
                    id="name" 
                    v-model="name"
                    @blur="$v.name.$touch()"
                    class="c-inputField__input @error('name') is-error @enderror">

                    <ul v-if="$v.name.$error" class="c-error__list u-mt10">
                        <li v-if="!$v.name.required" class="c-error__item">
                            <strong>商品名が入力されていません。</strong>
                        </li>
                        <li v-if="!$v.name.maxLength" class="c-error__item">
                            <strong>30文字以内で入力してください。</strong>
                        </li>
                    </ul>
                </div>

        <div class="c-inputField u-mb30">
            <label for="category_id" class="p-productForm__text u-mb10">カテゴリー</label>
                <select 
                    id="category_id"
                    v-model="category_id"
                    class="c-inputField__input">
                    <option v-for="category in categories"
                    :key="category.id"
                    :value="category.id"
                    @blur="$v.category_id.$touch()"
                    >{{category.name}}</option>
                </select>

                    <ul v-if="$v.category_id.$error" class="c-error__list u-mt10">
                        <li v-if="!$v.category_id.required" class="c-error__item">
                            <strong>カテゴリーが選択されていません。</strong>
                        </li>
                    </ul>
        </div>

         <div class="c-inputField u-mb30">
            <label for="price" class="p-productForm__text u-mb10">価格</label>
                <input 
                type="number"
                id="price"
                v-model="price"
                @blur="$v.price.$touch()"
                class="c-inputField__input @error('price') is-error @enderror">

                <ul v-if="$v.price.$error" class="c-error__list u-mt10">
                    <li v-if="!$v.price.required" class="c-error__item">
                        <strong>金額が設定されていません。</strong>
                    </li>
                </ul>
        </div>

          <div class="c-inputField u-mb30">
            <label for="exp_date" class="p-productForm__text u-mb10">賞味期限</label>
                <input
                type="date"
                id="exp_date" 
                v-model="exp_date"
                @blur="$v.exp_date.$touch()"
                class="c-inputField__input @error('exp_date') is-error @enderror">

                <ul v-if="$v.exp_date.$error" class="c-error__list u-mt10">
                    <li v-if="!$v.exp_date.required" class="c-error__item">
                        <strong>賞味期限が設定されていません。</strong>
                    </li>
                </ul>
        </div>

        <div class="c-inputField u-mb30">
            <label for="comment" class="p-productForm__text u-mb10">商品詳細</label>
            <textarea
            id="comment"
            v-model="comment"
            cols="30"
            rows="10" 
            @blur="$v.comment.$touch()"
            class="c-inputField__input @error('comment') is-error @enderror"></textarea>
            <span class="c-inputField__detail">200文字以内</span>

            <ul v-if="$v.comment.$error" class="c-error__list u-mt10">
                <li v-if="!$v.comment.required" class="c-error__item">
                    <strong>コメントが入力されていません。</strong>
                </li>
                <li v-if="!$v.comment.maxLength" class="c-error__item">
                    <strong>200文字以内で入力してください。</strong>
                </li>
            </ul>
        </div>

        <div class="c-inputField u-mb30">
            <label for="pic1" class="p-productForm__text u-mb10">商品画像</label>
            <div class="c-inputField__imgContainer">
                <label class="c-inputField__areaDrop js-pic">
                    <input
                    type="file"
                    ref="file"
                    name="file"
                    @change="onFileChange"
                    accept="image/gif,image/jpeg,image/png"
                    class="c-inputField__icon js-input-file"
                    multiple>
                    <figure>
                        <img v-show="uploadedImage" :src="uploadedImage" >
                    </figure>
                    <figure v-show="!uploadedImage">
                        <img v-if="pic1" :src="'../../../storage/uploads/' + pic1 " >
                        <img v-else :src="'../../../img/sample-img.jpg'" alt="sampleIcon" class="c-inputField__image js-prev">
                    </figure>
                </label>
            </div>
             <ul v-for="error in pic_errors" class="c-error__list">
                    <li class="c-error__item">
                        <strong>{{ error }}</strong>
                    </li>
            </ul>
        </div>

                <div class="p-btnContainer">
                    <button 
                    type="submit" 
                    @click.prevent="submit"
                    class="c-btn p-btnContainer__btn">編集する</button>
                </div>
            </form>
</template>
<script>
import {required, maxLength} from 'vuelidate/lib/validators'
// import moment from 'vue-moment';
const axios = require('axios');
var moment = require('moment');

export default{
    name: 'FormEdit',
    props:{
    product_id: { type: Number, required: true },
    categories: { type: Array, required: true }
  },

   data: function(){
        return{
                id: '',
                name: '',
                category_id: '',
                price: '',
                exp_date: '',
                comment: '',
                pic1: [],
                uploadedImage:'',
                pic_errors: [],
                successFlg: false,
                message: '',
                errors: {}

        }
    },
     // バリデーション
    validations:{       
            name: {
            required,
            maxLength: maxLength(30)
            },
            category_id: {
            required
            },
            price: {
            required
            },
            exp_date: {
            required
            },
            comment: {
            required,
            maxLength: maxLength(255)
            }
        },

    methods: {
        // flash_messageの表示フラグ
        isShowMessage: function(){
            this.successFlg = !this.successFlg;
        },
        // 画像登録処理
        onFileChange: function(e){
            this.pic = e.target.files[0];
            // バリデーション
            this.errors = [];
            // // 形式チェック
            if (!['image/jpeg', 'image/png', 'image/gif'].includes(this.pic.type)) {
                this.pic_errors.push('JPEG、PNG、GIF以外は利用できません')
                return false;
            }
            // // ファイルの大きさチェック
            if (this.pic.size > 1024 * 1024) {
                this.pic_errors.push(`ファイルサイズが大きすぎます（${Math.round(this.pic.size / 1024 )}KB）`)
                return false;
            }
            this.createImage(this.pic);
         },

        createImage: function(file) {
            const reader = new FileReader();
            reader.onload = e => {
                this.uploadedImage = e.target.result;
            };
            reader.readAsDataURL(file);
            
    },
        // 新規登録
        submit: function(){
            let data = new FormData;
            data.append('id', this.id);
            data.append('name', this.name);
            data.append('category_id', this.category_id);
            data.append('price', this.price);
            data.append('exp_date', this.exp_date);
            data.append('comment', this.comment);
            if(this.pic){
                data.append('pic1', this.pic);
            }
            
            let config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    // 'ContentType': 'application/json',
                    // 'X-Requested-With': 'XMLHttpRequest',
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        };
        // errorsを初期化
        this.errors = {},
        axios.post('/shop/ajax/update', data, config)
            .then( (response) => {
                console.log(response.data)
                // flash_message
                this.message = response.data.message;
                this.isShowMessage();
                // 2秒後にメッセージを非表示にする
                setTimeout(this.isShowMessage, 5000);
            })
            .catch(error => {
                console.log("ERRRR:: ",error.response.data);
                console.log("ERRRR:: ",error.response.data.errors);
                
                var errors = {};

            for(var key in error.response.data.errors) {

                errors[key] = error.response.data.errors[key].join('<br>');

            }

            // self.errors = errors;
            
            this.errors = errors;
           
            });

        },
        // asyncを使うやり方
        // async getData() {
        //     const response = await axios.get('/shop/ajax/edit' ,{
        //     params: {
        //         product_id: this.product_id,
        //     }
        // });
        //     console.log(response.data);
        //     if(response.status === 200){
        //         this.product = response.data[0];
        //         console.log(this.product.name);
        //         // this.id = this.product.id;
        //         this.name = this.product.name;
        //         // this.category_id = this.product.category_id;
        //         // this.price = this.product.price;
        //         // this.exp_date = moment(this.product.exp_date).format('yyyy-MM-DD');
        //         // this.comment = this.product.comment;
        //         // this.pic1 = this.product.pic1;
            
        //     }else{
        //         alert("エラーが発生しました。しばらくお待ち下さい");
        //     }
        // }
         
        },

    // データをajaxで取得
    mounted: function(){
        axios.get('/shop/ajax/edit', {
            params: {
                product_id: this.product_id,
            }
        }).then(response => {
            this.product = response.data[0];
            this.id = this.product.id;
            this.name = this.product.name;
            this.category_id = this.product.category_id;
            this.price = this.product.price;
            this.exp_date = moment(this.product.exp_date).format('yyyy-MM-DD');
            this.comment = this.product.comment;
            this.pic1 = this.product.pic1;
            
           
        })
        .catch(error => {
            console.log("ERRRR:: ",error.response.data);
            
            });
    },
    computed: {
        // format(){
        //     return this.exp_date ? moment(this.exp_date).format('yyyy-MM-DD') : '';
        // },
        // ...mapGetters({
        //     exp_date: 'exp_date'
        // }),
        // exp_date: {
        //     get(){
        //         return this.exp_date ? moment(this.exp_date).format('yyyy-MM-DD') : '';
        //     },
        //     set(exp_date){
        //        return exp_date;
        //     }
        // }
    },
    // created() {
    //     this.getData();
    // },
};
</script>
