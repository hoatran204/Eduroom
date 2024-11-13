
<div class="grid__column_10">
                        
                        
                    
                        <div class="main">
                            <div class="grid_row">
                            <?php if($classes !== null): ?>
                            <?php foreach ($classes as $class) : ?>
                                <div class="grid__column_class" id="">
                                    <div class="main__class">
                                        <div class="main__class--name">
                                            <h1 id="<?php echo $class['IdClass']; ?>"><?php echo $class['ClassName']; ?></h1>
                                            <form id="form<?php echo $class['IdClass']; ?>" action="?action=intoclass" method="POST" style="display: none;">
                                                <!-- Các trường input ẩn -->
                                                <input  name="id" id="id" value="<?php echo $class['IdClass']; ?>">
                                                <input  name="position" id="position" value="<?php echo $class['Position']; ?>">
                                                <input  name="classname" id="classname" value="<?php echo $class['ClassName']; ?>">
                                                <!-- Thêm các trường input ẩn khác nếu cần -->
                                            </form>
                                            <script>
                                            // Lấy phần tử <h1>
                                            var h1Element = document.getElementById('<?php echo $class['IdClass']; ?>');

                                            // Thêm sự kiện click cho phần tử <h1>
                                            h1Element.addEventListener('click', function() {

                                                // Submit form ẩn
                                                document.getElementById('form<?php echo $class['IdClass']; ?>').submit();
                                            });
                                        </script>
                                            <div class="main__class--name-icon">
                                                <ul>
                                                    <li id="delete_class" class="main__class--name-icon-option">
                                                        <a href="#delete_class", class="main__class--name-icon-option_link">Xoá lớp</a>
                                                        
                                                    </li>
                                                    <li id="rename_class" class="main__class--name-icon-option">
                                                        <a href="#rename_class", class="main__class--name-icon-option_link">Đổi tên lớp</a>
                                                    </li>
                                                    <li id="copy_id_class" class="main__class--name-icon-option">
                                                        <a href="#copy_id_class", class="main__class--name-icon-option_link">Sao chép đường dẫn</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="main__class-content">
                                            <div class="main__class--teacher"><?php echo $class['TeacherName']; ?>
                                            </div>
                                            <div class="main__class--img">
                                                <img src="<?php echo $class['ImageTeacher']; ?>" alt="ảnh lớp">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
               
                        </div>
                    </div>
                    



                </div>
            </div>
        </div>
        <script>
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 3; i++) { // Chỉ sử dụng 3 ký tự HEX cho màu RGB (thay vì 6 ký tự)
                    var darkValue = Math.floor(Math.random() * 128); // Giá trị ngẫu nhiên từ 0 đến 127 (màu tối)
                    var darkHex = darkValue.toString(16); // Chuyển giá trị tối sang HEX
                    color += darkHex.length < 2 ? '0' + darkHex : darkHex; // Đảm bảo rằng HEX có 2 ký tự
                }
                return color;
            }


            let mainClasses = document.getElementsByClassName('main__class--name');
            for (let i = 0; i < mainClasses.length; i++) {
                mainClasses[i].style.backgroundColor = getRandomColor();
            }
        </script>