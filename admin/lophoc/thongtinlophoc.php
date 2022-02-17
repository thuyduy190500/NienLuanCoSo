<?php session_start();
    require_once ('../../admin/db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin lớp học</title>
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
            <div class="content-class">
                <div class="dropdown">
                    <?php
                        $MaLop=$_GET['MaLop'];
                        $query=mysqli_query($con,"SELECT * from lophoc WHERE  MaLop='$MaLop'");
                    ?>
                </div>
            </div>
        <div class="thongke" >
            <div class="content-title">Danh sách học viên</div>
           <div class="table-mg">
                <table class="table table-striped">
                    <br>
                    <thead>
                        <tr class="tbl-title"> 
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th></th>
                            <th scope="col">Mã Học Viên</th>
                            <th scope="col">Tên Học Viên</th>
                            <th scope="col">Nghe</th>
                            <th scope="col">Nói</th>
                            <th scope="col">Viết</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $query=mysqli_query($con,"SELECT *  FROM  lophoc, phieudatcho, hocvien
                        WHERE  lophoc.MaLop='$MaLop' AND lophoc.MaLop=phieudatcho.MaLop AND phieudatcho.MaHV= hocvien.MaHV");
                        $index=1;
                        while($row=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                           
                            <td><?php echo ($index++);?></td>
                            <td style="width:50px "><a style="font-size:15px;background-color:green; color: white; text-decoration:none" href="capnhatdiem.php?MaHV=<?php echo $row['MaHV']?>">Sửa </a></td >
                            <td style="width:50px "><a style="font-size:15px;background-color:red;color: white; text-decoration:none" href="nhapdiem.php?MaHV=<?php echo $row['MaHV']?>">Nhập </i></a></td>
                            <td><?php echo $row['MaHV'];?></td>
                            <td><?php echo $row['TenHV'];?></td>
                            <!-- điểm nghe -->
                            <?php
                                $nghe=mysqli_query($con,"SELECT Diem FROM diem WHERE MaMon='NGHE' AND MaHV='$row[MaHV]'");
                                while($row1=mysqli_fetch_array($nghe)){ 
                            ?>
                            <td><?php echo $row1['Diem'];?></td>
                            <?php 
                                }
                            ?>
                            <!-- điểm nói -->
                            <?php
                                $noi=mysqli_query($con,"SELECT Diem FROM diem WHERE MaMon='NOI' AND MaHV='$row[MaHV]'");
                                while($row2=mysqli_fetch_array($noi)){ 
                            ?>
                            <td><?php echo $row2['Diem'];?></td>
                            <?php 
                                }
                            ?>
                            <!-- điểm viết -->
                            <?php
                                $viet=mysqli_query($con,"SELECT Diem FROM diem WHERE MaMon='VIET' AND MaHV='$row[MaHV]'");
                                while($row4=mysqli_fetch_array($viet)){ 
                            ?>
                            <td><?php echo $row4['Diem'];?></td>
                            <?php 
                                }
                            ?>
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