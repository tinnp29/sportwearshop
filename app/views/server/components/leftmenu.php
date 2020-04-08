<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">__hoamattroi</div>
  
  <div class="card-body">
    <h6 class="card-title"><?php echo $this->getSession("firstName") . " " . $this->getSession("lastName"); ?></h6>
    <p class="card-text"><?php echo $this->getSession("roleName"); ?></p>
  </div>

  <div class="list-group">
    <a href="<?php echo BASEURL; ?>/Administrator" class="list-group-item list-group-item-action">
      <i class="material-icons">public</i> Bảng Điều Khiển</a>
    <a href="<?php echo BASEURL; ?>/Profile" class="list-group-item list-group-item-action">
      <i class="material-icons">person_pin</i> Thông Tin Cá Nhân</a>
    <a href="<?php echo BASEURL; ?>/Accounts" class="list-group-item list-group-item-action">
      <i class="material-icons">people</i> Tài Khoản</a>
    <a href="<?php echo BASEURL; ?>/Categories" class="list-group-item list-group-item-action">
      <i class="material-icons">apps</i> Danh Mục Sản Phẩm</a>
    <a href="<?php echo BASEURL; ?>/Products" class="list-group-item list-group-item-action">
      <i class="material-icons">group_work</i> Sản Phẩm</a>
    <a href="<?php echo BASEURL; ?>/News" class="list-group-item list-group-item-action">
      <i class="material-icons">description</i> Bài Viết</a>
    <a href="#" class="list-group-item list-group-item-action">
      <i class="material-icons">timeline</i> Thống Kê</a>
    <a href="#" class="list-group-item list-group-item-action">
      <i class="material-icons">settings</i> Cài Đặt</a>
    <?php if($this->getSession('accountId')): ?>
    <a href="<?php echo BASEURL; ?>/SignIn/logOut" class="list-group-item list-group-item-action">
      <i class="material-icons">power_settings_new</i> Thoát</a>
    <?php endif ;?>
  </div>
</div>