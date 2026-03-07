<?php include_once "header.php";?>

<div class="wrapper">
    <?php include_once "sidebar.php";?>
    <div class="content-wrapper">
        <div class="main-content">
         <?php include_once "topbar.php";?>
        <div class="body-content">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Ubah Password</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="font-weight-600">Password</label>
                                    <input type="password" class="form-control" name="passwd" aria-describedby="emailHelp" placeholder="Masukkan Password Lama" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="font-weight-600">Password Baru</label>
                                    <input type="password" class="form-control" name="passwd1" aria-describedby="emailHelp" placeholder="Masukkan Password Baru" required>
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="font-weight-600">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="passwd2" aria-describedby="emailHelp" placeholder="Masukkan Password Baru Sekali Lagi" required>
                                </div>
                                <button type="submit" name="btnChange" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once "bottombar.php";?>
        <div class="overlay"></div>
    </div>
</div>

<?php include_once "footer.php";?>

<?php
    if(isset($_POST['btnChange'])){
        $passwd = $_POST['passwd'];
        $passwd1 = $_POST['passwd1'];
        $passwd2 = $_POST['passwd2'];
        if($passwd1<>$passwd2){
            echo "<script type='text/javascript'>alert('Password Baru Dan Konfirmasi Password Harus Sama!')</script>";
        }else{
            $query = "SELECT * FROM tbluser where user_nm='".$_SESSION['user_nm']."' and user_passwd = '".md5($keycode.$passwd)."'";
          //  die($query);
            $result = mysqli_query($link,$query);
            $jlh    =  mysqli_num_rows($result);
            if($jlh>=1){
                $query = "UPDATE tbluser SET user_passwd = '".md5($keycode.$passwd1)."' where user_id='".$_SESSION['user_id']."'";
                $result = mysqli_query($link,$query);
                $page = encrypt(date('Ymd'))."&hal=logout";
                 echo "<script type='text/javascript'>alert('Ubah password Berhasil');window.location='index.php?token=".$page."';</script>";
               
            }else{
               echo "<script type='text/javascript'>alert('Password Lama Tidak Sesuai!')</script>"; 
            }

        }
    }
?>