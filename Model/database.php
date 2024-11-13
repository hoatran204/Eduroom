<?php
class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '123456';
    private $dbname = 'eduroom1';
    private $conn = NULL;

    public function connect() {
        switch ($this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname)) {
            case false:
                echo "Kết nối thất bại";
                exit();
            default:
                mysqli_set_charset($this->conn, 'utf8');
                return $this->conn;
        }


    }
    // Hàm check (dùng để check xem value có tồn tại trong bảng không)
    public function Check($value, $table, $column) {
        $conn = $this->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "SELECT * FROM $table WHERE $column = '$value'";
            $result = $conn->query($sql);
            return $result->num_rows > 0;
        }
    }
    
    // Hàm Insert
    public function Insert($value, $table) {
        $conn = $this->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "INSERT INTO $table VALUES ($value) ";
            $result = $conn->query($sql);
            return $result;
        }
    }
    // Hàm Select
    public function Select($a, $table, $column, $value) {
        $conn = $this->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "SELECT $a from $table WHERE $column = '$value'";
            $result = $conn->query($sql);
            return $result->num_rows > 0;
        }
    }

    // Select trả về tên cột
    public function Select2($a, $table, $column, $value) {
        $conn = $this->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "SELECT $a from $table WHERE $column = '$value'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            return $row[$a];
        }
    }

    // Hàm Update
    public function Update($table, $column, $value, $column2, $value2) {
        $conn = $this->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "UPDATE $table SET $column = '$value' WHERE $column2 = '$value2'";
            return $conn->query($sql);
        }
    }
    public function Delete($table, $column, $value ) {
        $conn = $this->connect();
        if (!$conn) {
            echo "Không thể thực hiện truy vấn. Kết nối chưa được thiết lập.";
            return false;
        } else {
            $sql = "DELETE FROM $table WHERE $column = '$value'";
            return $conn->query($sql);
        }
    }
    
    
}
