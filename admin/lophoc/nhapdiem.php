<?php session_start(); ?>

<?php
        require_once ('../../admin/db/connect.php');
        $MaHV=$_GET['MaHV'];
        $query=mysqli_query($con,"SELECT * FROM  hocvien, phieudatcho
         WHERE phieudatcho.MaHV = '$MaHV' AND phieudatcho.MaHV=hocvien.MaHV");
        $row=mysqli_fetch_assoc($query);
        $MaLop = $row['MaLop'];
        
?>
<?php
if(!empty($_POST)){
    $mahv= $_POST['mahv'];
    $hoten= $_POST['hoten'];
    $nghe= $_POST['nghe'];
    $noi= $_POST['noi'];
    $viet= $_POST['viet'];
    $result1=$con->query("INSERT INTO diem value ('$MaHV', '$MaLop', 'NGHE', '$nghe')");
    $result2=$con->query("INSERT INTO diem value ('$MaHV', '$MaLop', 'NOI', '$noi')");
    $result3=$con->query("INSERT INTO diem value ('$MaHV', '$MaLop', 'VIET', '$viet')");
    if($result1==true && $result2==true && $result3==true){
        echo'<script> alert("Nhập điểm thành công")</script>';
        // header('Location:thongtinlophoc.php');
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
    <title>Nhập điểm</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style1.css">

</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

    
<div class="wrapper rounded bg-white">
    <div class="h3">Nhập điểm</div>
    <div class="form">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <label >Mã học viên</label>
                    <input type="text " value="<?php echo $row['MaHV'];?>" class="form-control" name="mahv" required>
                </div>
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label >Họ tên</label>
                    <input type="text" value="<?php echo $row['TenHV'];?>" class="form-control"  name="hoten" required >
                </div>
            </div>
            <php ?>
            <div class="row">
                <!-- nghe -->
                <div class=" col-md-3 ">
                    <label >Điểm nghe</label>
                    <input type="text"class="form-control" name="nghe" required>
                </div>
                <!-- nói -->
                <div class=" col-md-3">
                    <label >Điểm nói</label>
                    <input type="text" class="form-control" name="noi" required>
                </div>
                <!-- viết -->
                <div class="col-md-3">
                    <label >Điểm viết</label>
                    <input type="text"  class="form-control" name="viet" required>
                </div>
            </div>
            
            <button name="sbm" type="submit" class="btn btn-primary mt-3">OK</button>
        </form>
    </div>
</div>

        
</body>
</html>