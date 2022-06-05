<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .product{padding-top: 1px;}
    </style>
</head>

<body>
    <!-- Page Preloder---> 
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="/shoaping-cart"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="/userlogin"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <!---
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        ---->
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__language">
                                <div class="fa fa-user"></div>
                                @if(Illuminate\Support\Facades\Auth::check()==1)
                                <div>{{ Auth::user()->name }}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <!--order is user order----->
                                    @if(App\Http\Controllers\CartController::isOrder()>0)
                                    <li><a href="order">Your Order</a></li>
                                    @endif
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                                @else
                                <div><a href="/userlogin">Login</a></div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="/"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="/">Shop Details</a></li>
                                    <li><a href="/">Shoping Cart</a></li>
                                    <li><a href="/">Check Out</a></li>
                                    <li><a href="/">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="/">Blog</a></li>
                            <li><a href="/">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="/shoaping-cart"><i class="fa fa-shopping-bag"></i> <span id="numberOfCart">
                                {{App\Http\Controllers\CartController::getTotalproductInCart()}}
                            </span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>Rs.
                        
                        {{App\Http\Controllers\CartController::getTotalPriceOfUser()}}
                    </span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

<!---hero section---->
@yield('hero')

<!----end hero section---->

<!----categories contents--->
@yield('categories')
<!----end categories section--->

<!----featured start------->
@yield('featured')
<!----feaatured stop--------->

<!-----latest product----->
@yield('latestproduct')
<!------latest product end----->

<!------blog section---->
@yield('blog')
<!------end blog--------->

<!----shoap-detail---->
@yield('shoap-details')
<!------->

<!----shoaping-cart---->
@yield('shoping-cart')
<!--------------------->

<!---checkout---------->
@yield('checkout')
<!---------------------->

<!---searched_grid------>
@yield('searched_grid')
<!---end searched grid-->

<!----user login-------->
@yield('userlogin')
<!----end login--------->

<!----user register----->
@yield('userregister')
<!---------------------->

<!----order------------->
@yield('order')
<!--------------------->

 <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deLete(id,routeUrl){
Swal.fire({
  title: 'Do you want to deLete?',
  showCancelButton: true,
  confirmButtonText: 'Yes',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
        $.ajax({
               type:'GET',
               url:routeUrl,
               //data:{'_tosken' : <php echo csrf_token() ?>, 'id':id},
               data:{'id':id},
               success:function(data) {
                  //$("#msg").html(data.msg);
                  $('#'+id).remove();
                  Swal.fire('deleted Sucess!!', '', 'success')
               }
            });    
  } 
})
}
function addToCart(id,routeUrl,update){
    if($("#quantity").val()>=0){
        var quantity=$("#quantity").val();
    }
    else{
        var quantity=1;
    }
    Swal.fire({
  title: 'Do you want to Add to Cart?',
  showCancelButton: true,
  confirmButtonText: 'Yes',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
        $.ajax({
               type:'GET',
               url:routeUrl,
               //data:{'_token' : <php echo csrf_token() ?>, 'id':id},
               data:{'product_id':id,'quantity':quantity,'update':update},
               success:function(data) {   
                  var count=parseInt($("#numberOfCart").text());             
                  $("#numberOfCart").html(count+1);
                  //$('#'+id).remove();
                  Swal.fire('Added Sucess!!', '', 'success')
               }
            });    
  } 
})
}
</script>
<!----sort by price---->
<script>
function sortByprice(value) {
    if(value == "0"){
        var ascending = true;
    }
    if(value == "1"){
        var ascending = false;
    }
    var sorted = $('.sortprice_products').sort(function(a,b){
        return (ascending ==
               (convertToNumber($(a).find('.price').html()) < 
                convertToNumber($(b).find('.price').html()))) ? 1 : -1;
    });
    ascending = ascending ? false : true;

    $('#sortprice').html(sorted);
}

function convertToNumber(value){
    //alert(value)
    return parseFloat(value.replace('$',''));
}

/*
$(document).ready(function () {
    $('#productajax').html('');
  $.ajax({
        type:"GET",
        url:"/usingajax",
        dataType:"json",
        success: function(response){
            //console.log(response.products)
            $.each(response.products,function(key,product){
                console.log(product['get_subcategory']['name'])
                $('#productajax').append('<!---prorducts------>\
                <div class="col-lg-3 col-md-4 col-sm-6 mix '+product['get_subcategory']['name']+'">\
                    <div class="featured__item">\
                        <div class="featured__item__pic set-bg" data-setbg="/product/'+product["image"]+'">\
                        <img src="/product/'+product["image"]+'">\
                            <ul class="featured__item__pic__hover">\
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>\
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>\
                                <!--insertcart?product_id=product["id"]--->\
                                <li><a href="#"><i class="fa fa-shopping-cart" onclick="addToCart(product->id,"/insertcart","add")"></i></a></li>\
                            </ul>\
                        </div>\
                        <div class="featured__item__text">\
                            <h6><a href="/shoapdetail?id='+product["id"]+'">'+product["name"]+'</a></h6>\
                            <h5>Rs.'+product["price"]+'</h5>\
                        </div>\
                    </div>\
                </div>\
                <!----end products----->');
            });
        }

  });
});
*/
$( "#autocompleteInput" ).keyup(function(event) {
    $('#autocomplete').html("");
    $.ajax({
        type:"GET",
        url:"/searchproduct",
        data:{'name':this.value,'ajax':"true"},
        success: function(datas) {
            $('#autocomplete').append(datas)
            //console.log(datas);
            //content.html(response);
        }
    });
});

function searchSet(setWord){
    $("#autocompleteInput").val(setWord);
}

</script>
<!---end sort by price--->
</body>
</html>
