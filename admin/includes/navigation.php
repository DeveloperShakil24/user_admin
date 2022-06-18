<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <?php //$manuName = basename(__DIR__); ?>
            <li class="active"><a href="index.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo $isInternal == true ? '': 'banner/';?>bannerList.php"><i class="icon-images3"></i> <span>Benners</span></a></li>
            <li><a href="#"><i class="icon-gradient"></i> <span>Services</span></a></li>
            <li><a href="#"><i class="icon-images3"></i> <span>Sections</span></a></li>
            <li><a href="#"><i class="icon-images3"></i> <span>Our Project</span></a></li>
            <li><a href="#"><i class="icon-images3"></i> <span>Our Staff</span></a></li>
            <li><a href="#"><i class="icon-images3"></i> <span>Our Client</span></a></li>
            <li><a href="#"><i class="icon-images3"></i> <span>Contact</span></a></li>
            <li><a href="#"><i class="icon-images3"></i> <span>Contact Massage</span></a></li>
            <li>
                <a href="#"><i class="icon-gear"></i> <span>Back Office Setup</span></a>
                <ul>
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Designation</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                <ul>
                    <li>
                        <a href="#">3 columns</a>
                        <ul>
                            <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- /main -->
        </ul>
    </div>
</div>
<!-- /Main navigation -->