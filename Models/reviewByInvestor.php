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
}
