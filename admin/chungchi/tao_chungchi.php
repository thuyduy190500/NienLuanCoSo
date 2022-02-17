<?php
require_once ('../db/connect.php');
if(!empty($_POST)){
    $macc= $_POST['macc'];
    $tencc= $_POST['tencc'];
    $ngaycap= $_POST['ngaycap'];
    $ngayhethan= $_POST['ngayhethan'];
    $mahv= $_POST['mahv'];
    $maloai= $_POST['loailop'];
    $khoahoc= $_POST['khoahoc'];
    $sql="INSERT INTO chungchi values('$macc','$tencc','$ngaycap','$ngayhethan' ,'$maloai','$mahv', '$khoahoc')";
    $result=$con->query($sql);
    if($result==true){
        header('Location:QLChungChi.php');
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
        <div class="h3">Tạo chứng chỉ</div>
        <div class="form">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Mã chứng chỉ</label>
                        <input type="text "  class="form-control" placeholder="Mã chứng chỉ"  name="macc" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3"> 
                        <label >Tên chứng chỉ</label>
                        <input type="text"  class="form-control" placeholder="Tên chứng chỉ"  name="tencc" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Mã học viên</label>
                        <input type="text" class="form-control" placeholder="Mã học viên" name="mahv" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Loại lớp</label>
                        <select class="form-control" name="loailop"  required>
                        <?php
                            $sql= 'select * from loailop';
                            $category=$con->query($sql);
                            foreach($category as $item){?>
                                <option value="<?php echo $item['MaLoai']?>"> <?php echo $item['TenLoai']?>
                                </option>
                            <?php } ?>
                        </select>     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Ngày cấp</label>
                        <input type="date" class="form-control" name="ngaycap" required>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <label >Ngày hết hạn</label>
                        <input type="date" class="form-control" name="ngayhethan" required>
                    </div>
                </div>
                <div class=" my-md-2 my-3"> 
                    <label >Khóa học</label>
                    <select class="form-control" name="khoahoc"  required>
                        <?php
                            $sql= 'select * from khoahoc';
                            $category=$con->query($sql);
                            foreach($category as $item){?>
                                <option value="<?php echo $item['MaKH']?>"> <?php echo $item['TenKH']?>
                                </option>
                            <?php } ?>
                        </select>     
                </div>
                <button name="sbm" type="submit" class="btn btn-primary mt-3">Tạo</button>
            </form>
        </div>
    </div>
</body>
</html>