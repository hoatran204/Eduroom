<?php

class User {

    public function db() {
        require_once('database.php');
        $db = new Database();
        return $db;
    }
    public function CheckEmail($email) {
        return $this->db()->Check($email,'users', 'Email'); 
    }

    public function insertData($email, $userName, $password) {
        if ($this->CheckEmail($email)) {
            return false;
        } else {
            // Đảm bảo rằng các giá trị chuỗi được bao quanh bởi dấu ngoặc đơn
            $value = "'$email', '$userName', '$password', 'asset/img/user.webp'";
            return $this->db()->Insert($value, 'users(Email, Name, Pass, Image)');
        }
    }
    

    public function checkPass($password, $email) {
        $conn = $this->db()->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "SELECT * FROM users WHERE Pass = '$password' AND Email='$email'";
            $result = $conn->query($sql);
            return $result->num_rows > 0;
        }
    }

    public function UserName($email) {
        return $this->db()->Select2('Name', 'users', 'Email', $email);

    }
    
    public function checkCode($email) {
        return $this->db()->Select('*', 'verificationcodes', 'Email', $email);
    }
    
    public function selectCode($email) {
        return $this->db()->Select2('vercode', 'VerificationCodes', 'Email', $email);
    }
    
    public function SaveCode($email, $verification_code) {
        if ($this->checkCode($email)) {
            return $this->db()->Update('verificationcodes', 'vercode', $verification_code, 'Email', $email);
        } else {
            $value = "'$email', '$verification_code'";
            return $this->db()->Insert($value, 'VerificationCodes (email, vercode)');
        }
    }
    
    public function selectPass($email) {
        return $this->db()->Select2('Pass', 'users', 'Email', $email);
    }

    public function selectImg($email) {
        return $this->db()->Select2('Image', 'users', 'Email', $email);
    }
    
    public function updatePass($pass, $email) {
        return $this->db()->Update('users', 'Pass', $pass, 'Email', $email);
    }
    public function selectId($email) {
        return $this->db()->Select2('IdUser', 'users', 'Email', $email);
    }
    public function updateImage($img, $email) {
        return $this->db()->Update('users', 'Image', $img, 'Email', $email);
    }
    public function checkName($name) {
        $conn = $this->db()->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "SELECT * FROM users WHERE Name = '$name' AND IdUser=" .$_SESSION['ID'];
            $result = $conn->query($sql);
            return $result->num_rows > 0;
        }
    }
    public function updateName($name) {
        return $this->db()->Update('users', 'Name', $name, 'IdUser', $_SESSION["ID"]);

    }
}
