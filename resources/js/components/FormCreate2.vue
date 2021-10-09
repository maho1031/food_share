<template>
    <form>
        <div v-if="successFlg" class="c-flash-message u-mb30">
            <p>{{ this.message }}</p>
        </div>

         <ul v-for="error in errors" class="c-error__list">
                    <li class="c-error__item">
                        <strong>{{ error }}</strong>
                    </li>
            </ul>
       

        <div class="c-inputField u-mb30">
            <label for="name" class="p-productForm__text u-mb10">商品名</label>
            <input 
            type="name" 
            id="name" 
            v-model="name"
         
            class="c-inputField__input @error('name') is-error @enderror">

  
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
            
            >{{category.name}}</option>
            </select>


            <!-- <div class="c-error__item" v-html = errors.category_id></div> -->

            
        </div>

        <div class="c-inputField u-mb30">
            <label for="price" class="p-productForm__text u-mb10">価格</label>
            <input 
            type="number"
            id="price"
            v-model="price"
            
            class="c-inputField__input @error('price') is-error @enderror">

          
        </div>

        <div class="c-inputField u-mb30">
            <label for="exp_date" class="p-productForm__text u-mb10">賞味期限</label>
            <input
            type="date"
            id="exp_date" 
            v-model="exp_date"
           
            class="c-inputField__input @error('exp_date') is-error @enderror">

           >
        </div>

        <div class="c-inputField u-mb30">
            <label for="comment" class="p-productForm__text u-mb10">商品詳細</label>
            <textarea
            id="comment"
            v-model="comment"
            cols="30"
            rows="10" 
            
            class="c-inputField__input @error('comment') is-error @enderror"></textarea>
            <span class="c-inputField__detail">200文字以内</span>

        
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
                    class="c-btn p-btnContainer__btn">登録する</button>
                </div>
    </form>
</template>
<script>
// import {required, maxLength} from 'vuelidate/lib/validators'

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
                pic_errors: [],
                successFlg: false,
                message: null,
                errFlg : false,
                errors: {
                }

        }
    },
   
    methods: {
        // flash_messageの表示フラグ
        isShowMessage: function(){
            this.successFlg = !this.successFlg;
        },

        isShowErrMessage: function(){
            this.errFlg = !this.errFlg;
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
            this.pic_errors = [];
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
            console.log(this.name);
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
                    'ContentType': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        };
        console.log(data.get('name'));

        axios.post('/shop/ajax/store', data, config)
            .then( (response) => {
                
                // flash_message
                this.message = response.data.message;
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

            this.isShowErrMessage();

            // console.log(self.errors);
            this.errors = errors;
            console.log(errors.category_id);
            // this.errors.category_id = errors.category_id;
            console.log(this.errors.category_id);
            console.log(errors.name);
            console.log(errors.price);


    });
        }
    }
}
</script>
