<?php
  $a = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
  $b = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
  $c = $_SERVER['SERVER_NAME'];
  $d = '/miniproject/superadmin/pages/';
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo url(); ?>/<?php echo $rootname; ?>dist/img/AdminLTELogo.png" alt="TC"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Super Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo url(); ?>/<?php echo $rootname; ?>dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Rajendra Prasad</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">




            
                <li class="nav-item">
                    <a href="../dashboard/dashboard.php" class="nav-link <?php if( $a == $b.'/dashboard.php' ){ echo "active"; }?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>




                <li class="nav-item has-treeview <?php if( $b == $c.$d.'customer' ){ echo "menu-open"; }?>">
                    <a href="#" class="nav-link <?php if( $b == $c.$d.'customer' ){ echo "active"; }?>">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p> Customer <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="../customer/addcustomer.php" class="nav-link <?php if( $a == $b.'/addcustomer.php' ){ echo "active"; }?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Customer</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../customer/givepermission.php" class="nav-link <?php if( $a == $b.'/givepermission.php' ){ echo "active"; }?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Give Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p> Logout </p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>