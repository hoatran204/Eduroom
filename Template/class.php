
                        
                        <div class="main-class-detail">
                            <div class="main-class-detail__title">
                                <h1 id="#class_name"><?php echo $_SESSION['ClassName'] ?></h1>
                            </div>
                            <?php
                                if ($_SESSION['Position'] === 'teacher') {
                                    echo '<div class="main-class-detail__post">
                                        <div class="main-class-detail__btn">
                                            <input type="button" name="post" value="Thông báo gì đó cho lớp của bạn" onclick="redirectToAnotherPage(\'?action=createpost\')"><br><br>
                                        </div>
                                    </div>';

                                }
                            ?>
                            
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
        </div>