
                        <div class="main-class-detail">
                            <!-- chưa sửa đc chỗ mà thừa thì ... nhưng mà thường thì ít môn dài lắm -->
                            <div class="main-class-detail__title">
                                <h1 id="class_name"><?php echo $_SESSION['ClassName']; ?></h1>
                            </div>
                            <div class="main-class-detail__post">
                                <form action="?action=createnoti" method="POST">
                                    <textarea class="main-class-detail__textarea" name="create_post" ></textarea><br><br>
                                    <div class="submit">
                                        <button class="btn" type="button" onclick="redirectToAnotherPage('?action=class')">Hủy</button>
                                        <button class="btn" type="submit">Đăng</button>
                                    </div>
                                </form>
                            </div>
                            
  

                            <div class="main-class-detail__noti--wrap">
                                <div class="main-class-detail__noti--list">
                                <?php
                                    if($noties !== null): 
                                    foreach ($noties as $noti) : 
                                    echo '<div class="main-class-detail__noti">
                                        <img src="'. $noti['Image'] .'">
                                        <div class="main-class-detail__noti--content">
                                            <p>' . $noti['noti'] . '</p>
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