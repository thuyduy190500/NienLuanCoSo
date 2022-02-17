<?php session_start();
    require_once ('../../admin/db/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý giảng viên</title>
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
            <a  href="../hocvien/QLHocVien.php">Quản lý học viên</a>
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
            <a class="active" href="../giangvien/QLGiangVien.php">Quản lý giảng viên</a>
            <a   href="../nhanvien/QLNhanVien.php">Quản lý nhân viên</a>
            <a href="../chungchi/QLChungChi.php">Quản lý chứng chỉ</a>
            <a href="../hocphi/dshocphi.php">Quản lý học phí</a>


            <!-- <a   href="../">Quản lý chứng chỉ</a> -->

        </div>
    </div>
    <?php include("../header.php")?>



        <!-- Page content -->
        <div class="content">
            <div class="content-title">DANH SÁCH GIẢNG VIÊN</div>
            <div class="search">
                <form action="" method="GET">
                    <input type="text"  name="search" placeholder="tìm kiếm theo Mã GV">
                    <button class="btn" name="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a href="them_giangvien.php">Thêm giảng viên</a>
           <div class="table-mg">
                <table class="table table-striped">
                    <br>
                    <thead>
                        <tr class="tbl-title"> 
                            <th scope="col"><i  id="icon-setting" class="fas fa-cog"></i></th>
                            <th scope="col">#</th>
                            <th scope="col">Mã giảng viên</th>
                            <th scope="col">Tên giảng viên</th>
                            <th scope="col">Năm Sinh</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Địa chỉ</th>
                        </tr>
                    </thead>
                    <?php
                        function executeResult($sql) {
                            $conn = mysqli_connect('localhost', 'root', '', 'nienluan');
                            $resultset = mysqli_query($conn, $sql);
                            $list      = [];
                            while ($row = mysqli_fetch_array($resultset, 1)) {
                                $list[] = $row;
                            }
                            mysqli_close($conn);
                            return $list;
                        }
                        if(isset($_GET['btn'])){
                            $search = $_GET['search'];
                            $query= "SELECT * FROM giangvien WHERE MaGV='$search'";
                        }else{
                            $query="SELECT * FROM giangvien";
                        }
                        
                        $index=1;
                        $std = executeResult($query);
                        foreach ($std as  $s) {
                            echo'
                            <tr> 
                                <td> 
                                    <a class="setting" href="sua_giangvien.php?MaGV='.$s['MaGV'].'"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="setting" href="xoa_giangvien.php?MaGV='.$s['MaGV'].'"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <td>'.($index++).' </td>
                                <td>'.$s['MaGV'].' </td>
                                <td>'.$s['TenGV'].' </td>
                                <td>'.$s['NamSinh'].' </td>
                                <td>'.$s['SDT'].' </td>
                                <td>'.$s['GioiTinh'].' </td>
                                <td>'.$s['DiaChi'].' </td>
                            </tr>
                            ';
                        }
                    ?>


                    
                </table>
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