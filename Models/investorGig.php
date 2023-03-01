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

    public function fetchAllByFarmer($id)
    {
        try {
            $sql = "SELECT ig.investorId, ig.gigId, ig.timestamp, gig.title, gig.category, gig.image as gimage, gig.location, user.firstName, user.lastName, user.city, user.image as uimage FROM investor_gig as ig INNER JOIN gig ON ig.gigId = gig.gigId INNER JOIN user ON ig.investorId = user.uid WHERE ig.farmerId = :id ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchInvestorByGig($gigId)
    {
        try {
            $sql = "SELECT user.uid, user.firstName, user.lastName, user.image, user.city from user INNER JOIN investor_gig as ig ON ig.investorId = user.uid WHERE ig.gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function add($data)
    {
        try {
            $sql = "INSERT INTO investor_gig (investorId, gigId, farmerId) VALUES (:investorId, :gigId, :farmerId)";
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
