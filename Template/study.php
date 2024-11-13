
<div class="grid__column_10">
                        
                        
                    
                        <div class="main">
                            <div class="grid_row">
                            <?php if($classstudents !== null): ?>
                            <?php foreach ($classstudents as $classstudent) : ?>
                                <div class="grid__column_class" id="">
                                    <div class="main__class">
                                        <div class="main__class--name">
                                        <h1 id="<?php echo $classstudent['IdClass']; ?>"><?php echo $classstudent['ClassName']; ?></h1>
                                            <form id="form<?php echo $classstudent['IdClass']; ?>" action="?action=intoclass" method="POST" style="display: none;">
                                                <!-- Các trường input ẩn -->
                                                <input  name="id" id="id" value="<?php echo $classstudent['IdClass']; ?>">
                                                <input  name="position" id="position" value="<?php echo $classstudent['Position']; ?>">
                                                <input  name="classname" id="classname" value="<?php echo $classstudent['ClassName']; ?>">
                                                <!-- Thêm các trường input ẩn khác nếu cần -->
                                            </form>
                                            <script>
                                            // Lấy phần tử <h1>
                                            var h1Element = document.getElementById('<?php echo $classstudent['IdClass']; ?>');

                                            // Thêm sự kiện click cho phần tử <h1>
                                            h1Element.addEventListener('click', function() {

                                                // Submit form ẩn
                                                document.getElementById('form<?php echo $classstudent['IdClass']; ?>').submit();
                                            });
                                        </script>
                                            <div class="main__class--name-icon">
                                                <i class="fa-solid fa-ellipsis-vertical" onclick= "toggleElements('id<?php echo $classstudent['IdClass']; ?>')"></i>
                                                <ul id="id<?php echo $classstudent['IdClass']; ?>">
                                                    <li id="delete_class" class="main__class--name-icon-option">
                                                    <a class="main__class--name-icon-option_link" id="a<?php echo $classstudent['IdClass']; ?>">Rời khỏi lớp</a>
                                                    <form id="form2<?php echo $classstudent['IdClass']; ?>" action="?action=deletestudent" method="POST" style="display: none;">
                                                        <!-- Các trường input ẩn -->
                                                        <input name="id" id="id" value="<?php echo $classstudent['IdClass']; ?>">
                                                        <!-- Thêm các trường input ẩn khác nếu cần -->
                                                    </form>
                                                    <script>
                                                        // Lấy phần tử <a>
                                                        var aElement = document.getElementById('a<?php echo $classstudent['IdClass']; ?>');

                                                        // Thêm sự kiện click cho phần tử <a>
                                                        aElement.addEventListener('click', function(event) {
                                                            // Ngăn chặn hành vi mặc định của liên kết
                                                            event.preventDefault();

                                                            // Submit form ẩn
                                                            document.getElementById('form2<?php echo $classstudent['IdClass']; ?>').submit();
                                                        });
                                                    </script>

                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="main__class-content">
                                            <div class="main__class--teacher"><?php echo $classstudent['TeacherName']; ?>
                                            </div>
                                            <div class="main__class--img">
                                                <img src="<?php echo $classstudent['ImageTeacher']; ?>" alt="ảnh lớp">
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