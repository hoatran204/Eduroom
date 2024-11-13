<form class="create-doc__wrap" action="?action=creatting" method="POST" enctype="multipart/form-data">
                            <div class="create-doc__left">
                                <div class="create-doc__left--title">
                                    <div class="create-doc__left--title-icon">
                                        <i class="fa-solid fa-table-list"></i>
                                    </div>
                                    <div class="create-doc__left--title--content">
                                        <input  id="create-doc__input" name="title" type="text" placeholder="Hãy nhập tiêu đề tài liệu ">
                                    </div>
                                    
                                </div>
                                <div class="create-doc__left--content">
                                    <textarea class="create-doc__left--content-input" name="content" ></textarea>
                                    <div class="create-doc__left--content--editor-toolbar-wrap">
                                        <div class="create-doc__left--editor-toolbar">
                                            <input class="create-doc__file" type="file" name="file[]"  multiple ><br><br>
                                        
                                        </div>
                                        <!-- chỗ này em muốn người ta nhập thì nút đang mới hiện background ấy -->
                                        <div class="create-doc_btn">
                                            <button id="cancel-create-doc" class="create-doc_btn-cancel" type="button">Hủy</button>
                                            <button id="create-doc" class="create-doc_btn-create" type="submit">Đăng</button>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </form>

                        
                    </div>
                    
                </div>
            </div>
        </div>