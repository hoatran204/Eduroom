
                        <div class="main-class-detail">
                            <!-- chưa sửa đc chỗ mà thừa thì ... nhưng mà thường thì ít môn dài lắm -->
                            <div class="main-class-detail__title">
                                <h1 id="#class_name"><?php echo $_SESSION['ClassName']; ?></h1>
                            </div>

                            <div class="main-class-detail__noti--wrap">
                                <div class="main-class-detail__homework--list">
                                <?php
                                if($exs !== null): 
                                    foreach ($exs as $ex) : 
                                        // Start building the value for the grade input
                                        $gradeValue = '';
                                        $submit = '';
                                        $cmtteacher = '';
                                        if($grades !== null): 
                                            foreach ($grades as $grade) :
                                                $gradeValue .= $grade['Grade']; 
                                                $submit .= $grade['Submitted'];
                                                $cmtteacher .= $grade['CmtTeacher'];
                                            endforeach; 
                                        endif;
                                        
                                        // Echo the HTML with the correct value for the grade input
                                        echo '<div class="main-class-detail__homework">
                                            <div class="main-class-detail__homework--icon">
                                                <i class="fa-solid fa-table-list"></i>
                                            </div>
                                            <div class="main-class-detail__homework--content">
                                                <p id="' . $ex['IdExercise'] . '">' . $ex['TEXT'] . '</p>
                                                <form id="form' . $ex['IdExercise'] . '" action="?action=submit" method="POST" style="display: none;">
                                                    <!-- Các trường input ẩn -->
                                                    <input name="id" id="id" value="' . $ex['IdExercise'] . '">
                                                    <input name="title" id="title" value="' . $ex['title'] . '">
                                                    <input name="deadline" id="deadline" value="' . $ex['Deadline'] . '">
                                                    <input name="content" id="content" value="' . $ex['content'] . '">
                                                    <input name="grade" id="grade" value="' . $gradeValue . '">
                                                    <input name="submitted" value="' . $submit . '">
                                                    <input name="cmtteacher" value="' . $cmtteacher . '">
                                                    <!-- Thêm các trường input ẩn khác nếu cần -->
                                                </form>
                                                <script>
                                                    // Lấy phần tử <p>
                                                    var pElement = document.getElementById("' . $ex['IdExercise'] . '");

                                                    // Thêm sự kiện click cho phần tử <p>
                                                    pElement.addEventListener("click", function() {
                                                        // Submit form ẩn
                                                        document.getElementById("form' . $ex['IdExercise'] . '").submit();
                                                    });
                                                </script>
                                            </div>
                                            <div class="main-class-detail__homework--time">
                                                <p>Đến hạn '. $ex['Deadline'].'</p>
                                            </div>
                                        </div>';
                                    endforeach; 
                                endif; 
                            ?>

                                </div>
                                

                            </div>
               
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>