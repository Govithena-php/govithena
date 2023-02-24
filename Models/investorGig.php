<?php

class investorGig
{
    public function fetchAllByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM investor_gig INNER JOIN gig ON investor_gig.gigId = gig.gigId WHERE investorId = :id ORDER BY timestamp DESC";
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

    public function add($data)
    {
        try {
            $sql = "INSERT INTO investor_gig (investorId, gigId) VALUES (:investorId, :gigId)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }
}
