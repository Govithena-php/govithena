<?php

class Investment extends Model
{
    public function fetchAllBy($id)
    {
        try {
            $sql = "SELECT investment.id, investment.investorId, investment.gigId, investment.amount, DATE(investment.timestamp) as investedDate, gig.title, gig.thumbnail, gig.category, gig.cropCycle, gig.city FROM investment INNER JOIN gig ON investment.gigId = gig.gigId WHERE investorId = :id ORDER BY timestamp DESC";
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

    public function fetchAllByUsingFilters($id, $filter)
    {
        try {
            $sql = "SELECT investment.id, investment.investorId, investment.gigId, investment.amount, DATE(investment.timestamp) as investedDate, gig.title, gig.thumbnail, gig.category, gig.cropCycle, gig.city FROM investment INNER JOIN gig ON investment.gigId = gig.gigId";
            $sql = $filter->apply($sql);
            $sql .= " AND investment.investorId = :id";
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

    public function fetchByInvestorAndGig($investorId, $gigId)
    {
        try {
            $sql = "SELECT DATE(timestamp) as date, TIME(timestamp) as time, amount FROM investment WHERE investorId = :investorId AND gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId, 'gigId' => $gigId]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }


    public function getTotalInvestmentByInvestor($investorId)
    {
        try {
            $sql = "SELECT sum(amount) as totalInvestment FROM investment WHERE investorId = :investorId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getThisMonthTotalByInvestor($investorId)
    {
        try {
            $sql = "SELECT sum(amount) as thisMonthInvestment FROM investment WHERE investorId = :investorId AND MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp) = YEAR(CURRENT_DATE())";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getLastMonthTotalByInvestor($investorId)
    {
        try {
            $sql = "SELECT sum(amount) as lastMonthInvestment FROM investment WHERE investorId = :investorId AND MONTH(timestamp) = MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)) AND YEAR(timestamp) = YEAR(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
