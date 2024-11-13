<div class="create-homework__wrap">
                            <form class="create-homework__left" action="?action=homework" method="post" enctype="multipart/form-data">
                                <div class="create-homework__left--title">
                                    <div class="create-homework__left--title-icon">
                                        <i class="fa-solid fa-table-list"></i>
                                    </div>
                                    <div class="create-homework__left--title--content">
                                        <input  id="create-homework__input" type="text" placeholder="Hãy nhập tiêu đề bài tập" name="title" required>
                                    </div>
                                    
                                </div>
                                <div class="create-homework__left--time">
                                    <input type="date" name="setdate" id="setdate" min="2000-01-01" required/>
                                    <input type="time" name="settime" id="settime" required/>
                                </div>
                                
                                <div class="create-homework__left--content">
                                    
                                    <textarea class="create-homework__left--content-input" name="content"></textarea>
                                    <div class="create-homework__left--content--editor-toolbar-wrap">
                                        <div class="create-homework__left--editor-toolbar">
                                            
                                            <input class="create-homework__file" type="file" name="file[]" multiple><br><br>
                                            
    
                                        </div>
                                        <!-- chỗ này em muốn người ta nhập thì nút đang mới hiện background ấy -->
                                        <div class="create-homework_btn">
                                            <button id="cancel-create-homework" class="create-homework_btn-cancel" type="button" onclick="redirectToAnotherPage('?action=homework')">Hủy</button>
                                            <button id="create-homework" class="create-homework_btn-create" type="submit">Đăng</button>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                            
                            
                            
                        </div>

                        
                    </div>
                    
                </div>
            </div>
        </div>