
<?php
        require_once ('../../admin/db/connect.php');
        $MaCap=$_GET['MaCap'];
        $query=mysqli_query($con,"SELECT * FROM hocphi, caplop
         WHERE hocphi.MaCap = caplop.MaCap AND hocphi.MaCap ='$MaCap'");
        $row=mysqli_fetch_assoc($query);
?>
<?php
if(!empty($_POST)){
    $macap= $_POST['macap'];
    $tencap= $_POST['tencap'];
    $hocphi= $_POST['hocphi'];
    $ngayad= $_POST['ngayad'];
    $result=$con->query("UPDATE hocphi SET HocPhi='$hocphi', NgayApDung='$ngayad'  WHERE MaCap='$MaCap' ");
    if($result==true ){
        header('Location:dshocphi.php');
    }
    else{
        echo'sửa không thành công';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật học viên</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style1.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

    <div class="wrapper rounded bg-white">
        <div class="h3">Cập nhật học phí</div>
        <div class="form">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Mã cấp</label>
                        <input type="text " value="<?php echo $row['MaCap']; ?>" class="form-control" name="macap" required>
                     </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Tên cấp</label>
                        <input type="text" value="<?php echo $row['TenCap'];?>" class="form-control"  name="tencap" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Học phí</label>
                        <input type="text" value="<?php echo number_format ($row['HocPhi']) ;?>" class="form-control" name="hocphi" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Ngày áp dụng</label>
                        <input type="date" value="<?php echo $row['NgayApDung'];?>" class="form-control" name="ngayad" required>
                    </div>
                </div>
                <button name="sbm" type="submit" class="btn btn-primary mt-3">Cập nhật</button>
            </form>
        </div>
    </div>

</body>
</html>