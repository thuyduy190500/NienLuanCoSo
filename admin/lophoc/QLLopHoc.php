<?php session_start();
    require_once ('../../admin/db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lớp học</title>
    <link rel="stylesheet" href="../style1.css">
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
                <a  href="../index.php">Home</a>
                <a href="../phieudattamthoi/phieudattamthoi.php">Phiếu đặt chỗ online</a>
                <a  href="">Quản lý học viên</a>
                <button class="dropdown-btn">Quản lý lớp học
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <?php
                        $query=mysqli_query($con,"select * from loailop  ");
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <a href="../lophoc/QLLopHoc.php?MaLoai=<?php echo $row['MaLoai']?>"><?php echo $row['TenLoai'] ?></a>
                    <?php
                        }
                    ?>
                </div>
                <a href="../giangvien/QLGiangVien.php">Quản lý giảng viên</a>
                <a   href="../nhanvien/QLNhanVien.php">Quản lý nhân viên</a>
                <a href="../chungchi/QLChungChi.php">Quản lý chứng chỉ</a>
                <a href="../hocphi/dshocphi.php">Quản lý học phí</a>


            </div>
        </div>
    <?php include("../header.php")?>

        <!-- Page content -->
        <div class="content">
            <div class="content-title">QUẢN LÝ CẤP LỚP</div>
            <div class="content-class">
                <div class="dropdown">
                    <?php
                        $MaLoai=$_GET['MaLoai'];
                        $query=mysqli_query($con,"SELECT * from caplop WHERE  MaLoai='$MaLoai'");
                        while($row=mysqli_fetch_array($query)){
                            $caplop=$row['MaCap'];
                    ?>
                    <a href="SiSoLop.php?MaCap=<?php echo $row['MaCap'] ?>" class="dropbtn"><?php echo $row['TenCap']?></a>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        <div class="thongke" style="margin-top:30px">
            <div class="content-title">Thống kê số lượng học viên</div>
            <div class="table-mg">
                <table class="table table-striped">
                    <br>
                    <thead>
                        <tr class="tbl-title"> 
                            <th scope="col">#</th>
                            <th scope="col">Mã Cấp</th>
                            <th scope="col">Tên Cấp</th>
                            <th scope="col">Số Lượng</th>
                        </tr>
                    </thead>
                    
                    <?php
                       
                        $query=mysqli_query($con,"SELECT DISTINCT caplop.MaCap, caplop.TenCap FROM loailop, caplop, lophoc, phieudatcho
                        WHERE loailop.MaLoai='$MaLoai' AND loailop.MaLoai=caplop.MaLoai AND lophoc.MaCap=caplop.MaCap AND lophoc.MaLop=phieudatcho.MaLop");
                        $index=1;
                        while($row=mysqli_fetch_array($query)){
                            $cap= $row['MaCap'];
                    ?>
                        <tr>
                           
                            <td><?php echo ($index++);?></td>
                            <td><?php echo $row['MaCap'];?></td>
                            <td><?php echo $row['TenCap'];?></td>
                            <td><?php
                                $tong= "SELECT COUNT(phieudatcho.MaHV) as total FROM  phieudatcho, lophoc, caplop WHERE phieudatcho.MaLop=lophoc.MaLop AND lophoc.MaCap= caplop.MaCap AND caplop.MaCap='$cap'";
                                $result=mysqli_query($con,$tong);
                                $data=mysqli_fetch_assoc($result);
                                echo $data['total'];    
                            ?>
                            </td>
                        </tr> 
                    <?php      
                        }
                    ?>
                </table>
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