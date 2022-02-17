<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../lichhoc/lichhoc.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        

                <!-- The sidebar -->
        <div class="sidebar">
            <div class="title-sidebar">ADMIN</div>
            <a href="../index.php">Home</a>
            <a href="../hocvien/QLHocVien.php">Quản lý học viên</a>
            <button class="dropdown-btn">Quản lý lớp học
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="#">Anh văn giao tiếp</a>
                <a href="#">Anh văn thiếu nhi</a>
                <a href="#">Toeic</a>
            </div>
            <a href="#contact">Quản lý tài khoản</a>
            <a href="../giangvien/QLGiangVien.php">Quản lý giảng viên</a>
            <a href="../nhanvien/QLNhanVien.php">Quản lý nhân viên</a>
            <a class="active" href="#about">Quản lý điểm</a>
            <a  href="../lichhoc/QLLichHoc.php">Quản lý lịch học</a>

        </div>

        <!-- Page content -->
        <div class="content">
            <div class="content-title">QUẢN LÝ ĐIỂM</div>
            <div class="content-class">
                <div class="dropdown">
                    <button class="dropbtn">Anh Văn Giao Tiếp</button>
                    <div class="dropdown-content">
                        <a href="avgtc1.php">Anh văn giao tiếp cấp 1</a>
                        <a href="avgtc2.php">Anh văn giao tiếp cấp 2</a>
                        <a href="avgtc3.php">Anh văn giao tiếp cấp 3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Anh Văn Thiếu Nhi</button>
                    <div class="dropdown-content">
                        <a href="avtnc1.php">Anh văn thiếu nhi cấp 1</a>
                        <a href="avtnc2.php">Anh văn thiếu nhi cấp 2</a>
                        <a href="avtnc3.php">Anh văn thiếu nhi cấp 3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Toeic</button>
                    <div class="dropdown-content">
                        <a href="toeic1.php">Toeic cấp 1</a>
                        <a href="toeic2.php">Toeic cấp 2</a>
                        <a href="toeic3.php">Toeic cấp 3</a>
                    </div>
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