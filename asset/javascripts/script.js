// Hàm hiện phần tử
function toggleElements() {
    for (var i = 0; i < arguments.length; i++) {
        var element = document.getElementById(arguments[i]);
        if (element.style.display === "block") {
            element.style.display = "none";
        } else {
            element.style.display = "block";
        }
    }
}
//hàm hiện phẩn tử mục right
function toggleElements2(elementIdToShow, elementIdToHide) {
    var elementToShow = document.getElementById(elementIdToShow);
    var elementToHide = document.getElementById(elementIdToHide);
    showAll();
    if (elementToShow.style.display === "block") {
        elementToShow.style.display = "none";
        elementToHide.style.opacity = 1;
        
    } else {
        hiddenAll();
        elementToShow.style.display = "block";
        elementToHide.style.opacity = 0.5;
    }
    
    
    
}

function hiddenAll() {
    ["bel-noti", "create-noti", "user-noti"].forEach(function(id) {
        var element = document.getElementById(id);
        if (element) {
            element.style.display = "none";
        }
    });
}
function showAll() {
    ["bel-icon", "create-icon", "user-icon"].forEach(function(id) {
        var element = document.getElementById(id);
        if (element) {
            element.style.opacity = 1;
        }
    });
}
document.addEventListener("click", function(event) {
    if (!event.target.closest('#right')) {
        hiddenAll();
        showAll();
    }
});
// hàm ẩn mật khẩu chưa có con măt, chỉ ân thôi chưa hiện được
let password = document.getElementById('password');
password.type = password.type == 'text' ? 'password' : 'text';
// Hàm chuyển sang trang khác
function redirectToAnotherPage() {
    for (var i = 0; i < arguments.length; i++) {
        var url = arguments[i]; 
        window.location.href = url; 
    }
}
var passwordInput = document.querySelector('.form_sign-up--input[type="password"]');
var toggleButton = document.querySelector('.form-password-toggle');

toggleButton.addEventListener('click', function() {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        
    } else {
        passwordInput.type = 'password';
    }
});

    


