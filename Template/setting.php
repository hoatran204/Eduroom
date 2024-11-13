<div class="grid__column_10">
                        
                        <div class="setting__wrap">
                            <div class="setting__infor">
                            <form class="setting__infor--img" action="?action=set" method="post" enctype="multipart/form-data">
                                <img src="<?php echo $_SESSION['img']; ?>" alt="img_class2" class="setting__infor--image">
                                <input class="setting__infor--change" type="file" name="image">
                                <input type="hidden">
                                <button class="btn" type="submit">Thay đổi</button>
                            </form>

                                <form class="setting__infor--name" action="?action=changename" method="post">

                                    <input type="text" placeholder="Nhập tên mới" name="newname">
                                    <button class="btn" type="submit" >Thay đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>