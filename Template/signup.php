<div class="app__wrap">
    <div class="form_sign-up">
        <img class="form_sign-up--logo" src="asset/img/eduroom.png" >
        <p class="form_sign-up__title">Lớp học online</p>
        <form class="form_sign-up--content" name="form_sign-up" action="?action=signup" method="post">
            
            <div class="form-control">
                <input class="form_sign-up--input" type="text" name="email" placeholder="Email"><br>
                <span> <?php echo $error[0] ?></span>
            </div>
            <br>
            <div class="form-control">
                <input class="form_sign-up--input" type="text" name="username" placeholder="Tên tài khoản"><br>
                <span></span>
            </div>
            <br>
            <div class="form-password form-control">
            <input class="form_sign-up--input" type="password" name="password" placeholder="Mật khẩu"><br><br>
                        <div class="form-password-toggle">
                        <i class="fa-regular fa-eye"></i>
                        <div class="form-password-toggleline">

                    </div>
                    </div>
                    <span></span>
                    <br><br>
                </div>
            <a href="index.php">Bạn đã có tài khoản</a>
            <br>
            <button class="btn" type="submit" name="submit">Đăng ký</button>
        </form>
    </div>
</div>
<script>
    var passwordInput = document.querySelector('.form_sign-up--input[type="password"]');
    var toggleButton = document.querySelector('.form-password-toggle');
    var toggleLine = document.querySelector('.form-password-toggleline');

    toggleButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleLine.style.display = 'none'; // Hide the line
        } else {
            passwordInput.type = 'password';
            toggleLine.style.display = 'block'; // Show the line
        }
    });
    var formSignup = document.querySelector('.form_sign-up--content');
    var emailSignup = document.querySelector('.form_sign-up--input[name="email"]');
    var usernameSignup = document.querySelector('.form_sign-up--input[name="username"]');
    var passwordSignup = document.querySelector('.form_sign-up--input[name="password"]');

    function showErrorSignup(input, message) {
        let parent = input.parentElement;
        let span = parent.querySelector('span');
        input.classList.add('error');
        span.innerText = message;
    }

    function showSuccessSignup(input) {
        let parent = input.parentElement;
        let span = parent.querySelector('span');
        input.classList.remove('error');
        span.innerText = '';
    }

    function checkEmptyErrorSignup(listInput) {
        let isEmptyError = false;
        listInput.forEach(input => {
            input.value = input.value.trim();
            if (!input.value) {
                isEmptyError = true;
                showErrorSignup(input, 'Không được để trống');
            } else {
                showSuccessSignup(input);
            }
        });
        return isEmptyError;
    }

    function checkEmailSignup(input) {
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        input.value = input.value.trim();
        let isEmailError = !regexEmail.test(input.value);
        if (isEmailError) {
            showErrorSignup(input, 'Email không hợp lệ');
        } else {
            showSuccessSignup(input);
        }
        return isEmailError;
    }

    function checkLengthSignup(input, min, max) {
        input.value = input.value.trim();
        if (input.value.length < min) {
            showErrorSignup(input, `Phải có ít nhất ${min} ký tự`);
            return true;
        } else if (input.value.length > max) {
            showErrorSignup(input, `Không vượt quá ${max} ký tự`);
            return true;
        }
        showSuccessSignup(input);
        return false;
    }

    formSignup.addEventListener('submit', function(e) {
        
        let isEmptyError = checkEmptyErrorSignup([emailSignup, usernameSignup, passwordSignup]);
        let isEmailError = checkEmailSignup(emailSignup);
        let isPasswordLength = checkLengthSignup(passwordSignup, 3, 20);
        let usernameSignupLength = checkLengthSignup(usernameSignup, 3, 50);
        if (isEmptyError || isEmailError || isPasswordLength || usernameSignupLength) {
            e.preventDefault();
            // Nếu có lỗi, không thực hiện hành động mặc định của form
        } else {
            // Nếu không có lỗi, thực hiện hành động mặc định của form
            formSignup.submit(); // Hoặc thực hiện hành động khác cần thiết
        }
    });
</script>
