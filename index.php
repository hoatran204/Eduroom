<?php
    session_start();
    $act = isset($_GET['action']) ? $_GET['action'] : '';
    require_once("Controller/ClassController.php");
    $classController = new classController();
    
    require_once("Controller/UserController.php");
    $userController = new userController();

    require_once("View/classview.php");
    $view = new ClassView();
    switch ($act) {
        case "":
            $userController->Login();
            break;
        case "signup":
            $userController->Signup();
            break;
        case "forgetpass":
            $view->Showforget();
            break;
        case "home":
            $classController->getClass();
            break;

        case "logout":
            $userController->logout();
            break;
        case "createclass":
            $view->showCreateClass();
            break;
        case "createclasses":
            $classController->CreateClass();
            break;
        case "sendEmail":
            $userController->Email();
            break;
        case "newpass":
            $view->showNewPass();
            break;
        case "forgetting":
            $userController->VerifyCode();
            break;
        case "newpasss":
            $userController->ChangePass();
            break;
        case "setting":
            $view->showSetting();
            break;
        case "set":
            $userController->Image();
            break;
        case "joinclass":
            $view->showJoinClass();
            break;
        case "join":
            $classController->joinClass();
            break;
        case "study":
            $classController->StudentView();
            break;
        case "teach":
            $classController->TeacherView();
            break;
        case "changename":
            $userController->ChangeName();
            break;
        case "class":
            $classController->ShowNoti();
            break;
        case "intoclass":
            $classController->ChooseClass();
            break;
        case "createpost":
            $classController->ShowNoti();
            break;
        case "homework":
            $classController->ShowEx();
            break;
        case "seedocs":
            $classController->ShowDocs();
            break;
        case "createdocs":
            $view->ShowCreateDocs();
            break;
        case "people":
            $classController->People();
            break;
        case "createhomework":
            
            $view->ShowHw();
            break;
        case "createnoti":
            $classController->CreatePost();
            break;
        case "grade":
            $classController->ShowGrade();
            break;
        case "submit" :
            $classController->ChooseEx();
            break;
        case "creatting":
            $classController->InsertDocs();
            break;
        case "deletestudent":
            $classController->deleteStudent();
            break;
        case "deleteclass":
            $classController->deleteClass();
            break;
        case "nameclass":
            $classController->nameClass();
            break;
        case "cmtstudent":
            $classController->cmtStudent();
            break;
        case "submitting":
            $classController->submitting();
            break;

    }
    

    
?>