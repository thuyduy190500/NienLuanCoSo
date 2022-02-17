<?php session_start();
    require_once('../admin/db/connect.php');
     if(empty($_SESSION['user'])){
         header("Location: login.php");

     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        
    
                   
            
                <!-- The sidebar -->
        <div class="sidebar">
            <div class="sidebar-content">
                <div class="title-sidebar">ADMIN</div>
                <a class="active" href="#home">Home</a>
                <a href="phieudattamthoi/phieudattamthoi.php">Phiếu đặt chỗ online</a>
                <a href="../admin/hocvien/QLHocVien.php">Quản lý học viên</a>
                <button class="dropdown-btn">Quản lý lớp học
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <?php
                        $query=mysqli_query($con,"select * from loailop  ");
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <a href="lophoc/QLLopHoc.php?MaLoai=<?php echo $row['MaLoai']?>"><?php echo $row['TenLoai'] ?></a>
                    <?php
                        }
                    ?>
                </div>
                <a href="../admin/giangvien/QLGiangVien.php">Quản lý giảng viên</a>
                <a href="../admin/nhanvien/QLNhanVien.php">Quản lý nhân viên</a>
                <a href="chungchi/QLChungChi.php">Quản lý chứng chỉ</a>
                <a href="hocphi/dshocphi.php">Quản lý học phí</a>

                
            </div>
        </div>
        
        <?php include("header.php")?>
        

       <div class="content">
           <div class="img" style="margin: 0 20px" >
                <img src="../image/bieudo.png" alt="" style="width:900px" >
                <div class="" style="margin:50px 0">
                    <img src="../image/Calendar.png" alt="" style="width:420px">
                    <img src="../image/thoitiet.jpg" alt=""  style="width:420px; height:370px">
                </div>
           </div>
           
       </div>

        <!-- SCRIPT DROPDOWN -->
        <script>
            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;
            for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
            });
            }
        </script>

</body>
</html>