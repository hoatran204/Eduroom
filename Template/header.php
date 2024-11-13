<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $act = isset($_GET['action']) ? $_GET['action'] : '';
        switch($act) {
            default:
                echo $_SESSION['header'] . " - Eduroom";
                break;
        }
        ?>
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="asset/css/base.css">
    <link rel="stylesheet" href="asset/css/main.css?v = <?php echo time();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/font/fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="asset/javascripts/script.js?v = <?php echo time();?>"></script>
</head>
<body>
    <div class="app_wrap">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list-left">
                        <!-- bấm vào chữ là tải lại  -->
                        <li class="header__navbar--logo"><a href=""><img src="asset/img/eduroom.png"></a></li>
                    </ul>
                    <?php
                    if (isset( $_SESSION['header']))  {
                        switch($_SESSION['header']) {
                            case 'login':
                            case 'signup':
                            case 'newpass':
                            case 'forget':
                                echo '<ul class="header__navbar-list-right" id="right">
                                    <li class="header__navbar--user">
                                        <button href="#" class="header__navbar-user-icon" id="user-icon" onclick="toggleElements2(\'user-noti\',\'user-icon\')"><i class="navbar_icon fa-solid fa-user"></i></button>
                                        <ul class="header__navbar--user-noti" id="user-noti">
                                            <li class="header__navbar--user-noti_select">
                                                <a href="index.php?" class="header__navbar--user-noti_select_link">Đăng nhập</a>
                                            </li>
                                            <li class="header__navbar--user-noti_select">
                                                <a href="index.php?action=signup" class="header__navbar--user-noti_select_link">Đăng ký</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>';
                                break;
                            default:
                            echo "<ul class='header__navbar-list-right' id='right'>
                                        
                                        <li class='header__navbar--create'>
                                            <button href='#' class='header__navbar-create-icon' id='create-icon' onclick=\"toggleElements2('create-noti','create-icon')\"><i class='navbar_icon fa-solid fa-plus'></i></button>
                                            <ul class='header__navbar--create-noti' id='create-noti'>
                                                <li class='header__navbar--create-noti_select'>
                                                    <a href='?action=createclass' class='header__navbar--create-noti_select_link'>Tạo lớp</a>
                                                </li>
                                                <li class='header__navbar--create-noti_select'>
                                                    <a href='index.php?action=joinclass' class='header__navbar--create-noti_select_link'>Tham gia lớp</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class='header__navbar--user'>
                                            <button href='#' class='header__navbar-user-icon' id='user-icon' onclick=\"toggleElements2('user-noti','user-icon')\"><i class='navbar_icon fa-solid fa-user'></i></button>
                                            <ul class='header__navbar--user-noti' id='user-noti'>
                                                <li class='header__navbar--user-noti_select'>
                                                    <strong class='header__navbar--user-noti_select_link'>" . $_SESSION['Name'] . "</strong>
                                                </li>
                                                <li class='header__navbar--user-noti_select'>
                                                    <a href='index.php?action=setting' class='header__navbar--user-noti_select_link'>Cài đặt</a>
                                                </li>
                                                <li class='header__navbar--user-noti_select'>
                                                    <a href='index.php?action=logout' name='logout' class='header__navbar--user-noti_select_link'>Đăng xuất</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>";
                                    break;
                        }
                                
                        } 
                    
                    ?>

                    
                    
                </nav>
                
            </div>
            
        </header>
        