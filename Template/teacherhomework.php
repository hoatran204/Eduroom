
                        <div class="main-class-detail">
                            <div class="main-class-detail__title">
                                <h1 id="#class_name"><?php echo $_SESSION['ClassName']; ?></h1>
                            </div>

                            <div class="see-homework__wrap">
                            <button class="btn" type="button" onclick= "redirectToAnotherPage('?action=createhomework')">Tạo</button>
                                
                                <div class="see-homework__detail--list">
                                    
                                    <?php
                                    if($exs !== null): 
                                    foreach ($exs as $ex) : 
                                    
                                        echo '<div class="see-homework__detail">
                                        <div class="see-homework__detail--icon">
                                            <i class="fa-solid fa-table-list"></i>
                                        </div>
                                        <div class="see-homework__detail--content">
                                            <p id="' . $ex['IdExercise'] . '">' . $ex['TEXT'] . '</p>
                                            <form id="form' . $ex['IdExercise'] . '" action="?action=grade" method="POST" style="display: none;">
                                                <!-- Các trường input ẩn -->
                                                <input name="id" id="id" value="' . $ex['IdExercise'] . '">
                                                <input name="title" id="title" value="' . $ex['title'] . '">
                                                <input name="deadline" id="deadline" value="' . $ex['Deadline'] . '">
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

                                        <div class="see-homework__detail--time">
                                            <p>Đến hạn ' . $ex['Deadline'] . '</p>
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