<?php

class Tech extends Model
{

    function farmerRequest()
    {
        try {
            $sql = "SELECT tr.requestId, DATE(tr.requestedDate) as requestedDate, tr.farmerId, tr.offer, tr.message, tr.status, u.image, u.firstName, u.lastName, u.city FROM techassistant_request tr INNER JOIN user u ON tr.farmerId = u.uid WHERE tr.technicalAssistantId = :tid AND tr.status = 'Pending' ORDER BY requestedDate DESC";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['tid' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $req];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getRejectedFarmerRequest(){
        try {
            $sql = "SELECT tr.requestId, DATE(tr.requestedDate) as requestedDate, tr.farmerId, tr.offer, tr.message, tr.status, u.image, u.firstName, u.lastName, u.city FROM techassistant_request tr INNER JOIN user u ON tr.farmerId = u.uid WHERE tr.technicalAssistantId = :tid AND tr.status = 'Rejected' ORDER BY requestedDate DESC";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['tid' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $req];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }


    function acceptRequest($requestId)
    {
        try {
            // $sql = "SELECT tr.requestId, tr.requestedDate, tr.farmerId, tr.offer, tr.message, tr.status, u.firstName, u.lastName, u.city FROM techassistant_request tr INNER JOIN user u ON tr.technicalAssistantId = u.uid WHERE tr.technicalAssistantId = :id ORDER BY requestedDate DESC";
            $sql = "UPDATE techassistant_request SET status = 'Accepted' WHERE requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $requestId]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    function rejectRequest($requestId)
    {
        try {
            // $sql = "SELECT tr.requestId, tr.requestedDate, tr.farmerId, tr.offer, tr.message, tr.status, u.firstName, u.lastName, u.city FROM techassistant_request tr INNER JOIN user u ON tr.technicalAssistantId = u.uid WHERE tr.technicalAssistantId = :id ORDER BY requestedDate DESC";
            $sql = "UPDATE techassistant_request SET status = 'Rejected' WHERE requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $requestId]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }


    public function getFarmers()
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, u.city, a.requestId, a.farmerId FROM techassistant_request a LEFT JOIN user u ON u.uid = a.farmerId WHERE (a.technicalAssistantId = :techId AND a.status='Accepted')";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['techId' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }
}
