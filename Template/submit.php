<div class="submit-homework__wrap">
                            <div class="submit-homework__left">
                                <div class="submit-homework__left--title">
                                    <div class="submit-homework__left--title-icon">
                                        <i class="fa-solid fa-table-list"></i>
                                    </div>
                                    <div class="submit-homework__left--title--content">
                                        <h1><?php echo $_SESSION['title'] ?></h1>
                                    </div>
                                    
                                </div>
                                <div class="submit-homework__left--time">
                                    <p>Hạn nộp: <?php echo $_SESSION['deadline'] ?></p>
                                </div>
                                <div class="submit-homework__left--score">
                                    <p><?php echo $_SESSION['grade'] ?>/100 Điểm</p>
                                </div>
                                <div class="submit-homework__left--cmt">
                                    <p>Nhận xét của giáo viên: <?php echo $_SESSION['cmtteacher'] ?></p>
                                </div>
                                <div class="submit-homework__left--content">
                                    <p><?php echo $_SESSION['content'] ?></p>
                                </div>
                                <div class="submit-homework__left--file">
                                    
                                <?php
                                
                                    if($files !== null): 
                                    foreach ($files as $file) :

                                    
                                    echo '<a href="'.$file['FILE'] .'" class="submit-homework__left--file-link">
                                        <div class="submit-homework__left--file-link-img">
                                            <img src="asset/img/images.jpg" alt="">
                                        </div>
                                        <div class="submit-homework__left--file-content">
                                            <h3>'. basename($file['FILE']) .'</h3>
                                        </div>
                                    </a>
                                    ';

                                    endforeach; 
                                    endif; 

                                ?>
                                </div>
                                <form class="submit-homework__left--comment" action="?action=cmtstudent" method= "POST">
                                    <p>Nhận xét của lớp học</p>
                                    <textarea class="submit-homework__left--comment-input" name = "cmt"></textarea>
                                    <input type="hidden" name="IdEx" value="$_SESSION['IdEx']">
                                    <input type="hidden" name="title" value="$_SESSION['title']">
                                    <button style="margin-top: 16px;" class="btn" type="submit" >Nhận xét</button>
                                </form>
                                
                            </div>
                            <form class="submit-homework__right" action="?action=submitting" method="POST" enctype="multipart/form-data">
                                <div class="submit-homework__right--title">
                                    <h1>Nộp bài tập</h1>
                                    <!-- chỗ này em muốn nếu đã giao thì màu xánh dương, đã nộp thì xanh, thiếu thì màu đỏ -->
                                    <?php if ($_SESSION['submit'] === 'submitted') {
                                        echo '<p class="submit-homework__right--status"> Đã nộp</p>';
                                    } else {
                                        echo '<p class="submit-homework__right--status"> Đã giao</p>
                                        </div>
                                        <input id="file" class="submit-homework__right__file" type="file" placeholder="Tải lên" name="file[]" multiple ><br><br>
                                <button class="btn" type="submit">Nộp bài</button>';
                                    }?>
                                    
                                </div>
                                
                            </form>
                            
                        </div>

                        
                    </div>
                    
                </div>
            </div>
        </div>