<?php
require_once ('../../admin/db/connect.php');
if(!empty($_POST)){
    $magv= $_POST['magv'];
    $hoten= $_POST['hoten'];
    $namsinh= $_POST['namsinh'];
    $gioitinh= $_POST['gioitinh'];
    $sdt= $_POST['sdt'];
    $diachi= $_POST['diachi'];
    $sql="insert into giangvien values('$magv','$hoten','$namsinh','$sdt','$gioitinh','$diachi')";
    $result=$con->query($sql);
    if($result==true){
        header('Location:QLGiangVien.php');
    }
    else{
        echo'thêm không thành công';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giảng viên</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style1.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

    <div class="wrapper rounded bg-white">
        <div class="h3">Thêm giảng viên</div>
        <div class="form">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Mã giảng viên</label>
                        <input type="text "  class="form-control"  name="magv" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Họ tên</label>
                        <input type="text"  class="form-control"  name="hoten" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Năm sinh</label>
                        <input type="text" class="form-control" placeholder="yy/mm/dd" name="namsinh" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Giới tính</label>
                            <div class="d-flex align-items-center mt-2">
                                <label class="gender"><input type="radio" name="gioitinh" value='Nam' >Nam</label>
                                <label class="gender"> <input type="radio" name="gioitinh" value='Nu'>Nữ </label>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" required>
                    </div>
                    
                </div>
                <div class=" my-md-2 my-3"> 
                    <label >Địa chỉ</label>
                    <input type="text"  class="form-control" name="diachi"required >
                </div>
                <button name="sbm" type="submit" class="btn btn-primary mt-3">Thêm</button>
            </form>
        </div>
    </div>
</body>
</html>