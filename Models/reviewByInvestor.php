<?php

class ReviewByInvestor extends Model
{
    public function save($data)
    {
        try {
            $sql = "INSERT INTO review_by_investor (reviewId, farmerId, investorId, gigId, q1, q2, q3, q4, q5, q6, q7, q8, q9) VALUES(:reviewId, :farmerId, :investorId, :gigId, :q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllByGig($gigId)
    {
        try {
            $sql = "SELECT rbi.q1, rbi.q2, rbi.q3, rbi.q4, rbi.q5, rbi.q6, rbi.q7, rbi.q8, rbi.q9, rbi.timestamp, user.firstName, user.lastName, user.image FROM review_by_investor as rbi INNER JOIN user ON rbi.investorId = user.uid WHERE rbi.gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                return ['success' => true, 'data' => $result];
            } else {
                return ['success' => false, 'data' => 'no review found'];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllByFarmer($farmerId)
    {
        try {
            $sql = "SELECT rbi.q1, rbi.q2, rbi.q3, rbi.q4, rbi.q5, rbi.q6, rbi.q7, rbi.q8, rbi.q9, rbi.timestamp, user.firstName, user.lastName, user.image FROM review_by_investor as rbi INNER JOIN user ON rbi.investorId = user.uid WHERE rbi.farmerId = :farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => $farmerId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                return ['success' => true, 'data' => $result];
            } else {
                return ['success' => false, 'data' => 'no review found'];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getReviewCountByFarmer($uid)
    {
        try {
            $sql = "SELECT COUNT(reviewId) AS totalReviewCount FROM review_by_investor WHERE farmerId = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $uid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getQuestionsCountsByFarmer($uid)
    {
        try {
            $sql = "SELECT COUNT(CASE WHEN q3 = 1 THEN 1 END) AS q3Count, COUNT(CASE WHEN q4 = 1 THEN 1 END) AS q4Count, COUNT(CASE WHEN q5 = 1 THEN 1 END) AS q5Count, COUNT(CASE WHEN q6 = 1 THEN 1 END) AS q6Count, COUNT(CASE WHEN q7 = 1 THEN 1 END) AS q7Count, COUNT(CASE WHEN q8 = 1 THEN 1 END) AS q8Count FROM review_by_investor WHERE farmerId = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $uid]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
