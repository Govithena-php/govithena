<?php

class Investment extends Model
{
    public function fetchAllBy($id)
    {
        try {
            $sql = "SELECT * FROM investment INNER JOIN gig ON investment.gigId = gig.gigId WHERE investorId = :id ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }
}
