<?php session_start();
    require_once ('../../admin/db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sỉ số </title>
    <link rel="stylesheet" href="../style1.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

                <!-- The sidebar -->
        <?php include("../sidebar.php")?>
        <?php include("../header.php")?>


        <!-- Page content -->
        <div class="content">
            <div class="content-title">QUẢN LÝ LỚP HỌC</div>
            <div class="content-class">
                <div class="dropdown">
                    <?php
                        $MaCap=$_GET['MaCap'];
                        $query=mysqli_query($con,"SELECT * from lophoc WHERE  MaCap='$MaCap'");
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <a href="thongtinlophoc.php?MaLop=<?php echo $row['MaLop']?>"  class="dropbtn"><?php echo $row['TenLop']?></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="thongke" style="margin-top:30px">
                <div class="content-title">Lịch học</div>
                <div class="table-mg">
                        <table class="table table-striped">
                            <br>
                            <thead>
                                <tr class="tbl-title"> 
                                    <th scope="col">#</th>
                                    <th scope="col">Mã lớp</th>
                                    <!-- <th scope="col">Tên lớp</th> -->
                                    <th scope="col">Tên giảng viên</th>
                                    <th scope="col">Tên môn</th>
                                    <th scope="col">Phòng</th>
                                    <th scope="col">Thứ</th>
                                    <th scope="col">Giờ bắt đầu</th>
                                    <th scope="col">Giờ kết thúc</th>
                                </tr>
                            </thead>
                            
                            <?php
                                $query=mysqli_query($con,"SELECT * FROM lichhoc, lophoc, caplop, giangvien, monhoc, phonghoc
                                WHERE caplop.MaCap='$MaCap' AND lophoc.MaCap=caplop.MaCap AND lichhoc.MaLop=lophoc.MaLop AND lichhoc.MaGV=giangvien.MaGV AND lichhoc.MaMon=monhoc.MaMon AND phonghoc.MaPhong=lichhoc.MaPhong");
                                $index=1;
                                while($row=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <td><?php echo ($index++);?></td>
                                    <td><?php echo $row['MaLop'];?></td>
                                    <td><?php echo $row['TenGV'];?></td>
                                    <td><?php echo $row['TenMon'];?></td>
                                    <td><?php echo $row['TenPhong'];?></td>
                                    <td><?php echo $row['Thu'];?></td>
                                    <td><?php echo $row['GioBatDau'];?></td>
                                    <td><?php echo $row['GioKetThuc'];?></td>




                                    
                                    
                                    
                                </tr> 
                            <?php      
                                }
                            ?>
                        </table>
                </div>
            </div>    
            
        </div>


        

</body>
</html>