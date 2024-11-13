<div class="app__wrap">
        <div class="form_reset_password" name="form_reset_password" method="post" action="main.php">
            <img class="form_reset_password--logo" src="asset/img/eduroom.png">
            <p class="form_reset_password__title">Lớp học online</p>
            <p style="font-size: 15px;"><strong>Hãy nhập mật khẩu mới</strong></p>
            <form class="form_reset_password--content" action="?action=newpasss" method="post">
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'invalid_password') {
                    echo '<p class="form_reset_password--p" class="form__account_authentication--p">Bạn đã nhập mật khẩu cũ</p>';
                }
                ?>
                <input class="form_reset_password--input" type="password" name="newpassword" placeholder="Mật khẩu mới" required><br><br>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'repeat_password') {
                    echo '<p class="form_reset_password--p" class="form__account_authentication--p">Mật khẩu xác thực không trùng khớp</p>';
                }
                ?>
                <input class="form_reset_password--input" type="password" name="repeatpassword" placeholder="Nhập lại mật khẩu mới" required><br><br>
                <button class="btn" type="submit" >Đổi</button>
            </form>
        </div>
    </div>