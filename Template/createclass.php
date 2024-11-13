
<div class="grid__column_10">
                <div class="form_new_class" name="form_new_class">
                    <p class="form_new_class__title">Tạo Lớp mới</p>
                    <form class="form_new_class--content"method="post" action="?action=createclasses">
                    <?php
                        if (isset($_GET['error']) && $_GET['error'] == 'exist') {
                            echo '<p class="form_new_class--p">Đã tồn tại mã lớp</p>';
                        }
                    ?>
                        <input class="form_new_class--input" type="text" name="class_code" placeholder="Mã lớp" required><br><br>
                        <input class="form_new_class--input" type="text" name="name" placeholder="Tên lớp" required><br><br>
                        <input class="form_new_class--input" type="text" name="online_link" placeholder="Lớp học trực tuyến"><br><br>
                        <button class="btn" type="button" onclick="redirectToAnotherPage('index.php?action=home&id=<?php echo $_SESSION['ID']; ?>')">Hủy</button>
                        <button class="btn" type="submit" >Tạo</button> 
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>