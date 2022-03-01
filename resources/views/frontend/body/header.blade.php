<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
              <li><a href="{{route('mycart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
              <li><a href="{{route('checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>
              @auth
              <li><a href="{{route('dashboard')}}"><i class="icon fa fa-user"></i>User Profile</a></li>
              @else
              <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login</a></li>
              <li><a href="{{route('register')}}"><i class="icon fa fa-user-plus"></i>Sign up</a></li>
              @endauth
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"><a href="{{url('/')}}"><h1 style="color: white;">WebShop</h1></a></div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form>
                <div class="control-group">
                  <input class="search-field" style="width:80% !important;" placeholder="Search here..." />
                  <a class="search-button" href="#"></a> 
                </div>
              </form>
            </div>
            <!-- /.search-area --> 
          
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> 
          </div>
            <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                <div class="total-price-basket"> <span class="lbl">cart </span> <span class="total-price"> <span class="sign">€</span><span class="value" id="cartSubTotal"></span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div id="miniCart">

                  </div>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total : </span><span class='price' id="cartSubTotal"></span></span><span class='price'>€</span> </div>
                    <div class="clearfix"></div>
                    <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                
                  <li> <a href="{{route('index')}}">Home</a> </li>
                  <li> <a href="">Compare</a> </li>
                  <li> <a href="">Contact us</a> </li>
                  <li> <a href="">About us</a> </li>
      
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
  </header>