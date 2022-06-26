<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <?php $manuName = basename(__DIR__); ?>
            <li class="<?php if($page=='index'){echo 'active';} ?>"><a href="<?php echo $isInternal == true ?'../' : '';?>index.php""><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <li class="<?php if($page=='banner'){echo 'active';} ?>"><a href="<?php echo $isInternal == true ? '../banner/': 'banner/';?>bannerList.php"><i class="icon-images3"></i> <span>Benners</span></a></li>
            <!-- <li><a href="<?php //echo $isInternal == true ? '': 'banner/';?>bannerList.php"><i class="icon-images3"></i> <span>Benners</span></a></li> -->
            <li class="<?php if($page=='ourProject'){echo 'active';} ?>"><a href="<?php echo $isInternal == true ? '../ourProject/' : 'ourProject/';?>projetcList.php"><i class="icon-office"></i> <span>Our Project</span></a></li>
            <li>
                <a href="#"><i class="icon-gear"></i> <span>Project Category</span></a>
                <ul>
                    <li class="<?php if($page=='projetcCategoryAdd'){echo 'active';} ?>"><a href="<?php echo $isInternal == true ? '../catagory/' : 'catagory/';?>catagoryList.php">Category</a></li>
                    <li><a href="#">Designation</a></li>
                </ul>
            </li>
            <li class="<?php if($page=='services'){echo 'active';} ?>"><a href="<?php echo $isInternal == true ? '../services/': 'services/';?>servicesList.php"><i class=" icon-windows2"></i> <span>Services</span></a></li>
            <li><a href="#"><i class="icon-portfolio"></i> <span>Portfolio</span></a></li>
            <li><a href="#"><i class=" icon-users4"></i> <span>Our Staff</span></a></li>
            <li><a href="#"><i class=" icon-user"></i> <span>Our Client</span></a></li>
            <li class="<?php if($page=='contact'){echo 'active';} ?>"><a href="<?php echo $isInternal == true ? '../contact/' : 'contact/';?>contactList.php"><i class=" icon-bubbles7"></i> <span>Contact Us</span></a></li>
            <li class="<?php if($page=='massages'){echo 'active';} ?>"><a href="<?php echo $isInternal == true ? '../contact_massages/' : 'contact_massages/';?>massagesList.php"><i class="icon-images3"></i> <span>Contact Massage</span></a></li>
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