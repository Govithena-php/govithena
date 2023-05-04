<?php

class Agrologist extends Model
{
    function farmerRequest()
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, u.city, a.requestId, a.timePeriod, a.message, a.offer, u.image, COUNT(r.q1) AS num, (SUM(r.q1)+SUM(r.q2)+SUM(r.q3)+SUM(r.q4)+SUM(r.q5)+SUM(r.q6)+SUM(r.q7)) AS total FROM agrologist_request a LEFT JOIN user u ON u.uid = a.farmerId LEFT JOIN review_by_agrologist r ON  a.farmerId=r.farmerId WHERE (a.agrologistId = :agrologistId AND a.status='Pending') GROUP BY r.farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['agrologistId' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    function farmerRequestDetails($requestId)
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, CONCAT_WS(', ',u.addressLine1, u.addressLine2, u.city, u.district, u.postalCode) AS place, a.requestId, a.message, a.offer, a.timePeriod, u.image, COUNT(r.q1) AS num, (SUM(r.q1)+SUM(r.q2)+SUM(r.q3)+SUM(r.q4)+SUM(r.q5)+SUM(r.q6)+SUM(r.q7)) AS total FROM agrologist_request a LEFT JOIN user u ON u.uid = a.farmerId LEFT JOIN review_by_agrologist r ON  a.farmerId=r.farmerId WHERE (a.requestId=:requestId) GROUP BY r.farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $requestId]);
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

    function declineRequest($requestId)
    {
        try {
            $sql = "UPDATE agrologist_request SET status = 'Declined' WHERE requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $requestId]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    function completeRequest($requestId)
    {
        try {
            $sql = "UPDATE agrologist_request SET status = 'Completed' WHERE requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $requestId]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    function declineNotificationFarmer($uid)
    {
        try {
            $sql = "INSERT INTO notification(notified_to, notified_by, title, message, link, published_time) VALUES(:notified_to, :notified_by, :title, :message, :link, :published_time)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'notified_to' => $uid,
                'notified_by' => Session::get('user')->getUid(),
                'title' => 'Decline Farmer Request',
                'message' => 'Decline Farmer Request',
                'link' => 'agrologist/farmerRequest',
                'published_time' => date('Y-m-d H:i:s')
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    function getFarmerId($requestId)
    {
        try {
            $sql = "SELECT farmerId FROM agrologist_request WHERE requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $requestId]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    function getAgrologistDetails()
    {
        try {
            $sql = "SELECT u.firstName, u.lastName, u.NIC, u.phoneNumber, u.city, c.userType, c.username, u.addressLine1, u.addressLine2, u.district, u.postalCode, u.image FROM user u LEFT JOIN login_credential c ON u.uid = c.uid WHERE u.uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function edit_user_details($data)
    {

        $sql = "UPDATE user SET firstName=:firstName, lastName=:lastName, phoneNumber=:phoneNumber, city=:city, NIC=:nic, addressLine1=:addressLine1, addressLine2=:addressLine2, district=:district, postalCode=:postalCode, image=:profileImage WHERE uid=:uid";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            'uid' => $data['uid'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'city' => $data['city'],
            'phoneNumber' => $data['phoneNumber'],
            'nic' => $data['nic'],
            'addressLine1' => $data['addressLine1'],
            'addressLine2' => $data['addressLine2'],
            'district' => $data['district'],
            'postalCode' => $data['postalCode'],
            'profileImage' => $data['profileImage']
        ]);
        return $req->fetch();
    }

    public function edit_user_without_image($data)
    {

        try {
            $sql = "UPDATE user SET firstName=:firstName, lastName=:lastName, phoneNumber=:phoneNumber, city=:city, NIC=:nic, addressLine1=:addressLine1, addressLine2=:addressLine2, district=:district, postalCode=:postalCode WHERE uid=:uid";
            $req = Database::getBdd()->prepare($sql);
            $req->execute([
                'uid' => $data['uid'],
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'city' => $data['city'],
                'phoneNumber' => $data['phoneNumber'],
                'nic' => $data['nic'],
                'addressLine1' => $data['addressLine1'],
                'addressLine2' => $data['addressLine2'],
                'district' => $data['district'],
                'postalCode' => $data['postalCode']
            ]);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getFarmers()
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, u.city, a.requestId, a.farmerId, a.offer, u.image, COUNT(r.q1) AS num, a.requestedDate, a.timePeriod,(SUM(r.q1)+SUM(r.q2)+SUM(r.q3)+SUM(r.q4)+SUM(r.q5)+SUM(r.q6)+SUM(r.q7)) AS total FROM agrologist_request a LEFT JOIN user u ON u.uid = a.farmerId LEFT JOIN review_by_agrologist r ON  a.farmerId=r.farmerId  WHERE (a.agrologistId = :agrologistId AND a.status='Accepted') GROUP BY r.farmerId ";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['agrologistId' => Session::get('user')->getUid()]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getFarmerReviews($farmerId)
    {
        try {
            $sql = "SELECT SUM(q1,q2,q3,q4,q5,q6,q7) AS total FROM review_by_agrologist WHERE farmerId = :farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['agrologistId' => $farmerId]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }



    public function insertFieldVisit($data)
    {
        try {
            $sql = "INSERT INTO field_visit (visitId, week, gigId, agrologistId, farmerId, fieldVisitDetails, thumbnail, visitDate) VALUES (:visitId, :week, :gigId, :agrologistId, :farmerId, :fieldVisitDetails, :fieldVisitImage, :visitDate)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'visitId' => $data['visitId'],
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

    public function insertFieldVisitImage($data)
    {
        try {
            $sql = "INSERT INTO field_visit_image (image, visitId) VALUES (:image, :visitId)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'image' => $data['image'],
                'visitId' => $data['visitId'],
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function getFieldVisitDetails($fid, $gid)
    {
        try {
            $sql = "SELECT f.week, f.visitDate, f.fieldVisitDetails, f.thumbnail, i.image FROM field_visit f LEFT JOIN field_visit_image i ON f.visitId=i.visitId WHERE f.agrologistId = :agrologistId AND f.farmerId= :farmerId AND f.gigId = :gigId ORDER BY f.visitDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid(),
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

    public function getFarmerGigs($data)
    {
        try {
            $sql = "SELECT g.thumbnail, g.city, g.title, g.category, g.cropCycle, u.firstName, u.lastName, g.farmerId, g.gigId FROM gig g LEFT JOIN user u ON u.uid=g.farmerId WHERE g.farmerId = :farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
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

    public function getFarmerGigsRequest($requestId)
    {
        try {
            $sql = "SELECT g.thumbnail, g.city, g.title, g.category, g.cropCycle, u.firstName, u.lastName, g.farmerId, g.gigId FROM gig g LEFT JOIN agrologist_request a ON g.farmerId=a.farmerId LEFT JOIN user u ON u.uid=g.farmerId WHERE a.requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'requestId' => $requestId
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }



    public function getnotifications()
    {
        try {
            $sql = "SELECT n.id, n.notified_to, n.title, n.message, n.link, n.saved_time, n.published_time FROM notification n WHERE n.notified_to = :notified_to ORDER BY n.saved_time DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'notified_to' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getmessages($userId)
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName, u.image  FROM user u WHERE u.uid = :userId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'userId' => $userId
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function insertMessages($data)
    {
        try {
            $sql = "INSERT INTO message(incomingMsgId, outgoingMsgId, msg) VALUES (:incomingMsgId, :outgoingMsgId, :msg)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'incomingMsgId' => $data['incomingMsgId'],
                'outgoingMsgId' => $data['outgoingMsgId'],
                'msg' => $data['msg']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function save($data)
    {
        try {
            $sql = "INSERT INTO review_by_agrologist (reviewId, agrologistId, farmerId, q1, q2, q3, q4, q5, q6, q7, q8, q9) VALUES(:reviewId, :agrologistId,:farmerId, :q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true, 'data' => true];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getFarmerName($farmerId)
    {
        try {
            $sql = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS fullName  FROM user u WHERE u.uid = :farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'farmerId' => $farmerId
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getFarmerCount()
    {
        try {
            $sql = "SELECT COUNT(r.farmerId) AS farmerCount FROM agrologist_request r WHERE r.agrologistId=:agrologistId AND r.status='Accepted'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getFarmerCountLastMonh()
    {
        try {
            $sql = "SELECT COUNT(r.farmerId) AS farmerCount FROM agrologist_request r WHERE r.agrologistId=:agrologistId AND (r.status='Accepted' OR r.status='Completed') AND YEAR(r.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
            AND MONTH(r.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getFarmerCountTwoMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(r.farmerId) AS farmerCount FROM agrologist_request r WHERE r.agrologistId=:agrologistId AND (r.status='Accepted' OR r.status='Completed') AND YEAR(r.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH)
            AND MONTH(r.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getFarmerCountThreeMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(r.farmerId) AS farmerCount FROM agrologist_request r WHERE r.agrologistId=:agrologistId AND (r.status='Accepted' OR r.status='Completed') AND YEAR(r.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH)
            AND MONTH(r.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getFarmerCountFourMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(r.farmerId) AS farmerCount FROM agrologist_request r WHERE r.agrologistId=:agrologistId AND (r.status='Accepted' OR r.status='Completed') AND YEAR(r.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 4 MONTH)
            AND MONTH(r.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 4 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getFarmerCountFiveMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(r.farmerId) AS farmerCount FROM agrologist_request r WHERE r.agrologistId=:agrologistId AND (r.status='Accepted' OR r.status='Completed') AND YEAR(r.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 5 MONTH)
            AND MONTH(r.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 5 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getGigCount()
    {
        try {
            $sql = "SELECT COUNT(g.gigId) AS gigCount FROM agrologist_request a LEFT JOIN gig g  ON a.farmerId=g.farmerId  WHERE a.agrologistId=:agrologistId AND a.status='Accepted' AND g.status='ACTIVE'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getGigCountLastMonth()
    {
        try {
            $sql = "SELECT COUNT(g.gigId) AS gigCount FROM agrologist_request a LEFT JOIN gig g  ON a.farmerId=g.farmerId  
            WHERE a.agrologistId=:agrologistId AND (a.status='Accepted' OR a.status='Completed') AND 
            (g.status='ACTIVE' OR g.status='COMPLETED') AND YEAR(g.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
            AND MONTH(g.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getGigCountTwoMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(g.gigId) AS gigCount FROM agrologist_request a LEFT JOIN gig g ON a.farmerId=g.farmerId  
            WHERE a.agrologistId=:agrologistId AND (a.status='Accepted' OR a.status='Completed') AND 
            (g.status='ACTIVE' OR g.status='COMPLETED') AND YEAR(g.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH)
            AND MONTH(g.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getGigCountThreeMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(g.gigId) AS gigCount FROM agrologist_request a LEFT JOIN gig g ON a.farmerId=g.farmerId  
            WHERE a.agrologistId=:agrologistId AND (a.status='Accepted' OR a.status='Completed') AND 
            (g.status='ACTIVE' OR g.status='COMPLETED') AND YEAR(g.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH)
            AND MONTH(g.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
            
        }
    }

    public function getGigCountFourMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(g.gigId) AS gigCount FROM agrologist_request a LEFT JOIN gig g ON a.farmerId=g.farmerId  
            WHERE a.agrologistId=:agrologistId AND (a.status='Accepted' OR a.status='Completed') AND 
            (g.status='ACTIVE' OR g.status='COMPLETED') AND YEAR(g.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 4 MONTH)
            AND MONTH(g.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 4 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
            
        }
    }

    public function getGigCountFiveMonthsBefore()
    {
        try {
            $sql = "SELECT COUNT(g.gigId) AS gigCount FROM agrologist_request a LEFT JOIN gig g ON a.farmerId=g.farmerId  
            WHERE a.agrologistId=:agrologistId AND (a.status='Accepted' OR a.status='Completed') AND 
            (g.status='ACTIVE' OR g.status='COMPLETED') AND YEAR(g.statusChangeDate) = YEAR(CURRENT_DATE - INTERVAL 5 MONTH)
            AND MONTH(g.statusChangeDate) = MONTH(CURRENT_DATE - INTERVAL 5 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
            
        }
    }

    public function getAgrologistTotalIncome()
    {
        try {
            $sql = "SELECT SUM(p.payment) AS total_income FROM agrologist_payment p WHERE p.agrologistId=:agrologistId GROUP BY p.agrologistId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getAgrologistMonthlyIncome()
    {
        try {
            $sql = "SELECT SUM(p.payment) AS total_income FROM agrologist_payment p WHERE p.agrologistId=:agrologistId AND YEAR(p.paidDate) = YEAR(CURDATE()) AND MONTH(p.paidDate) = MONTH(CURDATE()) GROUP BY p.agrologistId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getAgrologistFieldVisits()
    {
        try {
            $sql = "SELECT COUNT(f.visitId) AS visit_count FROM field_visit f WHERE f.agrologistId=:agrologistId AND MONTH(f.visitDate) = MONTH(CURDATE()) AND  YEAR(f.visitDate) = YEAR(CURDATE()) ";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getAgrologistFieldVisitsLastMonth()
    {
        try {
            $sql = "SELECT COUNT(f.visitId) AS visit_count FROM field_visit f WHERE f.agrologistId=:agrologistId AND YEAR(f.visitDate) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
            AND MONTH(f.visitDate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getRequestTimePeriod($farmerId)
    {
        try {
            $sql = "SELECT r.timePeriod, r.statusChangeDate,r.offer, COUNT(f.visitId) AS numvisits FROM agrologist_request r
            LEFT JOIN field_visit f ON (r.farmerId=f.farmerId AND r.agrologistId=f.agrologistId) 
            WHERE (r.agrologistId=:agrologistId AND r.farmerId=:farmerId AND r.status='Accepted')";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid(),
                'farmerId' => $farmerId
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getPaymentDetails($farmerId)
    {
        try {
            $sql = "SELECT p.payment, p.paidDate FROM agrologist_payment p WHERE p.agrologistId=:agrologistId AND p.farmerId=:farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid(),
                'farmerId' => $farmerId
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getAccountDetails()
    {
        try {
            $sql = "SELECT accountNumber, bank, branch, branchCode FROM bank_account WHERE user=:userId AND status='ACTIVE'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'userId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function insertAccountDetails($data)
    {
        try {
            $sql = "INSERT INTO  bank_account (accountNumber, user, bank, branch, branchCode, status) VALUES (:accountNumber, :userId, :bank, :branch, :branchCode, 'ACTIVE')";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'accountNumber' => $data['accountNumber'],
                'userId' => Session::get('user')->getUid(),
                'bank' => $data['bank'],
                'branch' => $data['branch'],
                'branchCode' => $data['branchCode']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function updateAccountDetails($data)
    {
        try {
            $sql = "UPDATE bank_account SET accountNumber=:accountNumber, bank=:bank, branch=:branch, branchCode=:branchCode WHERE user=:userId";
            $req = Database::getBdd()->prepare($sql);
            $req->execute([
                'accountNumber' => $data['accountNumber'],
                'userId' => Session::get('user')->getUid(),
                'bank' => $data['bank'],
                'branch' => $data['branch'],
                'branchCode' => $data['branchCode']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getQualificationDetails()
    {
        try {
            $sql = "SELECT gnCertificate, description FROM agrologist_qualifications WHERE uid=:userId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'userId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function insertQualificationDetails($data)
    {
        try {
            $sql = "INSERT INTO  agrologist_qualifications (uid, gnCertificate, description) VALUES (:uid, :gnCertificate, :description)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'uid' => Session::get('user')->getUid(),
                'gnCertificate' => $data['gnCertificate'],
                'description' => $data['description']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function updateQualificationDetails($data)
    {
        try {
            $sql = "UPDATE agrologist_qualifications SET gnCertificate=:gnCertificate, description=:description WHERE uid=:uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'uid' => Session::get('user')->getUid(),
                'gnCertificate' => $data['gnCertificate'],
                'description' => $data['description']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function updateQualificationDescription($data)
    {
        try {
            $sql = "UPDATE agrologist_qualifications SET description=:description WHERE uid=:uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'uid' => Session::get('user')->getUid(),
                'description' => $data['description']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getAgrologistTotalWithrawal()
    {
        try {
            $sql = "SELECT SUM(w.withdrawal) AS total_withdrawal FROM agrologist_withdrawal w WHERE w.agrologistId=:agrologistId GROUP BY w.agrologistId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getAgrologistMonthlyWithrawal()
    {
        try {
            $sql = "SELECT SUM(w.withdrawal) AS total_withdrawal FROM agrologist_withdrawal w WHERE w.agrologistId=:agrologistId AND MONTH(w.withdrawalDate) = MONTH(CURDATE()) GROUP BY w.agrologistId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function insertWithdrawals($data)
    {
        try {
            $sql = "INSERT INTO  agrologist_withdrawal (withdrawalId, agrologistId, withdrawal) VALUES (:withdrawalId, :agrologistId, :withdrawal)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'withdrawalId' => $data['withdrawalId'],
                'agrologistId' => Session::get('user')->getUid(),
                'withdrawal' => $data['withdrawal']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function getIncome()
    {
        try {
            $sql = "SELECT p.payment, p.paidDate, CONCAT(u.firstName , ' ', u.lastName) AS fullName FROM agrologist_payment p LEFT JOIN user u ON u.uid=p.farmerId WHERE p.agrologistId=:agrologistId ORDER BY p.paidDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getIncomeLimit()
    {
        try {
            $sql = "SELECT p.payment, p.paidDate, CONCAT(u.firstName , ' ', u.lastName) AS fullName FROM agrologist_payment p LEFT JOIN user u ON u.uid=p.farmerId WHERE p.agrologistId=:agrologistId ORDER BY p.paidDate DESC LIMIT 5";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }


    public function getWithdrawals()
    {
        try {
            $sql = "SELECT withdrawal, withdrawalDate FROM agrologist_withdrawal WHERE agrologistId=:agrologistId ORDER BY withdrawalDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getWithdrawalsLimit()
    {
        try {
            $sql = "SELECT withdrawal, withdrawalDate FROM agrologist_withdrawal WHERE agrologistId=:agrologistId ORDER BY withdrawalDate DESC LIMIT 5";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $req;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;

        }
    }

    public function getGigsPerCategory()
    {
        try {
            $sql = "SELECT g.category, COUNT(g.gigId) AS gigCount FROM gig g LEFT JOIN agrologist_request a ON a.farmerId=g.farmerId WHERE a.agrologistId=:agrologistId GROUP BY g.category";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => Session::get('user')->getUid()
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