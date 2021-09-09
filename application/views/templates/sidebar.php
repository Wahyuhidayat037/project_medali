<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion d-print-none" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-medal"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= NAMA_APLIKASI ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Dasboard
      </div>

      <!-- Nav Item - Dashboard -->
      <?php if ($this->session->userdata('role_id') == 1) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Home/index'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Kontingen</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
    <?php endif ?>

      <div class="sidebar-heading">
        
      </div>

      <!-- Nav Item - Tables -->
      <?php if ($this->session->userdata('role_id') == 1): ?>
        
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Home/v_cabor'); ?>">
          <i class="fas fa-running fa-fw"></i>
          <span>Cabor</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <?php endif ?>

      <div class="sidebar-heading">
        
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      
      <!-- Nav Item - Tables -->
      <?php if ($this->session->userdata('role_id') == 1): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Home/v_event'); ?>">
          <i class="fas fa-calendar-week fa-fw"></i>
          <span>Event</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">   
      <?php endif ?>   

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      
      <!-- Nav Item - Tables -->
     
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Home/v_rekap'); ?>">
          <i class="fas fa-table fa-fw"></i>
          <span>Rekap</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->