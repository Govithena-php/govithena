<?php

class recentActivity
{
    public function getRecentActivityByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM recent_activity_investor WHERE investorId = :id ORDER BY timestamp DESC LIMIT 5";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return ['success' => true, 'data' => $result];
            } else {
                return ['success' => false, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
    public function getRecentActivityByGigId($id)
    {
        try {
            $sql = "SELECT * FROM recent_activity_investor WHERE gigId = :id ORDER BY timestamp DESC LIMIT 7";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return ['success' => true, 'data' => $result];
            } else {
                return ['success' => false, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
