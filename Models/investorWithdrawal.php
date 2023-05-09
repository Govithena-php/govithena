<?php

class investorWithdrawal
{
    public function fetchAllBy($id)
    {
        try {
            $sql = "SELECT iw.amount, iw.bankAccount, DATE(iw.timestamp) AS wDate, TIME(iw.timestamp) AS wTime, iw.status, ba.bank, ba.branch  FROM investor_withdrawal iw INNER JOIN bank_account ba ON iw.bankAccount = ba.accountNumber WHERE iw.investorId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function fetchAllByFilter($id, $status, $fromDate, $toDate)
    {
        try {
            $data = ['id' => $id];
            $sql = "SELECT iw.amount, iw.bankAccount, DATE(iw.timestamp) AS wDate, TIME(iw.timestamp) AS wTime, iw.status, ba.bank, ba.branch  FROM investor_withdrawal iw INNER JOIN bank_account ba ON iw.bankAccount = ba.accountNumber WHERE iw.investorId = :id ";
            if ($status != '') {
                $sql .= " AND iw.status = :status ";
                $data['status'] = $status;
            }
            if ($fromDate != '') {
                $sql .= " AND DATE(iw.timestamp) >= :fromDate ";
                $data['fromDate'] = $fromDate;
            }

            if ($toDate != '') {
                $sql .= " AND DATE(iw.timestamp) <= :toDate ";
                $data['toDate'] = $toDate;
            }

            $sql .= " ORDER BY iw.timestamp DESC";

            // echo $sql;
            // print_r($data);
            // die();

            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
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
