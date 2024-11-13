<?php
    
    class UserController {
        public function User() {
            require_once('Model/user.php');
            $user = new User();
            return $user;
        }   
        
        
        public function Signup() {
            $error = [];
            if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                if ($this->user()->CheckEmail($email)) {
                    $error[] = "Email đã tồn tại."; 
                } else {
                    $error[] = "";
                    $this->user()->insertData($email, $username, $password);
                    $_SESSION['ID'] = $this->user()->selectId($email);
                    $_SESSION['Name'] = $this->user()->UserName($email);
                    $_SESSION['img'] = $this->user()->selectImg($email);
                    
                    header('Location: ?');

                    exit();
                }
            } else {
                $error[] = "";
            }
            require_once('View/classview.php');
            $classview = new ClassView();
            $classview->ShowSignup($error);
            
        }
        public function Login() {
            $error = [];
            if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
                $emaillogin = $_POST['emailLogin'];
                $passwordlogin = $_POST['passwordLogin'];
            
                if ($this->user()->checkEmail($emaillogin)) {
                    if ($this->user()->checkPass($passwordlogin,$emaillogin)) {
                        $error[] = "";
                        $_SESSION['tempEmail'] = $emaillogin;
                        $_SESSION['ID'] = $this->user()->selectId($emaillogin);
                        $_SESSION['Name'] = $this->user()->UserName($emaillogin);
                        $_SESSION['img'] = $this->user()->selectImg($emaillogin);
                        $error[] = "Email hoặc mật khẩu không chính xác.";
                        
                        header("Location: ?action=home");

                    }
                    else {
                        $error[] = "Email hoặc mật khẩu không chính xác.";
                    }
                } else {
                    $error[] = "Email hoặc mật khẩu không chính xác.";
                }
            }
            require_once('View/classview.php');
            $classview = new ClassView();
            $classview->ShowLogin($error);
        }
        public function Email() {
            if(isset($_POST['emailAccount'])) {
                $_SESSION['tempEmail'] = $_POST['emailAccount'];
                $tempEmail = $_POST['emailAccount'];
                $_SESSION['ID'] = $this->user()->selectId($tempEmail);
                $_SESSION['Name'] = $this->user()->UserName($tempEmail);
                $_SESSION['img'] = $this->user()->selectImg($tempEmail);
                $user = $this->user()->Username($tempEmail); // Sử dụng hàm mới để lấy tên người dùng từ email
        
                if ($this->user()->CheckEmail($tempEmail)) {
                    require "PHPMailer-master/src/PHPMailer.php"; 
                    require "PHPMailer-master/src/SMTP.php"; 
                    require 'PHPMailer-master/src/Exception.php'; 
                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
                    try {
                        $mail->SMTPDebug = 2; //0,1,2: chế độ debug
                        $mail->isSMTP();  
                        $mail->CharSet  = "utf-8";
                        $mail->Host = 'smtp.gmail.com';  //SMTP servers
                        $mail->SMTPAuth = true; // Enable authentication
                        $mail->Username = 'ttnh13102004@gmail.com'; // SMTP username
                        $mail->Password = 'bymq mwjs krii oppe';   // SMTP password
                        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                        $mail->Port = 465;  // port to connect to                
                        $mail->setFrom('ttnh13102004@gmail.com', 'Eduroom' ); 
                        $mail->addAddress($tempEmail, $user ); 
                        $mail->isHTML(true);  // Set email format to HTML
                        $mail->Subject = 'Mã xác thực';
                        $noidungthu = rand(1000,9999); 
                        $mail->Body = $noidungthu;
                        $mail->smtpConnect( array(
                            "ssl" => array(
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                            "allow_self_signed" => true
                            )   
                        ));
                        $mail->send();
                        $this->user()->SaveCode($tempEmail, $noidungthu);
                        header ("Location: ?action=forgetpass&email=successfull"); 
                    } catch (Exception $e) {
                        echo 'Error: ', $e->getMessage();
                    }
                }
                else {
                    header ("Location: ?action=forgetpass&error=notexits");
                }
            } 
        }
        
        public function VerifyCode() {
            echo "hi";
            if (isset($_SESSION['tempEmail']) && isset($_POST['verification_code'])) {
                $email = $_SESSION['tempEmail'];
                $code = $_POST['verification_code'];
                // Xác thực mã xác thực
                if ($this->user()->selectCode($email) === $code) {
                    header ("Location: ?action=newpass");
                }
                else {
                    header ("Location: ?action=forgetpass&email=successfull&error=incorrect");
                }
            }
        }
        public function ChangePass() {
            if (isset($_SESSION['tempEmail']) && isset($_POST['newpassword']) && isset($_POST['repeatpassword'])) {
                $email = $_SESSION['tempEmail'];
                $new_password = $_POST['newpassword'];
                $repeat_password = $_POST['repeatpassword'];
        
                // Kiểm tra xem mật khẩu mới và mật khẩu xác nhận có khớp nhau không
                if ($new_password === $repeat_password) {
        
                    // Kiểm tra mật khẩu cũ
                    if ($new_password !== $this->user()->selectPass($email)) {
                        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
                        $this->user()->updatePass($new_password, $email);
                        $id= $_SESSION['ID'];
                        header("Location: ?action=home&id=$id");
                        exit();
                    } else {
                        // Mật khẩu đã sử dụng 
                        header("Location: ?action=newpass&error=invalid_password");
                        exit();
                    }
                } else {
                    // Mật khẩu mới và mật khẩu xác nhận không khớp nhau
                    header("Location: ?action=newpass&error=repeat_password");
                    exit();
                }
            } else {
                $this->Image();
            }
        }
        public function Image() {
            if (isset($_FILES['image'])) {
                if ($_FILES['image']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $fileType = exif_imagetype($_FILES['image']['tmp_name']);
                    $ext_allow = ['jpg','png'];

                    if ($fileType !== IMAGETYPE_JPEG && $fileType !== IMAGETYPE_PNG && $fileType !== IMAGETYPE_GIF) {
                        header("Location: ?action=setting");
                    } else {
                        $imageData = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                        $encodedImage = 'data:' . mime_content_type($_FILES['image']['tmp_name']) . ';base64,' . $imageData;
            
                        $this->user()->updateImage($encodedImage, $_SESSION['tempEmail']);
                        $_SESSION['img'] = $encodedImage;
                        header("Location: ?action=setting");
                    }
                } else {
                    header("Location: ?action=setting");
                }
            } 
        
            
        }
        public function ChangeName() {
            if (isset($_POST['newname'])) {
                $name = $_POST['newname'];
                $_SESSION['Name'] = $name;
                if ($this->user()->checkName($name)) {
                    header("Location: ?action=setting");
                } else {
                    $_SESSION['name'] = $name;
                    $this->user()->updateName($name);
                    header("Location: ?action=home");
                }
            } else {
                header("Location: ?action=setting");
            }
        
            
        }
        public function logout() {

            // Xóa tất cả các biến session
            session_unset();
    
            // Hủy session
            session_destroy();
            header("Location: ?");
        }
        

    }

?>