<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5463FF;">
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
          <a class="nav-link active" aria-current="page" href="index.php" style="color: #ECECEC;">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#ECECEC" href="menu.php">เมนู</a>
        </li>
        <?php if(isset($_SESSION['username'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="add.php" style="color: #ECECEC;">เพิ่มเมนู</a>
          </li>
        <?php } ?>
    </ul>
        
  <?php if(isset($_SESSION['username'])) { ?>
    <div class="navbar-text me-4" style="color:#ECECEC">
  ผู้ใช้งาน : <?php echo $_SESSION['username']; ?>
    </div>
    <a href="index.php?logout='0'" class="btn btn-danger">ออกจากระบบ</a>
    <?php if($_SESSION['username'] == "admin") { ?>
      <a href="user.php" class="btn btn-success ms-2">แก้ไขผู้ใช้งาน</a>
    <?php } ?>
  <?php } ?>
    </div>
  </div>
</nav>