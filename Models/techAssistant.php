<?php

class TechAssistant extends Model
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

    public function getRejectedFarmerRequest()
    {
        try {
            $sql = "SELECT tr.requestId, DATE(tr.requestedDate) as requestedDate, tr.farmerId, tr.offer, tr.message, tr.status, u.image, u.firstName, u.lastName, u.city FROM techassistant_request tr INNER JOIN user u ON tr.farmerId = u.uid WHERE tr.technicalAssistantId = :tid AND tr.status = 'Declined' ORDER BY requestedDate DESC";
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
            $sql = "UPDATE techAssistant_request SET status = 'Accepted' WHERE requestId = :requestId";
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
            $sql = "UPDATE techassistant_request SET status = 'Declined' WHERE requestId = :requestId";
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
            $sql = "SELECT tf.id, tf.techId, tf.farmerId, tf.status, DATE(tf.timestamp) AS acceptedDate, u.firstName, u.lastName, u.image, u.city FROM tech_farmer tf INNER JOIN user u on tf.farmerId = u.uid WHERE tf.techId = :techId AND tf.status = 'ACTIVE'";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['techId' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $req];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }


    public function getRequestData($reqId)
    {
        try {
            $sql = "SELECT * FROM techassistant_request WHERE requestId = :reqId";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['reqId' => $reqId]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function addTechFarmer($data)
    {
        try {
            $sql = "INSERT INTO tech_farmer(id, techId, farmerId) VALUES(:id, :techId, :farmerId)";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute([
                'id' => uniqid(),
                'techId' => $data['techId'],
                'farmerId' => $data['farmerId']
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getAssignedGigs($techId)
    {
        try {
            $sql = "SELECT tg.id, tg.status, tg.timestamp, tg.gigId, g.title, g.thumbnail, g.category from tech_gig tg INNER JOIN gig g ON tg.gigId = g.gigId WHERE tg.techId = :techId";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['techId' => $techId]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $req];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }


    public function checkGig($id)
    {
        try {
            $sql = "SELECT gigId FROM tech_gig WHERE gigId = :id";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($req) {
                return ['success' => true, 'data' => true];
            } else {
                return ['success' => true, 'data' => false];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function findGigById($id)
    {
        try {
            $sql = "SELECT g.gigId, g.title, g.description, g.thumbnail, g.category, g.capital, g.profitMargin, g.cropCycle, g.city, g.district, g.landArea, g.addressLine1, g.addressLine2, u.firstName, u.lastName, u.city, u.image FROM gig g INNER JOIN user u ON g.farmerId = u.uid WHERE g.gigId = :id";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $req];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function getProgressById($id)
    {
        try {
            $sql = "SELECT gp.progressId, gp.userId, gp.subject, gp.description, DATE(gp.timestamp) AS progressDate, TIME(gp.timestamp) AS progressTime, u.firstName, u.lastName, u.image FROM gig_progress gp INNER JOIN user u ON u.uid = gp.userId WHERE gigId = :id ORDER BY timestamp DESC";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $req];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function fetchImagesByProgressId($progressId)
    {
        try {
            $sql = "SELECT imageName FROM gig_progress_image WHERE progressId = :progressId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['progressId' => $progressId]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $data];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
