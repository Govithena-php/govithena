<?php

class ReviewByInvestor extends Model
{
    public function save($data)
    {
        try {
            $sql = "INSERT INTO review_by_investor (reviewId, investorId, gigId, q1, q2, q3, q4, q5, q6, q7, q8, q9) VALUES(:reviewId, :investorId, :gigId, :q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true, 'data' => true];
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
}
