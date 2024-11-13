<div class="grid__column_10">
                        <div class="form_join_class" name="form_join_class" method="post" action="main.php">
                            <p class="form_join_class__title">Tham gia lớp</p>
                            <form class="form_join_class--content" action="?action=join" method="post">
                            <?php
                                if (isset($_GET['error']) && $_GET['error'] == 'notexits') {
                                    echo '<p class="form_join_class--p">Lớp không tồn tại</p>';
                                }
                                if (isset($_GET['error']) && $_GET['error'] == 'joined') {
                                    echo '<p class="form_join_class--p">Bạn đã có trong lớp</p>';
                                }
                            ?>
                                <input class="form_join_class--input" type="text" name="class_code" placeholder="Mã lớp"><br><br>
                                <button class="btn" type="button" onclick="redirectToAnotherPage('?action=home&id=<?php echo $_SESSION['ID']; ?>')">Hủy</button>
                                <button class="btn" type="submit">Tham gia </button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>