<?php
class Customer extends Model
{
    public function get_order_details()
    {
        $sql = "SELECT * FROM orders";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function create_new_order($data)
    {
        $sql = "INSERT INTO orders (qty, price, farmerId, customerId, productId) VALUES (:qty, :price, :farmerId, :customerId, :productId)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute($data);
        return $req->fetch();
    }
}
