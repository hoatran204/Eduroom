<?php
    class ClassView {
        public function Show($view) {
            require_once('Template/header.php');
                                
                    
            switch($view) {
                case 'signup':
                case 'account':
                case 'newpass':
                case 'login':
                case 'forget':
                case '':
                    require_once('Template/'.$view.'.php');
                    break;
            
                default:
                    require_once('Template/nav.php');
                    if ($view === 'class'|| $view === 'createpost' 
                        || $view === 'studenthomework' || $view === 'teacherhomework'
                        || $view === 'seedocs' || $view === 'createdocs'
                        || $view === 'people' || $view === 'createhomework' || $view === 'grade'
                        || $view === 'submit'
                    ) {
                        require_once('Template/navclass.php');
                        require_once('Template/'.$view.'.php');
                    }
                    require_once('Template/'.$view.'.php');
                    break;
            }
            
            require_once('Template/footer.php');
        }
        public function Showlogin($error) {
            $_SESSION['header'] = 'login';
            require_once('Template/header.php');
            require_once('Template/login.php');
            require_once('Template/footer.php');
        }
        public function Showsignup($error) {
            $_SESSION['header'] = 'signup';
            require_once('Template/header.php');
            require_once('Template/signup.php');
            require_once('Template/footer.php');
            
        }
        public function Showforget() {
            $_SESSION['header'] = 'forget';
            $this->Show('forget');
        }
        public function Showhome($classes) {
            $_SESSION['header'] = 'home';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/home.php');
            require_once('Template/footer.php');
        }
        public function Showhomestudent($classstudents) {
            $_SESSION['header'] = 'study';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/study.php');
            require_once('Template/footer.php');
        }
        public function Showhometeacher($classteachers) {
            $_SESSION['header'] = 'teach';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/teach.php');
            require_once('Template/footer.php');
        }
        public function ShowPeoples($students, $teachers) {
            $_SESSION['header'] = 'People';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/people.php');
            require_once('Template/footer.php');
        }
        public function showCreateClass() {
            $_SESSION['header'] = 'createclass';
            $this->Show('createclass');
        }
        public function showNewPass() {
            $_SESSION['header'] = 'newpass';
            $this->Show('newpass');
        }
        public function showSetting() {
            $_SESSION['header'] = 'setting';
            $this->Show('setting');
        }
        public function showJoinClass() {
            $_SESSION['header'] = 'joinclass';
            $this->Show('joinclass');
        }
        public function showClass($noties) {
            $_SESSION['header'] = 'joinclass';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/class.php');
            require_once('Template/footer.php');
        }
        public function showCreatePost($noties) {
            $_SESSION['header'] = 'createpost';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/createpost.php');
            require_once('Template/footer.php');
        }
        public function showTeachHome($exs) {
            $_SESSION['header'] = 'Homework';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/teacherhomework.php');
            require_once('Template/footer.php');
        }
        public function showStudyHome($exs, $grades) {
            $_SESSION['header'] = 'Homework';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/studenthomework.php');
            require_once('Template/footer.php');
        }
        public function showSeeDocs($docs) {
            $_SESSION['header'] = 'Documents';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/seedocs.php');
            require_once('Template/footer.php');
        }
        public function ShowCreateDocs() {
            $_SESSION['header'] = 'Create Document';
            $this->Show('createdocs');
        }
        public function ShowPeople() {
            $_SESSION['header'] = 'Peole';
            $this->Show('people');

        }
        public function ShowHw() {
            $_SESSION['header'] = 'CreateHomework';
            $this->Show('createhomework');
        }
        public function ShowGrade($exstudents, $filestudents) {
            $_SESSION['header'] = 'Grade';
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/grade.php');
            require_once('Template/footer.php');
        }
        public function ShowSubmit($files) {
            $_SESSION['header'] = 'submit';
            
            require_once('Template/header.php');
            require_once('Template/nav.php');
            require_once('Template/navclass.php');
            require_once('Template/submit.php');
            require_once('Template/footer.php');
        }
    }

?>