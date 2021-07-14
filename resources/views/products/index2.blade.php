<html>
    <head>
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    </head>
    <body>
        <div id="app">
            <h1>お笑い芸人リスト</h1>
            @{{ products }}
            <table class="table table-bordered table-hover">
                <tr v-for="product in products">
                    <td v-text="product.name"></td>
                </tr>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script>

            new Vue({
                el: '#app',
                data: {
                    products: {}
                },
                mounted() {
                    var self = this;
                    var url = '/ajax/products';
                    axios.get(url).then(function(response){
                        self.products = response.data;
                    });
                }
            });

        </script>
    </body>
</html>