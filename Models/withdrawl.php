<?php

class withdrawl
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
}
