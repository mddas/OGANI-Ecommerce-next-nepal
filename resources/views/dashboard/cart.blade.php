@extends('layouts.master')

@section('home_content')
   <div class="home_content">
       <div class="left" id="text"><font color="green"><h2>CARRIAGE</h2></font></div>
       @if(Illuminate\Support\Facades\Session::has('insertMessage'))
        <p class="left alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-left: 300px">{{ Illuminate\Support\Facades\Session::get('insertMessage') }}</p>
      @endif
      @if ($errors->any())
    <div class="left alert alert-danger" style="margin-left: 300px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @can("md")
       <div class="left" id="add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="none" data-update="0"><img src="images/Add.png" height="80px" width="80px"></button></div>
    @endcan
    <div class="show">     
      </div>
  <table class="table table-striped"><!--table table-dark table-striped--->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alldata as $data)
    <tr id="{{$data['id']}}">
      <th scope="row">{{$data['id']}}</th>
      <td>{{$data->product->name}}</td>  
      <td>
        <img src="images" alt="image">
      </td>
      <td>{{$data->product->price}}</td>
      <td>{{$data->user->name}}</td>
      <td>
        <a href="#"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-name="$data['name']" data-price="$data['price']" data-description="$data['description']" data-category="$data['category_id']" data-subcategory="$data['subcategory_id']" data-update="1" data-id="$data['id']">Edit</button></a>
        <!----roledelete/?id=$d['id']--->
        <a href="#"><button type="button" class="btn btn-danger" onclick='deLete("{{$data["id"]}}","/cartdelete")'>Delete</button></a>
      </td>
    </tr>
    @endforeach
      
  </tbody>
</table>
<!---------modal------------>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/productadd" method="get">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Title</label>
            <input id="name" type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Description</label>
            <input id="description" type="text" class="form-control" id="recipient-name" name="description">
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input id="price" type="number" class="form-control" name="price">
          </div>
         

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select category</label>
            <select id="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category">
              <option value="null" selected disabled>category name</option>

              @foreach(App\Models\Category::all() as $cat)
              <option value="{{$cat['id']}}">{{$cat['name']}}</option>
              @endforeach      
            </select>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select Sub category</label>
            <select id="subcategory" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="subcategory">
              <option value="null" selected disabled>sub category name</option>
              @foreach(App\Models\Subcategory::all() as $subcat)
              <option value="{{$subcat['id']}}">{{$subcat['name']}}</option>    
              @endforeach  
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">images</label>
            <input type="file" class="form-control" id="recipient-name" name="image">
          </div>

          <!-----radio----->
          <div class="form-check">
               <input class="form-check-input" type="checkbox" name="show" value="1" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                 Show/hides   
             </label>
           </div>
         
         <input id="id" type="hidden" name="id" value="0">

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
      </div>
      <!---Modal close----->
      
    </div>
  </div>
      </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var update = button.data('update');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New User Register md' + recipient)
  //modal.find('.modal-body input').val(recipient)

  if(update=="0"){
    alert("building")
  }
  else if(update=="1") {
    var productName=button.data("name");
    var productCategory=button.data("category");
    var productSubCategory=button.data("subcategory");
    var price=button.data("price");
    var description=button.data("description");
    var id=button.data("id");
    console.log(productSubCategory+"<-sub"+productCategory);

    //

    modal.find('.modal-title').text("Updating Product")
    modal.find('#category').val(productCategory)
    modal.find('#subcategory').val(productSubCategory)
    modal.find('#price').val(price)
    modal.find('#description').val(description)
    modal.find("#name").val(productName);
    modal.find("#id").val(id);


    //modal.find('#update').val(button.data('update'))
/*
    category=button.data('category_id');
    image=button.data('img');
    document.getElementById("mySelect").value=category.trim();//category;
    document.getElementById('modal_image').src="/categoryimage/"+image;
    */
  }
})
</script>

@endsection
