<div class="app__wrap">
        <div class="form_login" name="form_login">
            <img class="form_login--logo" src="asset/img/eduroom.png">
            <p class="form_login__title">Lớp học online</p>
            <form class="form_login--content" action="?" method="post">
                <div class="form-control">
                    <input class="form_login--input" type="text" name="emailLogin" placeholder="Địa chỉ email" id = "email">
                    <br>
                    <span></span>
                </div>
                <br>
                    <div class="form-password form-control">
                        <input class="form_login--input " type="password" name="passwordLogin" placeholder="Mật khẩu" id = "password">
                            <div class="form-password-toggle">
                            <i class="fa-regular fa-eye"></i>
                            <div class="form-password-toggleline">
    
                        </div>
                        </div>
                        <br>
                        <span><?php
                        if (isset($error[0])) {
                        echo $error[0] ;
                        }
                        ?></span>
                        <br><br>
                    </div>
                    
                <ul class="form_login--forgotandsignup">
                    <li class="forgot">
                        <a href="?action=forgetpass">Quên mật khẩu?</a>
                    </li>
                    <li class="signup">
                        <a href="?action=signup">Chưa có tài khoản?</a>
                    </li>
                </ul>
                <button class="btn" type="submit" name="submit">Đăng nhập</button>
            </form>
        </div>
    </div>
<script>

    // ẩn hiện password
    var passwordInput = document.querySelector('.form_login--input[type="password"]');
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
// valid form login 
    var email =document.querySelector('#email')
    console.log(email)
    var password =document.querySelector('#password')
    var formLogin =document.querySelector('.form_login--content')
    function showError(input,message){
        let parent = input.parentElement;
        console.log(parent)
        let span  = parent.querySelector('span')
        input.classList.add('error')
        span.innerText = message

    }
    function showSuccess(input){
        let parent = input.parentElement;
        let span  = parent.querySelector('span')
        input.classList.remove('error')
        span.innerText = ''

    }
    function checkEmptyError(listInput){
        let isEmptyError = false;
        listInput.forEach(input => {
            input.value = input.value.trim()
            if(!input.value){
            let isEmptyError = true;
                showError(input,'Không được để trống')
            }
            else{
                showSuccess(input);
            }
        });
        return isEmptyError
    }
    function checkEmail(input) {
    const regexEmail = /(?:[a-z0-9+!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i;
    input.value = input.value.trim();
    let isEmailError = !regexEmail.test(input.value);
    if (isEmailError) {
        showError(input, 'Email không hợp lệ');
    } else {
        showSuccess(input);
    }
    return isEmailError;
}
function checkLengthError(input,min,max){
    input.value = input.value.trim();
    if(input.value.length < min){
        showError(input,`Phải có ít nhất ${min} ký tự`)
        return true
    }
    else if(input.value.length > max){
        showError(input,`Không vượt quá ${max} ký tự`)
        return true
    }
    showSuccess(input)
    return false
}
formLogin.addEventListener('submit', function(e) {
    
    let isEmptyError = checkEmptyError([email, password]);
    let isEmailError = checkEmail(email);
    let isPasswordLength = checkLengthError(password,3,20);
    if(isEmptyError || isEmailError || isPasswordLength){
        e.preventDefault();
    }
    else{
        formLogin.submit();
    }
});
</script>