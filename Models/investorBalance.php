<?php

class investorBalance
{
    public function getBalanceByInvestor($id)
    {
        try {
            $sql = "SELECT balance, DATE(timestamp) as updatedDate, TIME(timestamp) as updatedTime FROM investor_balance WHERE investorId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
