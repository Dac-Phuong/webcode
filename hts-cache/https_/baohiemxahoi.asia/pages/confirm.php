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