<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu -->
			  @if(Auth::user()->role_id == 1) <!-- Admin -->
			  <ul class="sidebar-menu" data-widget="tree">				
				<li class="{{Request::is('dashboard') ? 'active':''}}">
				  <a href="{{route('dashboard')}}">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Dashboard</span>
				  </a>
				</li>
				<li class="{{Request::is('hotels') ? 'active':''}}">
				  <a href="{{route('hotels.index')}}">
					<i class="fa fa-home"><span class="path1"></span><span class="path2"></span></i>
					<span>Hotels</span>
				  </a>
				</li>
				<li class="{{Request::is('bookings') ? 'active':''}}">
				  <a href="{{route('bookings.index')}}">
					<i class="fa fa-calendar"><span class="path1"></span><span class="path2"></span></i>
					<span>Bookings</span>
				  </a>
				</li>
			  </ul>
			  @else
			  <ul class="sidebar-menu" data-widget="tree">				
				<li class="{{Request::is('user-dashboard') ? 'active':''}}">
				  <a href="{{route('user.dashboard')}}">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Dashboard</span>
				  </a>
				</li>
				<li class="{{Request::is('bookings') ? 'active':''}}">
				  <a href="{{route('user.bookings')}}">
					<i class="fa fa-home"><span class="path1"></span><span class="path2"></span></i>
					<span>Bookings</span>
				  </a>
				</li>
			  </ul>
			  @endif
			  
			  <div class="sidebar-widgets">
				<div class="copyright text-center m-25">
					<p><strong class="d-block">Booking</strong> © 2024 - <script>document.write(new Date().getFullYear())</script> All Rights Reserved</p>
				</div>
			  </div>
		  </div>
		</div>
    </section>
  </aside>