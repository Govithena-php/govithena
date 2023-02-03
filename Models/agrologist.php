<?php

class Agrologist extends Model
{
    function farmerRequest()
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, u.city, a.requestId FROM agrologist_request a LEFT JOIN user u ON u.uid = a.farmerId WHERE (a.agrologistId = :agrologistId AND a.status='Pending')";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['agrologistId' => Session::get('uid')]);
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
            $sql = "UPDATE agrologist_request SET status = 'Accepted' WHERE requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $requestId]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    function getAgrologistDetails()
    {
        try {
            $sql = "SELECT u.firstName, u.lastName, u.NIC, u.phoneNumber, u.city, c.userType, c.username FROM user u LEFT JOIN login_credential c ON u.uid = c.uid WHERE u.uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => Session::get('uid')]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function edit_user_details($data){
        $sql = "UPDATE user SET firstName=:firstName, lastName=:lastName, phoneNumber=:phoneNumber, city=:city WHERE uid=:uid";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            'uid' => $data['uid'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'city' => $data['city'],
            'phoneNumber' => $data['phoneNumber'],
        ]);
        return $req->fetch();
    }

    public function getFarmers(){
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, u.city, a.requestId, a.farmerId FROM agrologist_request a LEFT JOIN user u ON u.uid = a.farmerId WHERE (a.agrologistId = :agrologistId AND a.status='Accepted')";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['agrologistId' => Session::get('uid')]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function insertFieldVisit($data){
        try {
            $sql = "INSERT INTO field_visit (week, gigId, agrologistId, farmerId, fieldVisitDetails, image, visitDate) VALUES (:week, :gigId, :agrologistId, :farmerId, :fieldVisitDetails, :fieldVisitImage, :visitDate)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'week' => $data['week'],
                'gigId' => $data['gigId'],
                'farmerId' => $data['farmerId'],
                'agrologistId' => $data['agrologistId'],
                'fieldVisitDetails' => $data['fieldVisitDetails'],
                'fieldVisitImage' => $data['fieldVisitImage'], 
                'visitDate' => $data['visitDate'],
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function getFieldVisitDetails($fid, $gid){
        try {
            $sql = "SELECT * FROM field_visit  WHERE agrologistId = :agrologistId AND farmerId= :farmerId AND gigId = :gigId ORDER BY visitDate DESC";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('uid'),
                'farmerId' => $fid,
                'gigId' => $gid
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getFarmerGigs($data){
        try {
            $sql = "SELECT * FROM gig g LEFT JOIN agrologist_request a ON g.farmerId=a.farmerId LEFT JOIN user u ON u.uid=g.farmerId WHERE g.farmerId = :farmerId AND a.agrologistId = :agrologistId";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('uid'),
                'farmerId' => $data['farmerId']
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

}
