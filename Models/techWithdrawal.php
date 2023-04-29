<?php

class techWithdrawal
{
    public function getWithdrawalByTechId($id)
    {
        try {
            $sql = "SELECT amount, status, DATE(timestamp) AS wDate, TIME(timestamp) AS wTime FROM tech_withdrawal WHERE userId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getThisMonthTotalWithdrawalsTechId($id)
    {
        try {
            $sql = "SELECT SUM(amount) AS totalWithdrawal FROM tech_withdrawal WHERE userId = :id AND MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp) = YEAR(CURRENT_DATE())";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getTotalWithdrawalsTechId($id)
    {
        try {
            $sql = "SELECT SUM(amount) AS totalWithdrawal FROM tech_withdrawal WHERE userId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
