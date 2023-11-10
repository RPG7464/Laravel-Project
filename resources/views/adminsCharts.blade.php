<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="route" id="route" content="{{ route('adminsCharts') }}">
<meta name="route-delete" id="route-delete" content="{{ route('adminsCharts') }}">
<title>Admins page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carts.css') }}">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script>
$(document).ready(function(){
	$(".wish-icon i").click(function(){
		$(this).toggleClass("fa-heart fa-heart-o");
	});
});	
</script>

<script src="{{asset('js/admin_cart.js')}}"></script>
</head>
<body>
	<a href="{{route('logout')}}"><button type="button" class="btn btn-outline-primary me-2" >Salir</button></a>
	<a href="{{route('charts')}}"><button type="button" class="btn btn-outline-primary me-2" >Pagina de compras</button></a>
<div class="registration-form">
        <form action="{{ route ('adminsCharts') }}" method="POST">
            @csrf
            @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
                            
            @endif
            @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>                
            @enderror
            
            @error('price')
            <h6 class="alert alert-danger">{{$message}}</h6>                
            @enderror

            @error('company')
            <h6 class="alert alert-danger">{{$message}}</h6>                
            @enderror

            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="name" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="number" class="form-control item" name="price" id="price" placeholder="Precio">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="company" id="company" placeholder="Compañia">
            </div>
                <button type="submit" class="btn btn-block create-account">Crear un nuevo producto</button>
            </div>
        </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
<div class="container-xl">
	<div class="row">
		<div class="col-md-12">
			<h2>Featured <b>Products</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
			<!-- Carousel indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>   
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<div class="item carousel-item active">
				<div class="row">
                @foreach($products as $product)
						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
								<div class="img-box">
									<img src="/examples/images/products/ipad.jpg" class="img-fluid" alt="">									
								</div>
								<div class="thumb-content">
									<h3 >Compañia</h3>
									<h4 id="product_{{$product->id}}">{{$product->company}}</h4><br>
									<h3>Nombre del producto</h3>
									<h4>{{$product->name}}</h4><br>
									<input id="name_{{$product->id}}" type="hidden" value="{{$product->name}}">
									<input id="company_{{$product->id}}" type="hidden" value="{{$product->company}}">
									<input id="price_{{$product->id}}" type="hidden" value="{{$product->price}}">
																
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<p class="item-price"><strike>420.00</strike> <b>${{$product->price}}.00</b></p>
									<form action="{{route('adminsCharts-delete',['id'=>$product->id])}}" id="form-delete" method="POST">
									@csrf	
									@method('DELETE')
									<button type="submit" class='btn btn-danger'>Delete</button>
									</form>
									<br>
                                    <!-- <a href="#" class='btn btn-warning' data-bs-toggle="modal" data-bs-target="#modalEditar" id="{{$product->id}}">Update</a> -->
									<button class='btn btn-warning' onclick=" launchModal({{$product->id}})">Update</button>

								</div>						
							</div>
						</div>
                        @endforeach
					</div>  
				</div>
			</div>
			<!-- Carousel controls -->
			<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="carousel-control-next" href="#myCarousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal para modificar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="update_form">
          @csrf
          @method('PATCH')
          <div class="mb-3">
            <label for="name"  class="form-label">Nombre</label>
            <input type="text" value="" class="form-control" id="nameup"  name="name" >
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" value="" class="form-control" id="priceup" name="price" >
          </div>
          <div class="mb-3">
            <label for="company" class="form-label">Compañia</label>
            <input type="text" value="" class="form-control" id="companyup" name="company" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>               