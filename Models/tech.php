<?php

class Tech extends Model
{
  
    function farmerRequest()
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, u.city, a.requestId FROM techassistant_request a LEFT JOIN user u ON u.uid = a.farmerId WHERE (a.technicalAssistantId = :techassistantId AND a.status='Pending')";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['techassistantId' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    
    function acceptRequest($requestId)
    {
        try {
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

    public function getFarmers(){
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