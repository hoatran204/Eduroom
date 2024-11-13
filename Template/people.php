<div class="people_wrap">
                            <div class="people__teacher">
                                <h1>
                                    Giáo viên
                                </h1>
                                <Hr></Hr>
                                <?php if($teachers !== null): ?>
                                <?php foreach ($teachers as $teacher) : ?>
                                <div class="people__teacher--list">
                                
                                    <div class="people__teacher--detail">
                                        <img src="<?php echo $teacher['Image']; ?>" alt="ảnh Giảng viên">
                                        <div class="people__teacher--infor">
                                            <h1>
                                            <?php echo $teacher['Name']; ?>
                                            </h1>
                                            <p><?php echo $teacher['Email']; ?></p>
                                        </div>

                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                
                            </div>

                            <div class="people__student">
                                <h1>
                                    Học viên
                                </h1>
                                <Hr></Hr>
                                <?php if($students !== null): ?>
                                <?php foreach ($students as $student) : ?>
                                <div class="people__student--list">
                                    <div class="people__student--detail">
                                        <img src="<?php echo $student['Image']; ?>" alt="ảnh Giảng viên">
                                        <div class="people__student--infor">
                                            <h1>
                                            <?php echo $student['Name']; ?>
                                            </h1>
                                            <p><?php echo $student['Email']; ?></p>
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