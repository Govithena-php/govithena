<?php

class Earnings
{
    public function getEarningsByInvestor($id)
    {
        try {
            $sql = "SELECT roi.roiId, roi.farmerId, roi.gigId, roi.amount, roi.description, roi.status, roi.approvedBy, DATE(roi.approvedTimestamp) as approvedDate, TIME(roi.approvedTimestamp) as approvedTime, DATE(roi.timestamp) as createdDate, TIME(roi.timestamp) AS createdTime, u.firstName, u.lastName, u.image, g.title, g.thumbnail, g.city From return_of_investment roi INNER JOIN user u ON roi.farmerId = u.uid INNER JOIN gig g ON roi.gigId = g.gigId WHERE roi.investorId = :id ORDER BY roi.timestamp, roi.approvedTimestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
