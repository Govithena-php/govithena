<?php

class Admin
{
    public function fetchAll()
    {
        try {
            $sql = "SELECT u.uid, u.firstName, u.lastName, u.phoneNumber, u.city, u.image, lc.userType, lc.createdAt, lc.image FROM users u INNER JOIN login_credential lc ON u.Uid = lc.Uid ORDER BY DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            die(var_dump($result));
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
