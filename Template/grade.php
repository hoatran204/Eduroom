<div class="grades_students__wrap">
<?php
                            if (isset($_SESSION['IdStudent']) && isset($_SESSION['IdEx']) && isset($_SESSION['NameStudent'] )) {
                                if ($_SESSION['IdStudent'] !== null) { ?>
                            <form class="grades_students__left" action="?action=grade" method="POST">
                                <div class="grades_students__left--name">
                                    <p><?php echo $_SESSION['NameStudent'] ;?></p>
                                </div>
                                <input name='IdStudent1' id='position' type="hidden" value='<?php echo $_SESSION['IdStudent'] ?>'>

                                <div class="grades_students__left--score">
                                    <input type="text" name="grades" id="grades" placeholder="Điểm: <?php echo $_SESSION['Grade'] ;?>/100" required/>
                                </div>
                                <div class="grades_students__left__file--wrap">
                                <?php if ($filestudents !== null) {
                                    foreach ($filestudents as $filestudent) { ?>
                                    <div class="grades_students__left__file">
                                        <div class="grades_students__left__file-icon">
                                            <i class="fa-regular fa-file"></i>
                                        </div>
                                        <a href="<?php echo $filestudent['FILE'] ?>" class="grades_students__left__file--content">
                                            <p><?php echo basename($filestudent['FILE']) ?></p>
                                            <p class="type_doc">Loại tài liệu doc hay word</p>
                                        </a>
                                    </div>
                                    <?php }} ?>
                                </div>
                                
                                <div class="grades_students__left--comment">
                                    <p>Nhận xét cho sinh viên </p>
                                    <textarea class="grades_students__left--comment-input" name="comment" required></textarea>
                                    
                                </div>
                                <button style="margin-top: 16px;" class="btn" type="submit"  >Xác nhận</button>
                            </form>
                            <?php }} ?>
                            <div class="grades_students__right">
                                <div class="statistical__homework">
                                    <div class="statistical__homework--submitted">
                                        <button id="submitted"><?php echo $_SESSION['countsubmit'] ?></button>
                                        <p>Đã nộp</p>
                                    </div>
                                    <div class="statistical__homework--delivered">
                                        <button id="delivered"><?php echo $_SESSION['counthw'] ?></button>
                                        <p>Đã giao</p>
                                    </div>
                                    <div class="statistical__homework--graded">
                                        <button id="graded"><?php echo $_SESSION['countgrade'] ?></button>
                                        <p>Đã chấm</p>
                                    </div>
                                </div>
                                <?php
                                if ($exstudents !== null): 
                                    foreach ($exstudents as $exstudent) :
                                        echo "
                                            <div class='statistical-student__wrap' id='". $exstudent['IdStudent'] . "'>
                                                <div class='statistical-student--title'>
                                                    <h1>Bài tập của học viên</h1>
                                                    <hr></hr>
                                                </div>
                                
                                                <div class='statistical-student'>
                                                    <div class='statistical-student__content'>
                                                        <img src='" . $exstudent['Img'] . "' alt='student_1'>
                                                        <h1>" . $exstudent['Name'] . "</h1>
                                                        
                                                        <p id='status'>". $exstudent['Grade'] . "/100 điểm</p>
                                                    </div>
                                                    <p>Nhận xét: " . $exstudent['CmtStudent'] . "</p>
                                                </div>
                                            </div>
                                            <form id='form" . $exstudent['IdStudent'] . "' action='?action=grade' method='POST' style='display: none;'>
                                                <!-- Các trường input ẩn -->
                                                <input name='IdStudent' id='position' value='" . $exstudent['IdStudent'] . "'>
                                                <input name='Name' id='position' value='" . $exstudent['Name'] . "'>
                                                <input name='grade' id='position' value='" . $exstudent['Grade'] . "'>
                                                <!-- Thêm các trường input ẩn khác nếu cần -->
                                            </form>
                                            <script>
                                                // Lấy phần tử <h1>
                                                var h1Element = document.getElementById('" . $exstudent['IdStudent'] . "');
                                
                                                // Thêm sự kiện click cho phần tử <h1>
                                                h1Element.addEventListener('click', function() {
                                                    // Submit form ẩn
                                                    document.getElementById('form" . $exstudent['IdStudent'] . "').submit();
                                                });
                                            </script>";
                                    endforeach;
                                endif;
                                ?>
                                
                                



                                
                                
                            </div>
                            
                        </div>

                        
                    </div>
                    
                </div>
            </div>
        </div>