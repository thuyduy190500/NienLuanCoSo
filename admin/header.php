<!-- <?php session_start();?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
    
    .header{
        background-color: rgb(155, 131, 165);
        height: 45px;
    }
    .header a{
        color: while;
        float:right;
        margin-right:20px;
        padding: 10px 0;
        text-decoration:none;
    }
    .navbar{
        padding: 10px 0;
    }
   
    .icon{
        margin:0 10px
    }
    .icon i{
        font-size:19px;
        padding: 0 10px;
        position: relative;
        bottom:8px
    }
    
</style>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>                                        
    
    <div class="content" style="margin-bottom:30px;">
        <div class="table-mg header" >
            <?php if(empty($_SESSION['user'])):?>
                   <?php header("Location: login.php")?>
            <?php else:?>
                <a style="color: white" href="#" data-toggle="popover" data-placement="bottom"><i class="fas fa-user"></i> <?=$_SESSION['user']?></a>
                <div id="popover-content" style="display:none;  ">
                    <ul style="list-style-type: none; font-size:15px; margin:0; padding:0;">
                        <li><a style="color:black" href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>  

            <?php endif; ?>
            <nav class="navbar navbar-light ">
                <form class="form-inline">
                    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                </form>
            </nav>
            <div class="icon">
                <i class="fas fa-home" style="color:white"></i> 
                <i class="fas fa-bell" style="color:white"></i>
                <i class="fas fa-envelope" style="color:white"></i>
            </div>
                
        </div>
    </div>
   
    <!-- popover -->
    <script>
        $("[data-toggle=popover]").popover({
        html: true, 
        content: function() {
            return $('#popover-content').html();
            }
        });
    </script>
    
</body>
</html>