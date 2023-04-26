<?php

class widthrawl
{
    public function fetchAllBy($id)
    {
        try {
            $sql = "SELECT amount, DATE(timestamp) AS wDate, TIME(timestamp) AS wTime, status  FROM withdrawal WHERE user = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'error' => "no data found"];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }


    public function getTotalWithdrawnByInvestor($id)
    {
        try {
            $sql = "SELECT SUM(amount) AS totalWithdrawn FROM withdrawal WHERE user = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'error' => "no data found"];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
