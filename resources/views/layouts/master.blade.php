
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
		.modal-backdrop{
			z-index: 9  ;
		}
		.modal-footer{
			margin-bottom:0px;
		}
		.form-check{
			margin:15px;
			float:left;
		}
		.sidebar{
			width:112px;
		}
		.home_content{
			left:100px;
		}
		#log_out{
			left:64%;
		}
		.sidebar #btn{
			left:64%;
		}
		.form-group{
			font-size: 16px;
		}
		/*
		.dropdown_category{
			display: none;
			color: white;
			position: absolute;
			z-index: 1;
		}
		#SETTING{
			position: relative;
		  display: inline-block;
		}

		#SETTING:hover .dropdown_category{display: block;}
		*/

	</style>
<!-----ajax------>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!----sweetalert----->

</head>
<body>
 <div class="sidebar">
	 <div class="logo_content">
		 <div class="logo">
			 <div class="logo_name">RolePermisson</div>
		 </div>
		 <i class='bx bx-menu' id="btn"></i>
	 </div>
	 <ul class="nav_list" id="meNu">
		 <li class="not">
			<i class='bx bx-search'></i>
			<input id="myInput" type="text" placeholder="Search...">
			<span class="tooltip">Search</span>
		</li>
		<li class="yes">
			<a href="/dashboard">
			 <i class='bx bx-grid-alt'></i>
			 <span class="links_name">DASHBOARD</span>
		 </a>
		 <span class="tooltip">DSHBOARD</span>
	 </li>
	 <li class="yes">
		 <a href="user">
			<i class='bx bx-user'></i>
			<span class="links_name">USERS</span>
		</a>
		<span class="tooltip">USERS</span>
	</li>
	<li class="yes">
		<a href="role">
		 <i class='bx bx-chat'></i>
		 <span class="links_name">ROLE</span>
	 </a>
	 <span class="tooltip">ROLE</span>
 </li>
 <li class="yes">
	<a href="permisson">
	 <i class='bx bx-pie-chart-alt-2'></i>
	 <span class="links_name">PERMISSON</span>
 </a>
 <span class="tooltip">PERMISSON</span>
</li>
<li class="yes" id="category">
	<a href="/category">
	 <i class='bx bx-cog'></i>
	 <span class="links_name">CATEGORY</span>
 </a>
 <span class="tooltip">CATEGORY</span>

</li>

<li class="yes" id="subcategory">
	<a href="/subcategory">
	 <i class='bx bx-cog'></i>
	 <span class="links_name">SUBCATEGORY</span>
 </a>
 <span class="tooltip">SUBCATEGORY</span>

</li>

<li class="yes" id="subcategory">
	<a href="/product">
	 <i class='bx bx-cog'></i>
	 <span class="links_name">PRODUCT</span>
 </a>
 <span class="tooltip">PRODUCT</span>
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
				<!-- <a href="#" class='bx bx-log-out' id="log_out" style="text-decoration: none;"></a>
				 <div class='bx bx-log-out' id="log_out">{{ Auth::user()->name }}</div>--->
				 
				 <form method="POST" action="{{ route('logout') }}">
					@csrf
					<x-dropdown-link :href="route('logout')"
					onclick="event.preventDefault();
					this.closest('form').submit();">
					<button href="#" class='bx bx-log-out' id="log_out" style="text-decoration: none;"></button>
				</x-dropdown-link>
			</form>
		</div>
	</div>
</div>

<div class="contents">
			@yield('home_content')
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="main.js"></script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".yes").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
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
               //data:{'_token' : <php echo csrf_token() ?>, 'id':id},
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
</script>
</body>
</html>