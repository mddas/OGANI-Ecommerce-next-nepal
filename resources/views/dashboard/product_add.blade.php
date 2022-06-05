@extends("layouts.master")
@section("product_add")

    <div class="home_content" style="overflow-y:scroll;">
<div class="humberger__menu__logo" style="margin-left: 45%;">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>

<div class="row">
  <form action="productinsert" method="get" enctype="multipart/form-data">
            @csrf

  <div class="col-6 product-floatleft">   
  <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            
        </x-slot>

            <!-- Email Address -->
            <div>
                <span>Product Name</span>
                <input id="productname" class="block mt-1 w-full" type="text" name="name" required autofocus>
            </div>

            <div>
                <span>Category</span>
                <select id="category" onchange="getSubCategory(this.value)" class="block mt-1 w-full" aria-label=".form-select-lg example" name="category">
              <option value="null" selected disabled>category name</option>

              @foreach(App\Models\Category::all() as $cat)
              <option value="{{$cat['id']}}">{{$cat['name']}}</option>
              @endforeach      
            </select>
            </div>

            <div>
                <span>SubCategory Name</span>
                <select id="subcategorySelect" class="block mt-1 w-full" aria-label=".form-select-lg example" name="subcategory">
            </select>
            </div>

            <div>
                <span>Brand</span>
                <input id="brand" class="block mt-1 w-full" type="text" name="brand" autofocus>
            </div>
            <div class="row">
              <div class="col">
            <div>
                <span>Unit Price</span>
                <select class="block mt-1 w-full" name="unit_price">
                  <option value="pieces">pieces</option>
                  <option value="kg">kg</option>
                </select>
            </div>
          </div>
          <div class="col">
            <div>
                <span>Price</span>
                <input id="price" class="block mt-1 w-full" type="number" name="price" autofocus>
            </div>
          </div>
        </div>

            <div>
                <span>Image</span>
                <input type="file" class="block mt-1 w-full" id="recipient-name" name="image">
            </div>                 

            
    </x-auth-card>
</x-guest-layout> 
  </div>

  <div class="col-6 product-floatleft"> 
  <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>
            <!-- Email Address -->
            <!---row start----->
            <div class="row">
              <div class="col">
                <div>
                <span>Discount type</span>
                <select class="block mt-1 w-full" name="discount_type">
                  <option value="percent">percen</option>
                  <option value="flat">flat</option>
                </select>
            </div>
              </div>
              <div class="col">
                <div>
                <span>Discount</span>
                <input id="discount" class="block mt-1 w-full" type="text" name="discount" autofocus>
            </div>
              </div>
            </div>

            <!---row end--->
            <div class="row">
              <div class="col">
                <div>
                <span>Tax type</span>
                <select class="block mt-1 w-full" name="tax_type">
                  <option value="percent">percent</option>
                  <option value="flat">flat</option>
                </select>
            </div>
              </div>
              <div class="col">
                <div>
                <span>Tax</span>
                <input id="tax" class="block mt-1 w-full" type="number" name="tax" autofocus>
            </div>
              </div>
            </div>        

            

            <div>
                <span>Quantity</span>
                <input id="quantity" class="block mt-1 w-full" type="number" name="quantity" autofocus>
            </div>

            <div>
                <span>description</span>
                <input id="description" class="block mt-1 w-full" type="text" name="description" autofocus>
            </div>

            <div>
                <span>shipping_type</span>
                <select class="block mt-1 w-full" name="shipping_type">
                  <option value="cod">COD</option>
                  <option value="ESEWA">E-sewa</option>
                </select>
            </div>
            <div>
                <span>shipping cost</span>
                <input id="shipping_cost" class="block mt-1 w-full" type="number" name="shipping_cost" autofocus>
            </div>
    </x-auth-card>
</x-guest-layout>   
  </div>

  <div class="col-sm">    
  </div>

  <div class="row">
    <div class="col-4" style="background-color: rgb(243 244 246);">
      
    </div>
    <div class="col-4">
      <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#" style="margin-right: 50px;">
                        {{ __('Reset') }}
                    </a>

                <x-button class="ml-3">
                    {{ __('Submit') }}
                </x-button>
            </div>
    </div>
    <div class="col-4" style="background-color: rgb(243 244 246);">
      
    </div>

  </div>
</form>
</div>

</div>
<script>
  function getSubCategory(id){
    $('#subcategorySelect').html('')
    $.ajax({
        type:"GET",
        url:"/getsubcategory_by_category_id",
        data:{'id':id},
        success: function(datas) {
         $.each(datas , function(key , data){
         // console.log(datas);
          $('#subcategorySelect').append("<option value='"+data['subcategory_id']+"'>"+data['get_sub_category']['name']+"</option>");

         });
           //
            //console.log(datas);
            //content.html(response);
            //alert(datas);
        }
    });
  }
</script>

    @endsection