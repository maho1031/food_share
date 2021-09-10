<p>{{$user->name}}様</p>

<p>下記の商品をご注文いただき、ありがとうございます。</p>

商品内容
<ul>
    <li>商品名：{{$product->name}}</li>
    <li>商品金額：{{$product->price}}円</li>
    <li>店舗名：{{$product->shop->conveni->name}}{{$product->shop->name}}</li>
    <li>住所：{{$product->shop->address}}</li>
</ul>

上記住所の店舗にて商品をご確認後、お支払いをお願いいたします。<br>
この度はHaiki Shareをご利用いただき、誠にありがとうございました。