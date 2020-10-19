<aside class="main-sidebar sidebar-dark-primary elevation-1">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Brand Logo -->
    <div class="user-panel mb-3 d-flex">
      <div class="image">
        
        <span class="logo-lg">
          <img src="{{asset('public/honeylogo.gif')}}" class="img-circle elevation-1" alt="Brand Logo">
        </span>
        
        
      </div>
      <div class="info">
        <a href="{{url('/home')}}" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        


@if(Auth::user()->roleStatus==1)



        <!--=====================Plan 2 and plan 5===============================-->
        <li class="nav-item has-treeview">
          <a href="{{url('/home')}}" class="nav-link active">
            
            <p><i class="nav-icon fas fa-home"></i>Admin Dashboard </p>
          </a>
        </li>

<li class="nav-item has-treeview">
          <a href="{{url('admin/escort/feeds')}}" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Feeds</p></a></li>

     <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>General Setting<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.social.media') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Social Media</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('new/user')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Account </p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('user/list')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Account List</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('location/add')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Manage Location</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('slider/add')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Slider Add</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('header/footer')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Header & Footer</p>
              </a>
            </li>
            
            
          </ul>
        </li>

         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Escorts Section<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

             <li class="nav-item">
              <a href="{{url('escort/dropdown')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort Dropdown</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('service/offer')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Service Offer</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('service/offer/assign/list')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Service Offer Assign List</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{url('new/escort')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>New Escort</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('escort/list')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort List</p>
              </a>
            </li>

              <li class="nav-item">
              <a href="{{url('profile')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Image</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('profile/description/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Description</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('profile/list/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile List Line</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('profile/rate/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Rates</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('profile/availability/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Availability</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('profile/tour/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Tour</p>
              </a>
            </li>        
            
            <li class="nav-item">
              <a href="{{ route('faq.client.escort.view') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>FAQ Escort Client</p>
              </a>
            </li>
          </ul>
        </li>

         

         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Main Front Pages<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
           <!--  <li class="nav-item">
              <a href="{{url('home/page')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Home Page</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('home/page')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Explore Cities</p>
              </a>
            </li> -->

             <li class="nav-item">
              <a href="{{url('admin/business/etiquete')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Business Etiquette</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('admin/our/story')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Our Story</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('admin/faq')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>FAQ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/client/relationship')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Client Membership</p>
              </a>
            </li>

        <!--     <li class="nav-item">
              <a href="{{url('profile')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile</p>
              </a>
            </li> -->
            
            
          </ul>
        </li>


<li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Front Footer<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            

             <li class="nav-item">
              <a href="{{url('admin/terms')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Terms & Condition</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{ route('admin.privacyview') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Privacy Statement</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{ route('admin.copy.view') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Copy Right</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.acceptable.view') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Acceptable Usage</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{ route('admin.disclaimerview') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Disclaimer</p>
              </a>
            </li>           
          </ul>
        </li>



 <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Home Details<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{url('home/page')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Independent Escort</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('provider/resource')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Provider Resource</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('professional/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Professional</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('about/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>About</p>
              </a>
            </li>
             

          </ul>
        </li>

   
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Resources Listing<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
              <a href="{{ route('local.resources.admin.view') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Local Resources Listing</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('purchase.marketing.admin.view') }}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Purchase Marketing Blogs</p>
              </a>
            </li>
          </ul>
        </li>



         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Provider Resources<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{url('admin/sex/trafficking')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Stop Sex Trafficking</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('admin/local/resources')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Free Local Resources</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('admin/purchase/marketing')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Purchase Marketing</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/become/escort')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Become an Escort</p>
              </a>
            </li>
            

      
            
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Blogs<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          
              <li class="nav-item">
              <a href="{{url('profile/blog/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort Profile Blog</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('admin/blog')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Client Bloging Corner</p>
              </a>
            </li>
          
            
            
          </ul>
        </li>





 <!-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Professionals Platform<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{url('admin/blog')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Real Escort Reviews</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('admin/blog')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Honey News & Blog</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('profile')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort Tours</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/blog')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Escort Bloging Corner</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('escort/list')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Search Escort</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('admin/blog')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Client Bloging Corner</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('admin/business/etiquete')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Business Etiquete</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('admin/terms')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Terms & Condition</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('admin/our/story')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Our Story & Promise</p>
              </a>
            </li>

          
            
            
          </ul>
        </li> -->

        


@elseif(Auth::user()->roleStatus==2)



        <!--=====================Plan 2 and plan 5===============================-->
        <li class="nav-item has-treeview">
          <a href="{{url('/home')}}" class="nav-link active">
            
            <p><i class="nav-icon fas fa-home"></i>Escort Dashboard </p>
          </a>
        </li>



         <li class="nav-item has-treeview  menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>{{Auth::user()->name}}<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{url('escort/modify/'.Auth::user()->id)}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Settings</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('profile')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Details</p>
              </a>
            </li>

     

            
            
            
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="{{url('admin/escort/feeds')}}" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Feeds</p></a></li>

      <li class="nav-item has-treeview">
          <a href="{{url('admin/blog')}}" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Blog</p></a></li> 

         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>Profile Details<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{url('profile')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Image</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('profile/description/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Description</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('profile/list/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile List Line</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('profile/rate/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Rates</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('profile/availability/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Availability</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('profile/tour/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Tour</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="{{url('profile/blog/admin')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Blog</p>
              </a>
            </li>

          </ul>
        </li>

@elseif(Auth::user()->roleStatus==3)


 <!--=====================Plan 2 and plan 5===============================-->
        <li class="nav-item has-treeview">
          <a href="{{url('/home')}}" class="nav-link active">
            
            <p><i class="nav-icon fas fa-home"></i>Client Dashboard </p>
          </a>
        </li>



         <li class="nav-item has-treeview  menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-angle-double-right"></i>
            <p>{{Auth::user()->name}}<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Settings</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{url('profile')}}" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>Profile Details</p>
              </a>
            </li>

     

            
            
            
          </ul>
        </li>




@else


@endif







        
        
        <li class="nav-item has-treeview">
          <a href="{{ route('admin.logout') }}" class="nav-link">
            
            <p style="color: #9d0000;"> <i class="fa fa-key"></i> {{ __('Logout') }}</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>