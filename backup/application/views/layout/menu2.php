
<div class="header">

    <nav class="navbar navbar-default   navbar-mobile bootsnav">

        <div class="container">
 <div class="attr-nav">
                        <ul>
                          
                          <?php if($this->session->userdata('hb_user'))
                            {  ?> 

  <li>
                                <div class="head-login">
                                <a href="<?php echo site_url("LoginController/add_property");?>">Submit Property</a></div></li>
                                <li >
                                <div class="head-login">
                                <a href="<?php echo site_url("LoginController/maintenance");?>">Submit for maintenance</a></div></li>
                                    <li >
                                <div class="head-login">
                                <a href="<?php echo site_url("LoginController/property_list");?>">My Account</a></div></li>
                                    <li >
                                <div class="head-login">
                                <a href="<?php echo site_url("LoginController/logout");?>"><i class="fa fa-sign-out"></i></a></div></li>
                            <?php } else { ?>
                                <li >
                                <div class="head-login">
                                <a href="<?php echo site_url("LoginController/add_property");?>">Submit Property</a></div></li>
                                <li >
                                <div class="head-login">
                                <a href="<?php echo site_url("LoginController/maintenance");?>">Submit for maintenance</a></div></li>
                           <?php } ?>   
                        </ul>
                    </div>

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo site_url("LoginController/index");?>"><img src="<?=base_url()?>assets/img/logo.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu2" id="navbar-menu">
                <ul class="nav navbar-nav " data-in="fadeInDown" data-out="fadeOutUp">
                 
               
                 
                     <li class=""><a href="<?php echo site_url("LoginController/menu");?>">Properties</a></li>
                    <li class=""><a href="<?php echo site_url("LoginController/about");?>">About us</a></li>
                      <li><a href="<?php echo site_url("LoginController/service");?>">Our Services</a></li>
                    <li class=""><a href="<?php echo site_url("LoginController/contact");?>">Contact us</a></li>
                     <?php if($this->session->userdata('hb_user'))
                            {  ?> 

  <li  class="mob-only">
                                <a href="<?php echo site_url("LoginController/add_property");?>">Submit Property</a></li>
                                <li class="mob-only" >
                             
                                <a href="<?php echo site_url("LoginController/maintenance");?>">Submit for maintenance</a></li>
                                    <li class="mob-only" >
                              
                                <a href="<?php echo site_url("LoginController/property_list");?>">My Account</a></li>
                                    <li class="mob-only" >
                              
                                <a href="<?php echo site_url("LoginController/logout");?>"><i class="fa fa-sign-out"></i></a></li>
                            <?php } else { ?>
                                <li class="mob-only" >
                              
                                <a href="<?php echo site_url("LoginController/add_property");?>">Submit Property</a></li>
                                <li  class="mob-only">
                              
                                <a href="<?php echo site_url("LoginController/maintenance");?>">Submit for maintenance</a></li>
                           <?php } ?>  
                     <li><a class="ar" onclick="updateLang('arb')">العربية</a></li>

                </ul>
                
               
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>