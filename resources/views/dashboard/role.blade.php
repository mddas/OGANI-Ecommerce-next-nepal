
<!DOCTYPE html> 
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Role Permisson </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .left{
          float:left;
        }
        #add{
          float:right;
        }
        #text{
          margin-top:20px;
        }
        .modal-footer{
          margin-bottom:0px;
        }
        .form-check{
          margin:15px;
          float:left;
        }
    </style>
    </head>
<body>
   <div class="sidebar">
     <div class="logo_content">
       <div class="logo">
         <div class="logo_name">RolePermisson</div>
       </div>
       <i class='bx bx-menu' id="btn"></i>
     </div>
     <ul class="nav_list">
       <li>
          <i class='bx bx-search'></i>
          <input type="text" placeholder="Search...">
          <span class="tooltip">Search</span>
       </li>
       <li>
        <a href="#">
         <i class='bx bx-grid-alt'></i>
         <span class="links_name">DASHBOARD</span>
        </a>
        <span class="tooltip">DSHBOARD</span>
      </li>
       <li>
         <a href="user">
          <i class='bx bx-user'></i>
          <span class="links_name">USERS</span>
         </a>
         <span class="tooltip">USERS</span>
       </li>
       <li>
        <a href="role">
         <i class='bx bx-chat'></i>
         <span class="links_name">ROLE</span>
        </a>
        <span class="tooltip">ROLE</span>
      </li>
      <li>
        <a href="permisson">
         <i class='bx bx-pie-chart-alt-2'></i>
         <span class="links_name">PERMISSON</span>
        </a>
        <span class="tooltip">PERMISSON</span>
      </li>
      <li>
        <a href="setting">
         <i class='bx bx-cog'></i>
         <span class="links_name">SETTING</span>
        </a>
        <span class="tooltip">SETTING</span>
      </li>
     </ul>
     <div class="content">
       <div class="user">
         <div class="user_details">
           <img src="images/profile.jpg" alt="">
           <div class="name_job">
             <!-- <div class="name">Bhaskar Gupta</div>
             <div class="job">Web Designer</div> -->
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out"></i>
       </div>
     </div>
   </div>
   <div class="home_content">
       <div class="left" id="text"><font color="green"><h2>ROLE</h2></font></div>
       <div class="left" id="add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><img src="images/Add.png" height="80px" width="80px"></button></div>
    <div class="show">     
      </div>
  <table class="table table-striped"><!--table table-dark table-striped--->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role Name</th>
      <th scope="col">Permissons</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($allrole as $d)
    <tr>
      <th scope="row">{{$d['id']}}</th>
      <td>{{ $d['name'] }}</td>
      <td><button type="button" class="btn btn-info">Create/Delete/Show</button></td>
      <td>
        <a href="roleedit/?id={{$d['id']}}"><button type="button" class="btn btn-danger">Edit</button></a>
        <a href="roledelete/?id={{$d['id']}}"><button type="button" class="btn btn-danger">Delete</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Register New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insertrole" method="get">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Role Name</label>
            <input type="text" class="form-control" id="recipient-name" name="Name">
          </div>
          <!-----radio----->
          @foreach($permissions as $pd)
          <div class="form-check">
               <input class="form-check-input" type="checkbox" name="permissonlist[]" value="{{$pd['id']}}" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                    {{$pd['name']}}
             </label>
           </div>
         @endforeach

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
      </div>
      
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
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New User Register md' + recipient)
  //modal.find('.modal-body input').val(recipient)
})
</script>
<!---------modal close----->
<script src="main.js"></script>
</body>
</html>

