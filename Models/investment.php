<?php

class Investment extends Model
{
    public function fetchAllBy($id)
    {
        try {
            $sql = "SELECT investment.id, investment.investorId, investment.gigId, investment.amount, DATE(investment.timestamp) as investedDate, gig.title, gig.image, gig.category, gig.timePeriod, gig.location FROM investment INNER JOIN gig ON investment.gigId = gig.gigId WHERE investorId = :id ORDER BY timestamp DESC";
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
            $sql = "INSERT INTO investment (id, investorId, gigId, amount) VALUES (:id, :investorId, :gigId, :amount)";
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
