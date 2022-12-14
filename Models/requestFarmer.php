<?php

class RequestFarmer extends Model
{

    public function getRequestsByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM farmer_request INNER JOIN gig ON farmer_request.gigId = gig.gigId INNER JOIN user ON farmer_request.farmerId = user.uid WHERE investorId = :id ORDER BY requestedDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
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
            $sql = "INSERT INTO farmer_request (gigId, farmerId, investorId, status, offer, message) VALUES (:gigId, :farmerId, :investorId, :status, :offer, :message)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
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
            return false;
        }
    }
}
