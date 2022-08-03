
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
          <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">เพิ่มเมนู</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="menu.php">เมนู</a>
        </li>
        
      </ul>
      
      <div class="navbar-text me-3">
        <?php echo "ชื่อผู้ใช้งาน : " . $_SESSION['username']; ?>
      </div>
      
	  <?php if($_SESSION['username'] == 'admin') { ?>
	  <form class="d-flex me-2">
		<a href="useredit.php" class="btn btn-outline-success">แก้ไขผู้ใช้งาน</a>
	  </form>
	  <?php } ?>
      <form class="d-flex">
        <a class="btn btn-outline-danger" href="index.php?logout='0'">ออกระบบ</a>
      </form>
    </div>
  </div>
</nav>