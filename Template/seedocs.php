
                        <?php if ($_SESSION['Position'] === 'teacher') {
                        echo '<button class="btn" onclick="redirectToAnotherPage(\'?action=createdocs\')">Tạo tài liệu</button>';

                        } ?>
                        <?php if($docs !== null): ?>
                            <?php foreach ($docs as $doc) : ?>

                        <div class="see-doc__wrap">
                            <div class="see-doc__title">
                                <div class="see-doc__title-icon">
                                    <i class="fa-solid fa-table-list"></i>
                                </div>
                                <div class="see-doc__title--content">
                                    <h1><?php echo $doc['title'] ?></h1>
                                </div>
                                
                            </div>
                            
                            <div class="see-doc__time">
                                <p><?php echo $doc['DateSubmitted'] ?></p>
                            </div>
                            <div class="see-doc__content">
                                <p><?php echo $doc['content'] ?></p>
                            </div>
                            <div class="see-doc__file--wrap">
                                <div class="see-doc__file">
                                    <div class="see-doc__file-icon">
                                        <i class="fa-regular fa-file"></i>
                                    </div>
                                    <div class="see-doc__file--content">
                                        <a href="<?php echo $doc['FILE'] ?>"><?php echo basename($doc['FILE']) ?></a>
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