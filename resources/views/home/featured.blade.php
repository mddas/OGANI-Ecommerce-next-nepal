<!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*"><a href="/">All</a></li>
                            @foreach($subcategories as $subcategory)
                            <li data-filter=".{{$subcategory['name']}}"><a name="bottom_product" href="#/searchproduct?name={{$subcategory['name']}}#bottom_product">{{$subcategory['name']}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div id="productajax" class="row featured__filter">
                <!-------products list--->
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product['getSubcategory']['name']}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/product/{{$product['image']}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                               
                                <li><a href="#"><i class="fa fa-shopping-cart" onclick="addToCart({{$product->id}},'/insertcart','add')"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="/shoapdetail?id={{$product['id']}}">{{$product['name']}}</a></h6>
                            <h5>Rs.{{$product['price']}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->


    <!-----foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/product/$product['image']">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                               
                                <li><a href="#"><i class="fa fa-shopping-cart" onclick="addToCart($product->id,'/insertcart','add')"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="/shoapdetail?id=$product['id']">s$product['name']</a></h6>
                            <h5>Rs.$product['price']</h5>
                        </div>
                    </div>
                </div>
                endforeach
                ----end products----->
                