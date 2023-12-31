<?php
//namespace có tác dụng tạo ra định danh cho lớp một cách cụ thể hóa
namespace data;
use PDO;
use PDOException;
use data\Router;

class Database{
    public $connection;
    public $statement;
    //Hàm __construct là hàm tự động khởi tạo khi tạo ra 1 đối tượng của lớp này
    public function __construct($config){
        $username = "root"; // Tên người dùng MySQL
        $password = "00Gundam#1416"; // Mật khẩu MySQL
        // $username = "HuyHVQ"; // Tên người dùng MySQL
        // $password = "12345"; // Mật khẩu MySQL
        try {
            // Connect database
            $dsn = 'mysql:' . http_build_query($config, '', ';');
            //$this->connection = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    public function query($query, $params = []){
        try {
            // Tạo query
            $this->statement = $this->connection->prepare($query);
            // Execute query
            $this->statement->execute($params);
            return  $this;
            // $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            //throw $th;
        }
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
        $result = $this->find();
        
        $route = new Router();
        if (!$result) {
            $route->abort();
        }
        return $result;
    }

    public function get(){
        return $this->statement->fetchAll();
    }
}
?>