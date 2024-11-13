<div class="grid__column_10">
                        <div class="home-filter">
                            <button class="home-filter__btn" onclick="redirectToAnotherPage('?action=class')" 
                            <?php
                                if ($act === "class") {
                                echo 'style="background-color: var(--gray_color);"';
                                }
                            ?>
                            >Thông báo</button>
                            <button class="home-filter__btn" onclick="redirectToAnotherPage('?action=homework')"
                            <?php
                                if ($act === "homework") {
                                echo 'style="background-color: var(--gray_color);"';
                                }
                            ?>
                            >Bài tập</button>
                            <button class="home-filter__btn" onclick="redirectToAnotherPage('?action=seedocs')"
                            <?php
                                if ($act === "seedocs") {
                                echo 'style="background-color: var(--gray_color);"';
                                }
                            ?>
                            >Tài liệu</button>
                            <button class="home-filter__btn" onclick="redirectToAnotherPage('?action=people')"
                            <?php
                                if ($act === "people") {
                                echo 'style="background-color: var(--gray_color);"';
                                }
                            ?>
                            >Mọi người</button>
                        </div>