<?php

class gigRequest extends Model
{

    public function getRequestsByInvestor($id)
    {
        try {
            $sql = "SELECT gig_request.requestId, gig.gigId, gig.title, gig.thumbnail, gig.category, gig.subCategory, gig.cropCycle, gig.city, gig.district, user.uid, user.firstName, user.lastName, DATE(gig_request.requestedDate) as requestedDate, gig_request.offer, gig_request.status, gig_request.message FROM gig_request INNER JOIN gig ON gig_request.gigId = gig.gigId INNER JOIN user ON gig_request.farmerId = user.uid WHERE gig_request.investorId = :id ORDER BY requestedDate DESC";
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


    function getFarmerRequest()
    {
        try {
            $sql = "SELECT * FROM gig_request WHERE farmerId = :farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => Session::get('uid')]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    function createFarmerRequest($data)
    {
        try {
            $sql = "INSERT INTO gig_request (requestId, gigId, farmerId, investorId, status, offer, message) VALUES (:requestId, :gigId, :farmerId, :investorId, :status, :offer, :message)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'requestId' => $data['requestId'],
                'gigId' => $data['gigId'],
                'farmerId' => $data['farmerId'],
                'investorId' => $data['investorId'],
                'status' => $data['status'],
                'offer' => $data['offer'],
                'message' => $data['message']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function getRequestById($id)
    {
        try {
            $sql = "SELECT * FROM gig_request INNER JOIN gig ON gig_request.gigId = gig.gigId INNER JOIN user ON gig_request.farmerId = user.uid WHERE gig_request.requestId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function updateStatus($id, $status)
    {
        try {
            $sql = "UPDATE gig_request SET status = :status WHERE requestId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id, 'status' => $status]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM gig_request WHERE requestId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }


    public function resend($data)
    {
        try {
            $sql = "UPDATE gig_request SET status = 'PENDING', offer = :offer, message = :message WHERE requestId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'id' => $data['id'],
                'offer' => $data['offer'],
                'message' => $data['message']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
