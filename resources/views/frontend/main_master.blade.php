<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="csrf-token" content="{{ csrf_token() }}" >
<title>WebShop</title>


<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">


<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">


<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home ">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 


<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script tyoe="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{ Session:: get('alert-type', 'info')}}"
    switch(type){
      case 'info':
      toastr.info(" {{Session::get('message')}} ");
      break;

      case 'success':
      toastr.success(" {{Session::get('message')}} ");
      break;

      case 'warning':
      toastr.warning(" {{Session::get('message')}} ");
      break;

      case 'error':
      toastr.error(" {{Session::get('message')}} ");
      break;
    }
    @endif
  </script>

<!-- Add to cart Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname" ></span></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="" class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="pimage">
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item">Product Price: <span id="price"></span>€</li>
              <li class="list-group-item">Product Code: <span id="pcode"></span></li>
              <li class="list-group-item">Brand: <span id="pbrand"></span></li>
              <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="available" style="background: green; color: white;"></span>
                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="color">Color</label>
              <select class="form-control" id="color" name="color">
                
              </select>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" id="quantity" value="1" min="1">
            </div>
            <input type="hidden" id="product_id" >
            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div><!-- end -->

<script type="text/javascript">

  $.ajaxSetup({
    headers:{
      'X_CSRF_TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })


  function productView(id){
    $.ajax({
      type: 'GET',
      url: '/product/view/modal/' + id,
      dataType: 'json',
      success: function(data){
        $('#pname').text(data.product.product_name);
        $('#price').text(data.product.product_price);
        $('#pcode').text(data.product.product_code);
        $('#pbrand').text(data.product.brand.brand_name);
        $('#pimage').attr('src','/'+data.product.product_thambnail);

        $('#product_id').val(id);
        $('#quantity').val(1);

        $('select[name="color"]').empty()
        $.each(data.color, function(key, value){
          $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
        })

        if(data.product.product_quantity > 0){
          $('#available').text('');
          $('#stockout').text('');
          $('#available').text('available');
        }else{
          $('#available').text('');
          $('#stockout').text('');
          $('#stockout').text('stockout');
        }
       
      }
    })
  }



  //add to cart
  function addToCart(){
    var product_name = $('#pname').text();
    var id = $('#product_id').val();
    var color = $('#color option:selected').text();
    var quantity = $('#quantity').val();
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data: {
        color: color,
        quantity: quantity,
        product_name: product_name
      },
      url: "/cart/data/store/"+id,
      success: function(data){
        miniCart()
        $('#closeModal').click();
        
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3500
        })
        if($.isEmptyObject(data.error)){
          Toast.fire({
            type: 'success',
            title: data.success
          })
        }else{
          Toast.fire({
            type: 'error',
            title: data.error
          })
        }
      }
    })
  }


</script>

<script type="text/javascript">

  function miniCart(){
    $.ajax({
      type: 'GET',
      url: '/product/mini/cart',
      dataType: 'json',
      success: function(response){
        var miniCart = ""
        $.each(response.carts, function(key, value){
          $('span[id="cartSubTotal"]').text(response.cartTotal);
          $('#cartQty').text(response.cartQty);
          miniCart += `<div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-4">
                        <div class="image"> <a href="{{url('product/details/'.'${value.id}')}}"><img src="/${value.options.image}" alt=""></a> </div>
                      </div>
                      <div class="col-xs-7">
                        <h3 class="name"><a href="{{url('product/details/'.'${value.id}')}}">${value.name}</a></h3>
                        <div class="price">${value.price}€  * ${value.qty}</div>
                      </div>
                      <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" ><i class="fa fa-trash"></i></button> </div>
                    </div>
                  </div>
                  <!-- /.cart-item -->
                  <div class="clearfix"></div>
                  <hr>`
        })
        $('#miniCart').html(miniCart);
      }
    })
  }

miniCart()

function miniCartRemove(rowId){
  $.ajax({
    type: 'GET',
    url: '/minicart/product-remove/'+rowId,
    dataType: 'json',
    success: function(data){
    miniCart();

    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3500
        })
        if($.isEmptyObject(data.error)){
          Toast.fire({
            type: 'success',
            title: data.success
          })
        }else{
          Toast.fire({
            type: 'error',
            title: data.error
          })
        }
    }

  })
}

</script>

<script type="text/javascript">

function cart(){
        $.ajax({
            type: 'GET',
            url: '/user/get-cart-product',
            dataType:'json',
            success:function(response){
    var rows = ""
    $.each(response.carts, function(key,value){
      $('span[id="subtotal"]').text(response.cartTotal);
          $('#grandtotal').text(response.cartTotal);
        rows += `<tr>
					<td class="romove-item"><button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" title="cancel" class="icon"><i class="fa fa-trash-o"></i></button></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="{{url('product/details/'.'${value.id}')}}">
						    <img src="/${value.options.image}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="{{url('product/details/'.'${value.id}')}}">${value.name}</a></h4>
						<div class="cart-product-info">
											<span class="product-color">COLOR:<span>${value.options.color}</span></span>
						</div>
					</td>
					<td class="cart-product-quantity">
              <div class="form-group">
                ${value.qty > 1
                ?`<button id="${value.rowId}" onclick="cartDecrement(this.id)" class="btn btn-sm btn-danger pull-left"">-</button>`
                :`<button disabled="" class="btn btn-sm btn-danger pull-left"">-</button>`
                }
              

              <button id="${value.rowId}" onclick="cartIncrement(this.id)" class="btn btn-sm btn-success pull-right">+</button>
              <input type="text" class="form-control" id="quantity" disabled="" value="${value.qty}" min="1"style="width: 80px; margin:auto;">
              
            </div>
		      </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">${value.price} €</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">${value.subtotal} €</span></td>
				</tr>` 
        });
                
                $('#cartPage').html(rows);
            }
        })
     }
 cart();

 function cartRemove(id){
  $.ajax({
    type: 'GET',
    url: '/user/cart-remove/'+id,
    dataType: 'json',
    success: function(data){
    cart();
    miniCart();

    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3500
        })
        if($.isEmptyObject(data.error)){
          Toast.fire({
            type: 'success',
            title: data.success
          })
        }else{
          Toast.fire({
            type: 'error',
            title: data.error
          })
        }
    }

  })
}

function cartIncrement(rowId){
  $.ajax({
    type: 'GET',
    url: '/cart-increment/'+rowId,
    dataType: 'json',
    success: function(data){
      cart();
      miniCart();

    }
  })
}

function cartDecrement(rowId){
  $.ajax({
    type: 'GET',
    url: '/cart-decrement/'+rowId,
    dataType: 'json',
    success: function(data){
      cart();
      miniCart();

    }
  })
}

</script>

</body>
</html>