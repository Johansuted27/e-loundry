<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Dashboard - Anis Laundry</title>

    <!-- vendor css -->
    <link href="<?php echo base_url('/dashboard/lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/dashboard/lib/Ionicons/css/ionicons.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/dashboard/lib/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/dashboard/lib/jquery-switchbutton/jquery.switchButton.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/dashboard/lib/datatables/jquery.dataTables.css') ?>" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?php echo base_url('/dashboard/css/bracket.css') ?>">

  </head>

  <body>

    
    <div class="br-logo"><a href="<?php echo base_url('/') ?>"><span>Anis Laundry</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <!-- <a href="" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a> -->
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
            <span class="menu-item-label">Data Master</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="<?= route_to('userIndex') ?>" class="nav-link">Users</a></li>
        </ul>
        <!-- <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">UI Elements</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
          <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
          <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
          <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
          <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
          <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
          <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
          <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
          <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
          <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
          <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
        </ul> -->
      </div><!-- br-sideleft-menu -->
    </div><!-- br-sideleft -->

    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div>
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">Admin</span>
              <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="<?php echo base_url('/logout') ?>"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    
    <div class="br-mainpanel">
      <?= $this->renderSection('content') ?>
    </div>


    <script src="<?php echo base_url('/dashboard/lib/jquery/jquery.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/popper.js/popper.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/bootstrap/bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/moment/moment.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/jquery-ui/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/jquery-switchbutton/jquery.switchButton.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/peity/jquery.peity.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('/dashboard/lib/datatables-responsive/dataTables.responsive.js') ?>"></script>

    <script src="<?php echo base_url('/dashboard/js/bracket.js') ?>"></script>

    <script>
        $(function(){
            'use strict';

            $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
            });
        });
    </script>
    
  </body>
</html>
