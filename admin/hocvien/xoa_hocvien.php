
<?php
        require_once ('../../admin/db/connect.php');
        $MaHV=$_GET['MaHV'];
        $query=mysqli_query($con,"SELECT * FROM hocvien, phieudatcho
         WHERE hocvien.MaHV=phieudatcho.MaHV AND hocvien.MaHV='$MaHV'");
        $row=mysqli_fetch_assoc($query);
?>
<?php
if(!empty($_POST)){
    $mahv= $_POST['mahv'];
    $hoten= $_POST['hoten'];
    $namsinh= $_POST['namsinh'];
    $gioitinh= $_POST['gioitinh'];
    $sdt= $_POST['sdt'];
    $diachi= $_POST['diachi'];
    $malop= $_POST['lophoc'];
    $sql_edit="DELETE FROM phieudatcho WHERE MaHV ='$MaHV'";
    $result2=$con->query($sql_edit);
    $sql="DELETE FROM hocvien WHERE MaHV='$MaHV'";
    $result1=$con->query($sql);
    
    if($result1==true && $result2==true){
        header('Location:QLHocVien.php');
    }
    else{
        echo'xóa không thành công';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa học viên</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style1.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

 
    <div class="wrapper rounded bg-white">
        <div class="h3">Xóa học viên học viên</div>
        <div class="form">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Mã học viên</label>
                        <input type="text " value="<?php echo $row['MaHV']; ?>" class="form-control" name="mahv" required>
                     </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Họ tên</label>
                        <input type="text" value="<?php echo $row['TenHV'];?>" class="form-control"  name="hoten" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Năm sinh</label>
                        <input type="text" value="<?php echo $row['NamSinh'];?>" class="form-control" name="namsinh" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Giới tính</label>
                            <div class="d-flex align-items-center mt-2">
                                <label class="gender"><input type="radio" checked="checked" name="gioitinh" value='<?php echo $row['GioiTinh'];?>' ><?php echo $row['GioiTinh'];?></label>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Số điện thoại</label>
                        <input type="text" value="<?php echo $row['SDT'];?>" class="form-control" name="sdt" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Lớp học</label>
                        <input class="form-control" name="lophoc" value="<?php echo $row['MaLop'];?>" required>
                    </div>
                </div>
                <div class=" my-md-2 my-3"> 
                    <label >Địa chỉ</label>
                    <input type="text" value="<?php echo $row['DiaChi'];?>" class="form-control" name="diachi"required >
                </div>
                <button name="sbm" type="submit" class="btn btn-primary mt-3">Xóa</button>
            </form>
        </div>
    </div>

</body>
</html>