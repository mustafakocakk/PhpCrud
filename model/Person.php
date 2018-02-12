<?php

/**
 * Person Class
 * Provides access to the "Person" database table.
 *
 *
 */
class Person
{
    /**
     *  Three columns,
     *
     *      - The ID
     *      - The person name
     *      - The person's favourite colour.
     */
    private $host = "localhost";
    private $db_name = "postgres";
    private $username = "postgres";
    private $password = "1234";
    public $conn;
    public $eleman;

    public function __construct()
    {
        var_dump($this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name,
            $this->username, $this->password));
        $this->eleman=new data();
    }

    public function getUsers()
    {$sql = "SELECT * FROM users";
    $results = [];
        foreach ($this->conn->query($sql) as $row) {
            $results[] = $row;
        }
        return $results;
    }
    public function insertUser($user){
       if(isset($user)) {
           $query = $this->conn->prepare('INSERT INTO users (fname, lname) VALUES(?, ?)');
            $query->execute(array($user->fname, $user->lname));
        }
    }
    public function getUser($id){
$eleman=new data();
        $sql = "SELECT * FROM users";
        if(isset($id)){
            $sql .= " WHERE u_id=" . $id;
        }
        $results = [];
        foreach ($this->conn->query($sql) as $row) {
            $results[] = $row;
        }

        $eleman->u_id=$results[0][0];
        $eleman->fname=$results[0][1];
        $eleman->lname=$results[0][2];
        return $eleman;
    }
    public function updateUser($user){
        $eleman=new data();

        if(isset($user)) {
            $sql = "UPDATE users SET fname = :fname,  
            lname = :lname  
            WHERE u_id = :u_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':u_id', $user->u_id, PDO::PARAM_INT);
            $stmt->bindParam(':fname', $user->fname, PDO::PARAM_INT);
            $stmt->bindParam(':lname', $user->lname, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
    public function deleteUser($id){
        if(isset($id)){
            $sql = "DELETE FROM users WHERE u_id =  :u_id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':u_id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }




}
