<?php
class customer_dashboard extends Model{
    public function get_order_details(){
        $sql = "SELECT * FROM orders";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    
}

    
