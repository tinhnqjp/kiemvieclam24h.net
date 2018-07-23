<!-- Start Navigation -->
<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

    <div class="container">            
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo get_bloginfo( 'wpurl' );?>">
                <img src="<?php echo get_bloginfo( 'template_directory' );?>/assets/img/logo.png" class="logo logo-display" alt="">
                <img src="<?php echo get_bloginfo( 'template_directory' );?>/assets/img/logo-white.png" class="logo logo-scrolled" alt="">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="active">
                    <form action="<?php echo get_bloginfo( 'wpurl' );?>" id="searchform" method="get"> 
                        <input type="text" onfocus="if (this.value == 'Search') {this.value = '';}" 
                            onblur="if (this.value == '') {this.value = 'Search';}" 
                            id="s" name="s" class="form-control" placeholder="Find Freelancer" />
                    </form>
                </li>
                <li class="dropdown megamenu-fw"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Brows</a>
                    <ul class="dropdown-menu megamenu-content" role="menu">
                        <li>
                            <div class="row">
                                <div class="col-menu col-md-3">
                                    <h6 class="title">Main Pages</h6>
                                    <div class="content">
                                        <?php tein_menu('header-menu-1', 'menu-col'); ?>
                                    </div>
                                </div><!-- end col-3 -->
                                <div class="col-menu col-md-3">
                                    <h6 class="title">For Candidate</h6>
                                    <div class="content">
                                        <?php tein_menu('header-menu-2', 'menu-col'); ?>
                                    </div>
                                </div><!-- end col-3 -->
                                <div class="col-menu col-md-3">
                                    <h6 class="title">For Employee</h6>
                                    <div class="content">
                                        <?php tein_menu('header-menu-3', 'menu-col'); ?>
                                    </div>
                                </div>    
                                <div class="col-menu col-md-3">
                                    <h6 class="title">Extra Pages</h6>
                                    <div class="content">
                                        <?php tein_menu('header-menu-4', 'menu-col'); ?>
                                    </div>
                                </div><!-- end col-3 -->
                            </div><!-- end row -->
                        </li>
                    </ul>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="login.html"><i class="fa fa-pencil" aria-hidden="true"></i>SignIn</a></li>
                <li><a href="pricing.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Pricing</a></li>
                <li class="left-br"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signup" class="signin">Sign In Now</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>   
</nav>
<!-- End Navigation -->
<div class="clearfix"></div>