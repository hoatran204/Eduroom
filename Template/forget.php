<div class="app__wrap">
    <div class="form__account_authentication" name="form__account_authentication" >
        <img class="form__account_authentication--logo" src="asset/img/eduroom.png">
        <p class="form__account_authentication__title">Lớp học online</p>
        <p style="font-size: 15px;"><strong>Hãy nhập email để nhận mã xác thực</strong></p>
        <form class="form__account_authentication--content" action="?action=sendEmail" method="post">
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 'notexits') {
                    echo '<p class="form__account_authentication--p">Email không chính xác</p>';
                }
            ?>
            <input class="form__account_authentication--input" type="email" name="emailAccount" placeholder="Email" required><br><br>
            <!-- <input class="form__account_authentication--input" type="text" name="name" placeholder="  Mã xác thực"><br><br> -->
            <button class="btn" type="submit">Nhận mã</button>
        </form>
        <?php
        if (isset($_GET['email']) && $_GET['email'] == 'successfull') {
            if (isset($_GET['error']) && $_GET['error'] == 'incorrect') {
                echo '<p class="form__account_authentication--p">Mã không chính xác</p>';
            }
            echo '<form class="form__account_authentication--content" method="post" action="?action=forgetting">
                
                <input class="form__account_authentication--input" type="text" name="verification_code" placeholder="Mã xác thực" required><br><br>
                <button class="btn" type="submit">Gửi</button>
            </form>';
        }
        ?>
        
    </div>
</div>