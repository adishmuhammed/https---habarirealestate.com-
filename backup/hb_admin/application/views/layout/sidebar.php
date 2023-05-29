<?php $user=$this->session->userdata('userLogin'); ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     
      <span class="brand-text font-weight-light">HABARI Realestate</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info">
       <a href="#" class="d-block">   Hi -  <?=$user['re_username']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         
         <li class="nav-item">
          <a href="<?php echo site_url("UserController/dashboard");?>" class="nav-link">
              <i class="fas fa-house-user"></i>
              <p>
                DashBoard
                
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            
            <a href="#" class="nav-link">
              <i class="fa fa-bed"></i>
              <p>
                RealEstate
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              

              
              
              
              </ul>
              <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo site_url("PropertyController/viewProperty");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Property</p>
                </a>
              </li>

              
              
              
              </ul>
              
              <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo site_url("Testimonial/testimonialList");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonial</p>
                </a>
              </li>

              
              </ul>
              
               <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo site_url("Banner/bannerList");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>

              
              </ul>
              
              
               <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo site_url("UserController/usersList");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>

              </ul>
              
              <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo site_url("Subadmin");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subadmins</p>
                </a>
              </li>

              </ul>
              
              
              <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo site_url("FeatureController/viewFeature");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Features</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url("FacilityController/viewFacility");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facilities</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url("TypeController/viewType");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url("UserController/viewCategory");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>

              
              
              
              </ul>
            </li>
              </ul>
            </nav>
            
         <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>