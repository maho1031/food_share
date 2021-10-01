<template>
    <form>
        <div v-if="successFlg" class="c-flash-message u-mb30">
            <p>{{ this.message }}</p>
        </div>
       <div v-html="errors.category_id"></div>

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
                    <strong>255文字以内で入力してください。</strong>
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
                    <strong>255文字以内で入力してください。</strong>
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
                        <!-- <img v-if="pic1" :src="'../../img/sample-img.jpg'" alt="sampleIcon" class="c-inputField__image js-prev"> -->
                        <img v-show="pic1" :src="pic1" >
                        <img :src="'../../img/sample-img.jpg'" alt="sampleIcon" class="c-inputField__image js-prev">
                    </figure>
                </label>
            </div>
             <ul v-for="error in errors" class="c-error__list">
                    <li class="c-error__item">
                        <strong>{{ error }}</strong>
                    </li>
            </ul>
        </div>

                <div class="p-btnContainer">
                    <button 
                    type="submit" 
                    @click.prevent="submit"
                    class="c-btn p-btnContainer__btn">登録する</button>
                </div>
    </form>
</template>
<script>
import {required, maxLength} from 'vuelidate/lib/validators'

const axios = require('axios');

export default {
    name: 'FormCreate',
    props: {
        // value: { type: Object, required: true},
        categories: { type: Array, required: true},
    },
    data: function(){
        return{
                name: null,
                category_id: null,
                price: null,
                exp_date: null,
                comment: null,
                pic1: [],
                errors: [],
                successFlg: false,
                message: null,
                errors: {}

        }
    },
     // バリデーション
    validations:{       
            name: {
            required,
            maxLength: maxLength(255)
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
            // 選択されたfileの情報を保存しておく
            // const fileList = e.target.files || e.dataTransfer.files;
            // const files = [];
            // for(let i = 0; i < fileList.length; i++){
            //     files.push(fileList[i]);
            // }
            // console.log(fileList);

            // バリデーション
            this.errors = [];
            // // 形式チェック
            if (!['image/jpeg', 'image/png', 'image/gif'].includes(this.pic.type)) {
                this.errors.push('JPEG、PNG、GIF以外は利用できません')
                return false;
            }
            // // ファイルの大きさチェック
            if (this.pic.size > 1024 * 1024) {
                this.errors.push(`ファイルサイズが大きすぎます（${Math.round(this.pic.size / 1024 )}KB）`)
                return false;
            }
            this.createImage(this.pic);
        },
        
        // 画像プレビュー
        createImage: function(file) {
            const reader = new FileReader();
            reader.onload = e => {
                this.pic1 = e.target.result;
            };
            reader.readAsDataURL(file);
            
    },
        // 新規登録
        submit: function(){
            console.log(this.exp_date);
            console.log(this.comment);
            let data = new FormData;
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
        axios.post('/shop/ajax/store', data, config)
            .then( (response) => {
                console.log(response);
                // flash_message
                this.message = response.data.message;
                // this.err = response.data.response;
                this.isShowMessage();
                // 2秒後にメッセージを非表示にする
                setTimeout(this.isShowMessage, 5000);
            })
            .catch(error => {
                console.log("ERRRR:: ",error.response.data)
                console.log("ERRRR:: ",error.response.data.errors)

            var errors = {};

        for(var key in error.response.data.errors) {

            errors[key] = error.response.data.errors[key].join('<br>');

        }

        self.errors = errors;
        console.log(errors.category_id);


    });
        }}
}
</script>
