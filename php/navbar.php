<?php



?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #607EAA;">
  <div class="container">
    <a class="navbar-brand" href="index.php">
		<img src="img/thai-dessert.png" width="45px" height="45px">
	</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#FBFDE5" href="#">Menu</a>
        </li>
        <?php if(isset($_SESSION['username'])) { ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">เพิ่มเมนู</a>
          </li>
        <?php } ?>
    </ul>
        
  <?php if(isset($_SESSION['username'])) { ?>
    <span class="text-muted">Toggleable via the navbar brand.</span>
    <div class="navbar-text me-4" style="color:#FBFDE5">
    ผู้ใช้งาน : <?php echo $_SESSION['username']; ?>
    </div>
    <a href="index.php?logout='0'" class="btn btn-danger">ออกจากระบบ</a>
  <?php } ?>
    </div>
  </div>
</nav>