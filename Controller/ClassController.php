<?php 

    class classController {

        public function ClassModel() {
            require_once('Model/class.php');
            $classModel = new ClassModel();
            return $classModel;
        }
        public function ClassView() {
            require_once('View/classview.php');
            $classview = new ClassView();
            return $classview;
        }
        public function getClass() {
            $classes = $this->classModel()->SelectAll();
            $this->ClassView()->Showhome($classes);
        }
        public function StudentView() {
            $classstudents = $this->ClassModel()->StudentClass();
            $this->ClassView()->Showhomestudent($classstudents);
        }
        public function TeacherView() {
            $classteachers = $this->ClassModel()->TeacherClass();
            $this->ClassView()->Showhometeacher($classteachers);
        }
        public function CreateClass() {
            if (isset($_POST['class_code'])) {
                $id = $_POST['class_code'];
                $name = $_POST['name'];
                $link = $_POST['online_link'];
                require_once('Model/class.php');
                $class = new ClassModel();
                if (!($class->checkIDClass($id))) {
                    $class->InsertClass($id, $name, $link);
                    $class->InsertTeacher($id, $_SESSION['ID']);
                    header("Location: ?action=home&id=" . $_SESSION['ID']);
    
                } else {
                    header("Location: ?action=createclass&error=exist");
                }
            } 
        }
        public function joinClass() {
            if (isset($_POST['class_code'])) {
                $id = $_POST['class_code'];
                if ($this->ClassModel()->checkIDClass($id)) {
                    if ($this->ClassModel()->checkUserClass($_SESSION['ID'],$id )) {
                        header("Location: ?action=joinclass&error=joined");
                    } else {
                        $this->ClassModel()->InsertStudent($id, $_SESSION['ID']);
                        header("Location: ?action=home&id=" . $_SESSION['ID']);
                    }
                } else {
                    header("Location: ?action=joinclass&error=notexits");
                }
            }
        }
        public function Showcreateclass() {
            $this->ClassView()->Showcreateclass();
        }
        public function ChooseClass() {
            if (isset($_POST['id'])) {
                $_SESSION['IdClass'] = $_POST['id'];
                $_SESSION['Position'] = $_POST['position'];
                $_SESSION['ClassName'] = $_POST['classname'];
                header("Location: ?action=class&id=" . $_SESSION['IdClass']);
            }
        }
        public function People() {
            $teachers = $this->classModel()->TeacherName();
            $students = $this->ClassModel()->StudentName();
            $this->ClassView()->ShowPeoples($students, $teachers);
        }
        public function CreatePost() {
            if (isset($_POST['create_post'])) {
                $text = $_POST['create_post'];
                $this->ClassModel()->SavePost($text);
                header("Location: ?action=class");
            }
            
        }
        public function ShowNoti() {
            $noties = $this->ClassModel()->Shownoti();
            $act = isset($_GET['action']) ? $_GET['action'] : '';
            if ($act === 'class'){
                $this->ClassView()->showClass($noties);
            } else {
                $this->ClassView()->showCreatePost($noties);
            }
        }    
              
        public function showEx() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $file = $_FILES['file'];
                $title = $_POST['title'];
                $date = $_POST['setdate'];
                $time = $_POST['settime'];
                $deadline = $date . ' ' . $time;
                $content = $_POST['content'];
                
                $this->ClassModel()->Exercise($file, $title, $deadline, $content);
                

            }
            $exs = $this->ClassModel()->ShowEx();
            $grades = $this->ClassModel()->ShowGrade();
            if ($_SESSION['Position'] === 'teacher') {
                $this->ClassView()->showTeachHome($exs);
            } else {
                $this->ClassView()->showStudyHome($exs, $grades);
            }
                
        }
        public function ChooseEx() {
            
            if (isset($_POST['id'])) {
                $_SESSION['IdEx'] = $_POST['id'];
                $_SESSION['title'] = $_POST['title'];
                $_SESSION['deadline'] = $_POST['deadline'];
                $_SESSION['grade'] = $_POST['grade'];
                $_SESSION['submit'] = $_POST['submitted'];
                $_SESSION['content'] = $_POST['content'];
                $_SESSION['cmtteacher'] = $_POST['cmtteacher'];
                $files = $this->ClassModel()->ShowExSubmit();
                $this->ClassView()->ShowSubmit($files);
            }
        }
        public function InsertDocs() {
            if (isset($_POST['title'])) {
                $title = $_POST['title'];
                $file = $_FILES['file'];
                $content = $_POST['content'];
                $this->ClassModel()->UploadDocs($file, $title, $content);
                header("Location: ?action=seedocs");
            }
        }
        public function ShowDocs() {
            $docs = $this->ClassModel()->SelectDocs();
            $this->ClassView()->showSeeDocs($docs);
        }
        public function deletestudent() {
            if (isset($_POST['id'])) {
                $Id = $_POST['id'];
                $IdStudent = $_SESSION['ID'];
                $this->ClassModel()->outClass($Id, $IdStudent);
                header("Location: ?action=study");
            }
        }
        public function deleteClass() {
            if (isset($_POST['id'])) {
                $Id = $_POST['id'];
                $this->ClassModel()->deleteClass($Id);
                header("Location: ?action=teach");
            }
        }
        public function nameClass() {
            if (isset($_POST['id'])) {
                $Id = $_POST['id'];
                $name = $_POST['name'];
                $this->ClassModel()->nameClass($name, $Id);
                header("Location: ?action=teach");
            }
        }
        public function cmtstudent() {
            if (isset($_POST['cmt'])) {
                $cmt = $_POST['cmt'];
                $this->ClassModel()->updateCmtStudent($cmt);
                $files = $this->ClassModel()->ShowExSubmit();
                $this->ClassView()->ShowSubmit($files);
            }
        }
        public function submitting() {
            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                $this->ClassModel()->UploadEx($file);
                $this->ClassModel()->Updatesubmit();
                header("Location: ?action=class");
            }
        }
        public function ShowGrade() {
            unset($_SESSION['IdStudent']);
            $_SESSION['Grade'] = NULL;
            if (isset($_POST['id'])) {
            $_SESSION['IdEx'] = $_POST['id'];
            }
            if (isset($_POST['IdStudent'])) {
                $_SESSION['IdStudent'] = $_POST['IdStudent'];
                $_SESSION['NameStudent'] = $_POST['Name'];
                $_SESSION['grade'] = $_POST['grade'];
                
            }
            if (isset($_POST['grades'])) {
                $_SESSION['IdStudent'] = $_POST['IdStudent1'];
                $grades = $_POST['grades'];
                $_SESSION['Grade'] = $grades;
                $cmt = $_POST['comment'];
                $this->ClassModel()->UpdateGrade($grades);
                $this->ClassModel()->UpdateCmtTeach($cmt);
                // 
                
            }
            

            $filestudents = $this->ClassModel()->SelectFile();
            
            $_SESSION['countsubmit'] = $this->ClassModel()->CountSubmit();
            $_SESSION['counthw'] = $this->ClassModel()->Counthw();
            $_SESSION['countgrade'] = $this->ClassModel()->Countgrade();
            $exstudents = $this->ClassModel()->SelectSubmit();
            $this->ClassView()->ShowGrade($exstudents, $filestudents);

        }
    }
    

?>