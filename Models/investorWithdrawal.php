<?php

class investorWithdrawal
{
    public function fetchAllBy($id)
    {
        try {
            $sql = "SELECT amount, DATE(timestamp) AS wDate, TIME(timestamp) AS wTime, status  FROM investor_withdrawal WHERE investorId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }


    public function getTotalWithdrawnByInvestor($id)
    {
        try {
            $sql = "SELECT SUM(amount) AS totalWithdrawn FROM investor_withdrawal WHERE user = :id";
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


    public function newWithdrawal($data)
    {
        try {
            $sql = "INSERT INTO investor_withdrawal(id, investorId, amount, bankAccount) VALUES(:id, :investorId, :amount, :bankAccount)";
            $stmt = Database::getBdd()->prepare($sql);
            $res = $stmt->execute([
                'id' => $data['id'],
                'investorId' => $data['investorId'],
                'amount' => $data['amount'],
                'bankAccount' => $data['bankAccount']
            ]);
            if ($res) {
                return ['success' => true, 'data' => true];
            } else {
                return ['success' => false, 'data' => false];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getTotalWithdrawn($id)
    {
        try {
            $sql = "SELECT sum(amount) as totalWithdrawn FROM investor_withdrawal WHERE investorId = :id AND status = 'APPROVED'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'error' => true];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getThisMonthTotalWithdrawn($id)
    {
        try {
            $sql = "SELECT sum(amount) as thisMonthTotalWithdrawn FROM investor_withdrawal WHERE investorId = :id AND status = 'APPROVED' AND MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp) = YEAR(CURRENT_DATE())";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'error' => true];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getClearingWithdrawal($id)
    {
        try {
            $sql = "SELECT sum(amount) as clearingWithdrawal FROM investor_withdrawal WHERE investorId = :id AND status = 'CLEARING'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'error' => true];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
