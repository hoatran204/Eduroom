<div class="container">
            <div class="grid">
                <div class="grid_row">
                    <div class="grid__column_2">
                        <nav class="menu">
                            <ul class="menu_list">
                                <li class="menu-main">
                                    <button class="menu-main__icon" onclick="redirectToAnotherPage('index.php?action=home')" 
                                    <?php
                                    if ($act === 'home') {
                                        echo 'style="background-color: var(--gray_color);"';
                                    } 
                                    ?>
                                    ><i class="fa-solid fa-house"></i>Trang chủ</button>
                                   
                                </li>
                                <li class="menu-student">
                                    <button href="student" class="menu-student__icon" onclick="redirectToAnotherPage('index.php?action=study')" 
                                    <?php
                                        if ($act === 'study') {
                                            echo 'style="background-color: var(--gray_color);"';
                                        } 
                                    ?>
                                    ><i class="fa-solid fa-graduation-cap" ></i>   Lớp của bạn</button>
                                </li>
                                <li class="menu-teacher">
                                    <button href="teacher" class="menu-teacher__icon" onclick="redirectToAnotherPage('index.php?action=teach')"
                                    <?php
                                        if ($act === 'teach') {
                                            echo 'style="background-color: var(--gray_color);"';
                                        } 
                                    ?>
                                    ><i class="fa-solid fa-chalkboard-user" ></i>      Giảng dạy</button>
                                </li>
                                <li class="menu-setting">
                                    <button onclick="redirectToAnotherPage('index.php?action=setting')" class="menu-setting__icon"
                                    <?php
                                        if ($act === 'setting') {
                                            echo 'style="background-color: var(--gray_color);"';
                                        } 
                                    ?>
                                    ><i class="fa-solid fa-gear"></i>   Cài đặt</button>
                                </li>
            
                                
                            </ul>
                        </nav>
                    </div>