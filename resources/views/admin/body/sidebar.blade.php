
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('admin.dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <h3><b>WebShop</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li>
          <a href="{{route('admin.dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="#">
            <i data-feather="tablet"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brands</a></li>
          </ul>
        </li> 
		
        <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('add.product')}}"><i class="ti-more"></i>Add Products</a></li>
            <li><a href="{{route('product.manage')}}"><i class="ti-more"></i>Manage Products</a></li>
          </ul>
        </li> 		  
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pending-orders')}}"><i class="ti-more"></i>Pending Orders</a></li>
            <li><a href="{{route('confirmed-orders')}}"><i class="ti-more"></i>Confirmed Orders</a></li>
            <li><a href="{{route('processing-orders')}}"><i class="ti-more"></i>Processing Orders</a></li>
            <li><a href="{{route('shipped-orders')}}"><i class="ti-more"></i>Shipped Orders</a></li>
            <li><a href="{{route('delivered-orders')}}"><i class="ti-more"></i>Delivered Orders</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Payments</a></li>
		  </ul>
        </li>  
		  
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>