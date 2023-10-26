<?php

class Database
{
    public $connection;
    public $statement;
    public function __construct($config)
    {
        $username = "HuyHVQ"; // Tên người dùng MySQL
        $password = "12345"; // Mật khẩu MySQL
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

    public function query($query, $params = [])
    {
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

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }
        return $result;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
}
