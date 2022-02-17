<?php
require_once ('admin/db/connect.php');

if(!empty($_POST)){
    $hoten= $_POST['hoten'];
    $namsinh= $_POST['namsinh'];
    $gioitinh= $_POST['gioitinh'];
    $sdt= $_POST['sdt'];
    $diachi= $_POST['diachi'];
    $malop=$_POST['lophoc'];
    $sql="INSERT into datchotamthoi values('','$hoten','$gioitinh','$namsinh',NOW(), '$diachi', '$sdt', '$malop','')";
    $result=$con->query($sql);
    if($result==true){
        echo"<script> alert('Đăng ký thành công')</script>";
    }
    else{
        echo"<script> alert('Đăng ký không thành công')</script>";
        
    }
    

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký đặt chỗ</title>
    <link rel="stylesheet" href="admin/style1.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        
    </style>
</head>
<body style="background-color: rgb(238, 222, 224)">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

<div class="detail" style="text-align:center; padding-top:20px">
    <a href="lichhoc.html" ><i >xem chi tiết lịch học <i class="fas fa-angle-double-right"></i></i></a>
</div>
<div class="wrapper rounded bg-white">
    <div class="h3">Đăng ký đặt chỗ</div>
    <div class="form">
        <form action="" method="POST">
        <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Họ tên</label>
                        <input type="text "  class="form-control"  name="hoten" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Địa chỉ</label>
                        <input type="text"  class="form-control"  name="diachi" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Năm sinh</label>
                        <input type="date" class="form-control" placeholder="" name="namsinh" required>
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
                        <label>Lớp học</label>
                        <select class="form-control" name="lophoc" required>
                            <?php
                                $sql= 'select * from lophoc';
                                $category=$con->query($sql);
                                foreach($category as $item){ ?>
                                    <option value="<?php echo $item['MaLop']?>"> <?php echo $item['TenLop']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Số điện thoại</label>
                        <input type="text" class="form-control"  name="sdt" required>
                    </div>
                    
                </div>
            <button name="sbm" type="submit" class="btn btn-primary mt-3">Đăng ký</button>
        </form>
        
    </div>
</div>
</body>
</html>






