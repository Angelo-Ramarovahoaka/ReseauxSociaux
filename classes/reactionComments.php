<?php
class ReactionsComments {
    private $conn;
    private $table_name = "reactionsComments";

    public $id;
    public $reaction;
    public $reaction_date;
    public $publication_id;
    public $comment_id;
    public $user_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read(){
        $stmt=$this->conn->prepare('SELECT rc.*, u.username FROM '. $this->table_name.' rc JOIN users u ON rc.user_id = u.id  WHERE id_publication=:id_publication AND id_comment=:id_comment ORDER BY reaction_date DESC');
        $stmt->bindParam(":publication_id", $this->publication_id);
        $stmt->bindParam(":comment_id", $this->comment_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (reaction, publication_id, comment_id, user_id) VALUES (:reaction, :publication_id, :comment_id, :user_id)";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(":reaction", $this->reaction);
        $stmt->bindParam(":publication_id", $this->publication_id);
        $stmt->bindParam(":comment_id", $this->comment_id);
        $stmt->bindParam(":user_id", $this->user_id);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // public function updateReactionsComments() {
    //     $query = "UPDATE " . $this->table_name . " SET reaction = :reaction WHERE comment_id = :comment_id AND user_id = :user_id";
    //     $stmt = $this->conn->prepare($query);

    //     $stmt->bindParam(":reaction", $this->reaction);
    //     $stmt->bindParam(":comment_id", $this->comment_id);
    //     $stmt->bindParam(":user_id", $this->user_id);

    //     if ($stmt->execute()) {
    //         return true;
    //     }
    //     return false;
    // }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function readByUserAndComment() {
        $query = "SELECT * FROM reactionsComments WHERE comment_id = :comment_id AND user_id = :user_id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":comment_id", $this->comment_id);
        $stmt->bindParam(":user_id", $this->user_id);
        
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }   
}
?>
