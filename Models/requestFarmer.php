<?php

class RequestFarmer extends Model
{

    public function getRequestsByInvestor($id)
    {
        try {
            $sql = "SELECT farmer_request.requestId, gig.gigId, gig.title, gig.image, gig.category, gig.timePeriod, gig.location, user.uid, user.firstName, user.lastName, DATE(farmer_request.requestedDate) as requestedDate, farmer_request.offer, farmer_request.state, farmer_request.message FROM farmer_request INNER JOIN gig ON farmer_request.gigId = gig.gigId INNER JOIN user ON farmer_request.farmerId = user.uid WHERE investorId = :id ORDER BY requestedDate DESC";
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
            $sql = "SELECT * FROM farmer_request WHERE farmerId = :farmerId";
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
            $sql = "INSERT INTO farmer_request (gigId, farmerId, investorId, state, offer, message) VALUES (:gigId, :farmerId, :investorId, :state, :offer, :message)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'gigId' => $data['gigId'],
                'farmerId' => $data['farmerId'],
                'investorId' => $data['investorId'],
                'state' => $data['state'],
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
            $sql = "SELECT * FROM farmer_request INNER JOIN gig ON farmer_request.gigId = gig.gigId INNER JOIN user ON farmer_request.farmerId = user.uid WHERE farmer_request.requestId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function updateStatus($id, $status){
        try {
            $sql = "UPDATE farmer_request SET state = :status WHERE requestId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id, 'status' => $status]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }
}
