<?php
class Customer extends Model
{
    public function get_order_details()
    {
        $sql = "SELECT o.productId, o.quantity, o.price, o.orderDate, u.firstName, p.title FROM `order` AS o LEFT JOIN user AS u ON o.farmerId = u.uid LEFT JOIN product AS p ON o.productId = p.productId";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function create_new_order($data)
    {
        $sql = "INSERT INTO orders (quantity, price, farmerId, customerId, productId) VALUES (:qty, :price, :farmerId, :customerId, :productId)";
        $req = Database::getBdd()->prepare($sql);
        $req->execute($data);
        return $req->fetch();
    }
}
