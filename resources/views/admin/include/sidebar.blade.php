<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          	<a href="#">
            	<i class="fa fa-dashboard"></i> <span>Dashboard</span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu">
            	<li class="active"><a href="{{route('admin.panel')}}"><i class="fa fa-circle-o"></i>Karim Ecommerce</a></li>
          	</ul>
        </li>
        <li class="treeview">
          	<a href="#">
            	<i class="fas fa-book-reader"></i>
            	<span> Widget</span>
          	</a>
          	<ul class="treeview-menu">
              <li><a href="{{route('headerediting')}}"><i class="fas fa-receipt"></i> Header</a></li>
            	<li><a href="#"><i class="fas fa-book"></i> Footer</a></li>
            	<li><a href="{{route('social_media')}}"><i class="fas fa-share"></i>Social Media</a></li>
          	</ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fas fa-book-reader"></i>
              <span> Page</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('HomePage.index')}}"><i class="fas fa-receipt"></i> Home</a></li>
              <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o text-red"></i> More
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="#"><i class="fa fa-circle-o text-red"></i>Cart</a>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i>Checkout</a>
                  </ul>
              </li>
              <li><a href="#"><i class="fas fa-tshirt"></i>Dress</a></li>
              <li><a href="{{route('admincontact.index')}}"><i class="fas fa-id-badge"></i>Contact</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a href="#">
              <i class="fas fa-shopping-basket" aria-hidden="true"></i>
              <span>Shop</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('category.index')}}"><i class="fas fa-tshirt"></i>Categories</a></li>
              <li><a href="{{route('subcategory.index')}}"><i class="fas fa-tshirt"></i>Sub Categories</a></li>
              <li><a href="{{route('product.index')}}"><i class="fas fa-tshirt"></i>Product</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fas fa-plane-arrival"></i>
              <span> Arrivals</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('Arrivalscategory.index')}}"><i class="fas fa-tags"></i>Category</a></li>
              <li><a href="{{route('Arrivals.index')}}"><i class="fas fa-plane-arrival"></i> All Arrivals </a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-first-order" aria-hidden="true"></i>
              <span> Product Order</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('delivary.index')}}"><i class="fas fa-pause" aria-hidden="true"></i> Panding Order</a></li>
              <li><a href="{{route('ordercomplete')}}"><i class="fas fa-check-circle" aria-hidden="true"></i>Complete Order</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fas fa-book" aria-hidden="true"></i>
              <span> Blog</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('post.index')}}"><i class="fas fa-book" aria-hidden="true"></i> Post</a></li>
              <li><a href="{{route('post-category.index')}}"><i class="fa fa-th-list" aria-hidden="true"></i>Post Category</a></li>
              <li><a href="{{route('post-tag.index')}}"><i class="fas fa-tag" aria-hidden="true"></i> Post Tag</a></li>
            </ul>
        </li>


        <li>
            <a href="{{route('Testimonial.index')}}">
              <i class="fas fa-certificate"></i> <span>Testimonials</span>
            </a>
        </li>

        <li>
            <a href="{{route('user-information.index')}}">
              <i class="fas fa-envelope" aria-hidden="true"></i> <span>All User</span>
            </a>
        </li>

         <li>
            <a href="{{route('admincontact.create')}}">
              <i class="fas fa-envelope" aria-hidden="true"></i> <span>User Message</span>
            </a>
        </li>


        
        <li class="treeview">
          	<a href="#">
            	<i class="fas fa-american-sign-language-interpreting"></i> <span>Communicate</span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu">
            	<li><a href="#"><i class="fa fa-circle-o text-red"></i>Notice Board</a></li>
            	<li class="treeview">
              		<a href="#"><i class="fa fa-circle-o text-red"></i> Send Text
                		<span class="pull-right-container">
                  			<i class="fa fa-angle-left pull-right"></i>
                		</span>
              		</a>
              		<ul class="treeview-menu">
                		<li><a href="#"><i class="fa fa-circle-o text-red"></i>Send Mail/SMS</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i>Send Message</a>
              		</ul>
            	</li>
          	</ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->