<?php 

    class classModel {
        public function conn() {
            require_once('database.php');
            $db = new Database();
            return $db->connect();
        }
        public function db() {
            require_once('database.php');
            $db = new Database();
            return $db;
        }
        public function checkIDClass($id) {
            return $this->db()->Check($id, 'Class', 'IdClass');
        }
        public function checkUserClass($idUser, $idClass) {
            $conn = $this->db()->connect();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM classusers WHERE IdClass = '$idClass' AND IdUser ='$idUser'";
                $result = $conn->query($sql);
                return $result->num_rows > 0;
            }
        }
    
        public function InsertClass($id, $name, $link) {
            if ($link === null) {
                $value = "'$id', '$name', NULL"; 
            } else {
                $value = "'$id', '$name', '$link'"; 
            }
            return $this->db()->Insert($value, 'class(IdClass, Name, LinkOnline)');
        }

        public function InsertTeacher($idclass, $idteacher) {
            $value = "'$idclass', $idteacher, 'teacher'";
            return $this->db()->Insert($value, 'classUsers(idClass, idUser, position)');
        }
        public function InsertStudent($idClass, $idstudent) {
            $value = "'$idClass', $idstudent, 'student'";
            return $this->db()->Insert($value, 'classUsers(idClass, idUser, position)');
        }

        public function SelectAll() {
            $conn = $this->conn();
            mysqli_set_charset($conn, 'utf8');
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT 
                class.IdClass as IdClass,
                class.Name AS ClassName,
                student_cu.Position AS Position,
                student.Name AS StudentName,
                teacher.Name AS TeacherName,
                teacher.Image AS ImageTeacher
                FROM 
                    class
                LEFT JOIN 
                    classusers AS student_cu ON class.IdClass = student_cu.IdClass 
                LEFT JOIN 
                    users AS student ON student_cu.IdUser = student.IdUser
                LEFT JOIN 
                    classusers AS teacher_cu ON student_cu.IdClass = teacher_cu.IdClass AND teacher_cu.Position = 'teacher'
                LEFT JOIN 
                    users AS teacher ON teacher_cu.IdUser = teacher.IdUser
                WHERE 
                    student.IdUser = ".$_SESSION['ID'] ;
                            

                
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $classes = array();
                    while ($class = $result->fetch_assoc()) {
                        $classes[] = $class;
                    }
                    return $classes;
                
                } 
                
            }
        }
        public function StudentClass() {
            $conn = $this->conn();
            mysqli_set_charset($conn, 'utf8');
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT 
                            class.IdClass as IdClass,
                            class.Name AS ClassName,
                            student_cu.Position AS Position,
                            student.Name AS StudentName,
                            teacher.Name AS TeacherName,
                            teacher.Image AS ImageTeacher
                        FROM 
                            class
                        INNER JOIN 
                            classusers AS student_cu ON class.IdClass = student_cu.IdClass AND student_cu.Position = 'student'
                        INNER JOIN 
                            users AS student ON student_cu.IdUser = student.IdUser 
                        INNER JOIN 
                            classusers AS teacher_cu ON class.IdClass = teacher_cu.IdClass AND teacher_cu.Position = 'teacher'
                        INNER JOIN 
                            users AS teacher ON teacher_cu.IdUser = teacher.IdUser
                        WHERE 
                            student.IdUser = ".$_SESSION['ID'] ;
                            

                
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $classstudents = array();
                    while ($classstudent = $result->fetch_assoc()) {
                        $classstudents[] = $classstudent;
                    }
                    return $classstudents;
                
                } 
                
            }
        }
        public function TeacherClass() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT 
                class.IdClass as IdClass,
                class.Name AS ClassName,
                student_cu.Position AS Position,
                student.Name AS StudentName,
                teacher.Name AS TeacherName,
                teacher.Image AS ImageTeacher
            FROM 
                class
            INNER JOIN 
                classusers AS student_cu ON class.IdClass = student_cu.IdClass AND student_cu.Position = 'teacher'
            INNER JOIN 
                users AS student ON student_cu.IdUser = student.IdUser 
            INNER JOIN 
                classusers AS teacher_cu ON class.IdClass = teacher_cu.IdClass AND teacher_cu.Position = 'teacher'
            INNER JOIN 
                users AS teacher ON teacher_cu.IdUser = teacher.IdUser
            WHERE 
                student.IdUser = ".$_SESSION['ID'] ;
                            

                
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $classteachers = array();
                    while ($classteacher = $result->fetch_assoc()) {
                        $classteachers[] = $classteacher;
                    }
                    return $classteachers;
                
                } 
            
                
            }
        }
        public function TeacherName() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT classusers.IdUser as ID,
                users.Name as Name,
                users.Image as Image,
                users.Email as Email
                FROM classusers, users 
                WHERE classusers.IdUser = users.IdUser 
                AND classusers.position = 'teacher' 
                AND classusers.IdClass = '" . $_SESSION['IdClass'] . "'";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $teachers = [];
                        while ($teacher = $result->fetch_assoc()) {
                            $teachers[] = $teacher;
                        }
                        return $teachers;
                    
                    } 
            }
        }
        public function StudentName() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT classusers.IdUser as ID,
                        users.Name as Name,
                        users.Image as Image,
                        users.Email as Email
                        from classusers, users WHERE classusers.IdUser = users.IdUser 
                        AND classusers.position = 'student' AND classusers.IdClass = '" . $_SESSION['IdClass'] . "'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $students = array();
                        while ($student = $result->fetch_assoc()) {
                            $students[] = $student;
                        }
                        return $students;
                    
                    } 
            }
        }
        public function ShowEx() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM exercise
                        WHERE IdClass ='" . $_SESSION['IdClass'] . "'
                        ORDER BY AssignmentDate DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $exs = array();
                        while ($ex = $result->fetch_assoc()) {
                            $exs[] = $ex;
                        }
                        return $exs;
                    
                    } 
            }
        }
        public function ShowGrade() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                if (isset($_SESSION['IdEx'])) {
                $sql = "SELECT * FROM exstudent
                        WHERE IdEx ='" . $_SESSION['IdEx'] . "'
                        AND IdStudent = '" . $_SESSION['ID'] . "'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $grades = array();
                        while ($grade = $result->fetch_assoc()) {
                            $grades[] = $grade;
                        }
                        return $grades;
                    
                    } 
                }
            }
        }
        public function SavePost($text) {
            $noti = $_SESSION['Name'] . ': ' . $text;
            $img = $_SESSION['img'];
            $idClass = $_SESSION['IdClass'];
            $idUser = $_SESSION['ID'];
            $value = "CONCAT('noti', LAST_INSERT_ID()),'$idClass','$idUser','$img', '$noti', 'noti'"; 
             
            $this->db()->Insert($value, 'noti(Idnoti, IdClass, IdUser, Image, text, style)');

        }
        public function Shownoti() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM notification 
                WHERE IdClass = '" . $_SESSION['IdClass'] . "'
                ORDER BY DateSubmitted DESC";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $noties = array();
                        while ($noti = $result->fetch_assoc()) {
                            $noties[] = $noti;
                        }
                        return $noties;
                    
                    } 
            }
        }
        public function CountEx() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM exercise ";
                $result = $conn->query($sql);
                return $result->num_rows;

            }
        }
        public function CountSubmit() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM exstudent WHERE Idex = '{$_SESSION['IdEx']}' AND Submitted = 'submitted'";
                $result = $conn->query($sql);
                return $result->num_rows;

            }
        }
        public function Counthw() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM exstudent WHERE Idex = '{$_SESSION['IdEx']}' ";
                $result = $conn->query($sql);
                return $result->num_rows;

            }
        }
        public function Countgrade() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM exstudent WHERE Idex = '{$_SESSION['IdEx']}' AND Grade != NULL ";
                $result = $conn->query($sql);
                return $result->num_rows;

            }
        }
        public function CountDocs() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM document ";
                $result = $conn->query($sql);
                return $result->num_rows;

            }
        }
        public function SelectStudent() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT classusers.IdUser as IdUser, users.Name as Name, 
                users.Image as Image FROM classusers, users 
                WHERE classusers.IdClass = '" . $_SESSION['IdClass'] . "' AND classusers.Position = 'student'
                AND classusers.IdUser = users.IdUser
                ";
                $result = $conn->query($sql);
                return $result;

            }
        }
        public function ShowExSubmit() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM exercisefile 
                        WHERE IdEx = '" . $_SESSION['IdEx'] . "'";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $files = [];
                        while ($file = $result->fetch_assoc()) {
                            $files[] = $file;
          
                        }
                        return $files;
                    
                    } 
            }
        }
        public function Idex() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $id = 'ex' . ($this->CountEx() + 1);
                return $id;
            }
        }
        public function IdDocs() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $id = 'docs' . ($this->CountDocs() + 1);
                return $id;
            }
        }
        public function UploadEx($file) {
            $id = $this->Idex();
            if (empty($file['name'][0])) {
                return;
            }
            $size_allow = 10;
            $ext_allow = ['zip','doc','docx','xls','xlsx','png','jpg','gif','jpeg','ppt','pptx'];
            $filename_arr = $file['name'];
            $errors =[];
            $count = 0;
            if (!empty($filename_arr)) {
                foreach ($filename_arr as $key => $item) {
                    // Sử dụng pathinfo để lấy đuôi tệp tin an toàn
                    $path_info = pathinfo($item);
                    $ext = isset($path_info['extension']) ? $path_info['extension'] : 'không rõ';
                    $new_file = $file['name'][$key];
                    $size = $file['size'][$key];
                    $size = $size/1024/1024;
                    $file_tmp = $file['tmp_name'][$key];
                    if(in_array($ext,$ext_allow)){
                        if($size <= $size_allow){
                            $errors = 'size_error';
                            $link = 'uploads/'.$new_file;
                            $upload = move_uploaded_file($file_tmp, 'uploads/'.$new_file);
                            if(!$upload){
                                $errors[][$key] = 'upload_error';
                            }
                            else{
                                $sql = "INSERT INTO filestudent (IdEx, IdStudent, FILE, NAME, Image) 
                                VALUES ('{$_SESSION['IdEx']}', '{$_SESSION['ID']}', '$link', '{$_SESSION['Name']}', '{$_SESSION['img']}')";
                                $this->conn()->query($sql);
                            } 
                        }
                    }
                    else{
                        $errors[][$key] = 'ext_error';

                    }
                }
            }
            else{

            }
        if($count > 0){
            ?>
            <div class = "alert">
                Đã upload thành công <?php echo $count;?> files
            </div>
            <?php
        }
        
        }
        public function UploadFile($file, $title, $deadline, $content) {
            $id = $this->Idex();
            if (empty($file['name'][0])) {
                return;
            }
            $size_allow = 10;
            $ext_allow = ['zip','doc','docx','xls','xlsx','png','jpg','gif','jpeg','ppt','pptx','png'];
            $filename_arr = $file['name'];
            $errors =[];
            $count = 0;
            if (!empty($filename_arr)) {
                foreach ($filename_arr as $key => $item) {
                    // Sử dụng pathinfo để lấy đuôi tệp tin an toàn
                    $path_info = pathinfo($item);
                    $ext = isset($path_info['extension']) ? $path_info['extension'] : 'không rõ';
                    $new_file = $file['name'][$key];
                    $size = $file['size'][$key];
                    $size = $size/1024/1024;
                    $file_tmp = $file['tmp_name'][$key];
                    if(in_array($ext,$ext_allow)){
                        if($size <= $size_allow){
                            $errors = 'size_error';
                            $link = 'uploads/'.$new_file;
                            $upload = move_uploaded_file($file_tmp, 'uploads/'.$new_file);
                            if(!$upload){
                                $errors[][$key] = 'upload_error';
                            }
                            else{
                                $sql_insert_file = "INSERT INTO exercisefile (idex, FILE, tittle, deadline, content) VALUES ('$id', '$link', '$title', '$deadline', '$content')";
                                $this->conn()->query($sql_insert_file);
                            } 
                        }
                    }
                    else{
                        $errors[][$key] = 'ext_error';

                    }
                }
            }
            else{

            }
        if($count > 0){
            ?>
            <div class = "alert">
                Đã upload thành công <?php echo $count;?> files
            </div>
            <?php
        }
        
        }
        public function UploadDocs($file, $title, $content) {
            $id = $this->IdDocs();
            if (empty($file['name'][0])) {
                return;
            }
            $size_allow = 10;
            $ext_allow = ['zip','doc','docx','xls','xlsx','png','jpg','gif','jpeg','ppt','pptx','png'];
            $filename_arr = $file['name'];
            $errors =[];
            $count = 0;
            if (!empty($filename_arr)) {
                foreach ($filename_arr as $key => $item) {
                    // Sử dụng pathinfo để lấy đuôi tệp tin an toàn
                    $path_info = pathinfo($item);
                    $ext = isset($path_info['extension']) ? $path_info['extension'] : 'không rõ';
                    $new_file = $file['name'][$key];
                    $size = $file['size'][$key];
                    $size = $size/1024/1024;
                    $file_tmp = $file['tmp_name'][$key];
                    if(in_array($ext,$ext_allow)){
                        if($size <= $size_allow){
                            $errors = 'size_error';
                            $link = 'uploads/'.$new_file;
                            $upload = move_uploaded_file($file_tmp, 'uploads/'.$new_file);
                            if(!$upload){
                                $errors[][$key] = 'upload_error';
                            }
                            else{
                                $sql_insert_file = "INSERT INTO document (IdDocument, IdClass, title,content, FILE, text, Image, IdTeacher, style) 
                                VALUES ('$id','{$_SESSION['IdClass']}', '$title', '$content', '$link', '{$_SESSION['Name']} đã đăng 1 tài liệu mới: $title', '{$_SESSION['img']}', '{$_SESSION['ID']}', 'doc')";
                                $this->conn()->query($sql_insert_file);
                            } 
                        }
                    }
                    else{
                        $errors[][$key] = 'ext_error';

                    }
                }
            }
            else{

            }
        if($count > 0){
            ?>
            <div class = "alert">
                Đã upload thành công <?php echo $count;?> files
            </div>
            <?php
        }
        
        }
        public function ExStudent($file, $title, $deadline, $content) {
            $id = $this->Idex();
            $this->UploadFile($file, $title, $deadline, $content);
            $students = $this->SelectStudent();
            if ($students) {
                // Lặp qua danh sách sinh viên và chèn vào bảng exstudent
                while ($row = $students->fetch_assoc()) {
                    $rows = $row['IdUser'];
                    $rows2 = $row['Name'];
                    $rows3 = $row['Image'];
                    $sql_insert = "INSERT INTO exstudent (Idex, Idstudent, Submitted, Name, Img) VALUES ('$id', '$rows', 'Not yet', '$rows2', '$rows3')";
                    $this->conn()->query($sql_insert);
                }
            }

        }
        public function Exercise($file, $title, $deadline, $content) {
            $id = $this->Idex();
            $this->ExStudent($file, $title, $deadline, $content);
            // Chèn thông tin bài tập vào bảng Exercise
            $sql_insert_exercise = "INSERT INTO Exercise(IdExercise, IdClass, IdTeacher, Image, Deadline, text, style, title, content) 
            VALUES ('$id', '{$_SESSION['IdClass']}', '{$_SESSION['ID']}', '{$_SESSION['img']}', '$deadline', '{$_SESSION['Name']} đã giao cho bạn bài tập mới : {$title}', 'ex', '{$title}', '{$content}')";
            $this->conn()->query($sql_insert_exercise);
            
                
        }
        public function SelectDocs() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM document 
                        WHERE IdClass = '" . $_SESSION['IdClass'] . "'
                        ORDER BY Datesubmitted DESC";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $docs = [];
                        while ($doc = $result->fetch_assoc()) {
                            $docs[] = $doc;
          
                        }
                        return $docs;
                    
                    } 
            }
        }
        public function SelectSubmit() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "SELECT * FROM exstudent 
                        WHERE exstudent.IdEx = '{$_SESSION['IdEx']}'
                        and Submitted = 'submitted'

                        ";


                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $exstudents = [];
                        while ($exstudent = $result->fetch_assoc()) {
                            $exstudents[] = $exstudent;
          
                        }
                        return $exstudents;
                    
                    } 
            }
        }
        public function outClass($idClass, $user) {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "DELETE FROM classusers WHERE IdClass = '$idClass' AND IdUser= '$user'";
                $this->conn()->query($sql);
            }
        }
        public function deleteClass($class) {
            $this->db()->Delete('classusers', 'IdClass', $class);
            $this->db()->Delete('class', 'IdClass', $class);
            
        }
        public function nameClass($name, $id) {
            $this->db()->Update('class', 'name', $name, 'IdClass', $id);
        }
        public function Updatesubmit() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "UPDATE exstudent SET Submitted = 'submitted' WHERE Idex = '{$_SESSION['IdEx']}' AND IdStudent = '{$_SESSION['ID']}'";
                $this->conn()->query($sql);
            }
        }
        public function updateCmtStudent($cmt) {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "UPDATE exstudent SET CmtStudent = '$cmt' WHERE Idex = '{$_SESSION['IdEx']}' AND IdStudent = '{$_SESSION['ID']}'";
                $this->conn()->query($sql);
            }
        }
        public function SelectFile() {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                if (isset($_SESSION['IdStudent'])) {
                $sql = "SELECT * FROM filestudent WHERE IdEx='{$_SESSION['IdEx']}' AND IdStudent= '{$_SESSION['IdStudent']}'";
                $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        $filestudents = [];
                        while ($filestudent = $result->fetch_assoc()) {
                            $filestudents[] = $filestudent;
          
                        }
                        return $filestudents;
                    
                    } 
                }
            }
        }
        public function UpdateCmtTeach($cmt) {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "UPDATE exstudent SET CmtTeacher = '$cmt' WHERE Idex = '{$_SESSION['IdEx']}' AND IdStudent = '{$_SESSION['IdStudent']}'";
                $this->conn()->query($sql);
            }
        }
        public function UpdateGrade($grades) {
            $conn = $this->conn();
            if (!$conn) {
                echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
                return false;
            } else {
                $sql = "UPDATE exstudent SET Grade = '$grades' WHERE Idex = '{$_SESSION['IdEx']}' AND IdStudent = '{$_SESSION['IdStudent']}'";
                $this->conn()->query($sql);
            }
        }
       
    }
    

?>