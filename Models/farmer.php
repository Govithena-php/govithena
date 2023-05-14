<?php

class Farmer extends Model
{
    public function agrologists()
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType ORDER BY LG.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::AGROLOGIST]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function getPayAgrologistsone($id)
    {
        try {
            $sql = "SELECT * FROM user WHERE uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $id]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function getPayTechassistantsone($id)
    {
        try {
            $sql = "SELECT * FROM user WHERE uid = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $id]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }


    public function getPayAgrologiststwo($data)
    {
        try {
            $sql = "SELECT * FROM agrologist_request WHERE agrologistId = :agrologistId AND  farmerId = :farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => $data['agrologistId'],
                'farmerId' => $data['farmerId']
            ]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function getPayTechassistantstwo($data)
    {
        try {
            $sql = "SELECT * FROM techassistant_request WHERE technicalAssistantId = :technicalAssistantId AND  farmerId = :farmerId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'technicalAssistantId' => $data['technicalAssistantId'],
                'farmerId' => $data['farmerId']
            ]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function afterPayAgrologists($data)
    {
        try {
            $sql = "INSERT INTO agrologist_payment (paymentId, agrologistId, farmerId, payment) VALUES (:paymentId, :agrologistId, :farmerId, :payment)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'paymentId' => $data['paymentId'],
                'farmerId' => $data['farmerId'],
                'agrologistId' => $data['agrologistId'],
                'payment' => $data['Payment']
            ]);

            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function afterPaytechassistant($data)
    {
        try {
            $sql = "INSERT INTO tech_income (incomeId, userId, farmerId, amount) VALUES (:incomeId, :userId, :farmerId, :amount)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'incomeId' => $data['incomeId'],
                'farmerId' => $data['farmerId'],
                'userId' => $data['userId'],
                'amount' => $data['amount']
            ]);

            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function monthpayAgrologist($data)
    {
        try {
            $sql = "SELECT agrologistId, DATEDIFF(NOW(), paidDate) as dateDiff, paidDate FROM agrologist_payment WHERE agrologistId = :agrologistId AND  farmerId = :farmerId ORDER BY paidDate DESC LIMIT 1";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'agrologistId' => $data['agrologistId'],
                'farmerId' => $data['farmerId']
            ]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($req) {
                return ['status' => true, 'data' => $req];
            } else {
                return ['status' => false, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function monthpayTechassistant($data)
    {
        try {
            $sql = "SELECT userId, DATEDIFF(NOW(), timestamp) as dateDiff, timestamp FROM tech_income WHERE userId = :userId AND  farmerId = :farmerId ORDER BY timestamp DESC LIMIT 1";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'userId' => $data['userId'],
                'farmerId' => $data['farmerId']
            ]);
            $req = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($req) {
                return ['status' => true, 'data' => $req];
            } else {
                return ['status' => false, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }






    public function sendAgrologistRequest($data)
    {
        try {
            $sql = "INSERT INTO agrologist_request (requestId, farmerId, agrologistId, offer, timePeriod, message) VALUES (:requestId, :farmerId, :agrologistId, :offer, :timePeriod, :message)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'requestId' => $data['requestId'],
                'farmerId' => $data['farmerId'],
                'agrologistId' => $data['agrologistId'],
                'offer' => $data['offer'],
                'timePeriod' => $data['timePeriod'],
                'message' => $data['message'],
            ]);
            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }



    public function sendAgrologistRequestRating($data)
    {
        try {
            $sql = "INSERT INTO review_by_agrologist (reviewId, agrologistId, farmerId, q1,q2,q3,q4,q5,q6,q7,q8,q9) VALUES (:reviewId, :agrologistId, :farmerId, 0,0,0,0,0,0,0,'', '')";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }



    public function getAcceptedAgrologistByFarmer($id)
    {
        try {
            $sql = "SELECT ar.agrologistId, ar.farmerId, u.firstName, u.lastName, ar.status, u.city, u.image from agrologist_request ar INNER JOIN user u ON ar.agrologistId = u.uid WHERE ar.farmerId = :farmerId AND ar.status = 'accepted' ORDER BY ar.statusChangeDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => $id]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }
    public function getPendingAgrologistByFarmer($id)
    {
        try {
            $sql = "SELECT ar.requestId, ar.agrologistId, DATE(ar.requestedDate) as requestedDate, ar.timePeriod, ar.offer, ar.message, u.firstName, u.lastName, u.city, u.image from agrologist_request ar INNER JOIN user u ON ar.agrologistId = u.uid WHERE ar.farmerId = :farmerId AND ar.status = 'Pending' ORDER BY ar.statusChangeDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => $id]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function getDeclinedAgrologistByFarmer($id)
    {
        try {
            $sql = "SELECT ar.requestId, ar.agrologistId, DATE(ar.requestedDate) as requestedDate, ar.timePeriod, ar.offer, ar.message, u.firstName, u.lastName, u.city, u.image from agrologist_request ar INNER JOIN user u ON ar.agrologistId = u.uid WHERE ar.farmerId = :farmerId AND ar.status = 'Declined' ORDER BY ar.statusChangeDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => $id]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function searchAgrologists($term)
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid  WHERE LG.userType = :userType AND ";
            $sql .= "(user.firstName LIKE :search OR user.lastName LIKE :search OR LG.username LIKE :search OR user.district LIKE :search OR user.city LIKE :search OR user.addressLine1 LIKE :search OR user.addressLine2 LIKE :search) ORDER BY LG.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::AGROLOGIST, 'search' => '%' . $term . '%']);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }
    public function searchAgrologistsByLocation($location)
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType AND user.district = :location ORDER BY LG.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::AGROLOGIST, 'location' => $location]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function cancelAgrologistRequest($id)
    {
        try {
            $sql = "DELETE FROM agrologist_request WHERE requestId = :requestId";

            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $id]);
            return ['status' => true, 'data' => true];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function cancelTechRequest($id)
    {
        try {
            $sql = "DELETE FROM techassistant_request WHERE requestId = :requestId";

            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['requestId' => $id]);
            return ['status' => true, 'data' => true];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }


    public function techAssistants()
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType ORDER BY LG.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::TECH]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function searchTechAssistant($term)
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType AND ";
            $sql .= "(user.firstName LIKE :search OR user.lastName LIKE :search OR LG.username LIKE :search OR user.district LIKE :search OR user.city LIKE :search OR user.addressLine1 LIKE :search OR user.addressLine2 LIKE :search) ORDER BY LG.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::TECH, 'search' => '%' . $term . '%']);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function searchTechAssistantsByLocation($location)
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType AND user.district = :location ORDER BY LG.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::TECH, 'location' => $location]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }



    public function getAcceptedTechByFarmer($id)
    {
        try {
            $sql = "SELECT tr.technicalAssistantId, tr.farmerId, tr.status, u.firstName, u.lastName, u.city, u.image from techassistant_request tr INNER JOIN user u ON tr.technicalAssistantId = u.uid WHERE tr.farmerId = :farmerId AND tr.status = 'Accepted' ORDER BY tr.requestedDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => $id]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }
    public function getPendingTechByFarmer($id)
    {
        try {
            $sql = "SELECT tr.requestId, tr.technicalAssistantId, DATE(tr.requestedDate) as requestedDate, tr.offer, tr.message, u.firstName, u.lastName, u.city, u.image from techassistant_request tr INNER JOIN user u ON tr.technicalAssistantId = u.uid WHERE tr.farmerId = :farmerId AND tr.status = 'Pending' ORDER BY tr.requestedDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => $id]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function getDeclinedTechByFarmer($id)
    {
        try {
            $sql = "SELECT tr.requestId, tr.technicalAssistantId, DATE(tr.requestedDate) as requestedDate, tr.offer, tr.message, u.firstName, u.lastName, u.city, u.image from techassistant_request tr INNER JOIN user u ON tr.technicalAssistantId = u.uid WHERE tr.farmerId = :farmerId AND tr.status = 'Declined' ORDER BY tr.requestedDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['farmerId' => $id]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function sendTechRequest($data)
    {
        try {
            $sql = "INSERT INTO techassistant_request (requestId, farmerId, technicalAssistantId, message, offer) VALUES (:requestId, :farmerId, :technicalAssistantId, :message, :offer)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'requestId' => $data['requestId'],
                'farmerId' => $data['farmerId'],
                'technicalAssistantId' => $data['technicalAssistantId'],
                'message' => $data['message'],
                'offer' => $data['offer']
            ]);
            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }


    public function investors($data)
    {
        try {
            $sql = "SELECT fr.requestId, fr.requestedDate, fr.offer, fr.message, user.image, user.firstName, user.lastName,  gig.title, gig.thumbnail, gig.city from gig_request fr INNER JOIN gig ON gig.gigId = fr.gigId INNER JOIN user ON user.uid = fr.investorId WHERE fr.farmerId = :farmerId AND fr.status = :state";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function reqinvestors($data)
    {
        try {
            $sql = "SELECT fr.requestId, DATE(fr.requestedDate) as reqdate, fr.offer, fr.message, user.image, user.firstName, user.lastName,  gig.title, gig.thumbnail, gig.city from gig_request fr INNER JOIN gig ON gig.gigId = fr.gigId INNER JOIN user ON user.uid = fr.investorId WHERE fr.farmerId = :farmerId AND fr.status = :state";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function investorlist($data)
    {
        try {
            $sql = "SELECT fr.requestId, user.image, fr.requestedDate, fr.offer, fr.message, user.firstName, user.lastName,  gig.title, gig.thumbnail, gig.city from gig_request fr INNER JOIN gig ON gig.gigId = fr.gigId INNER JOIN user ON user.uid = fr.investorId WHERE fr.farmerId = :farmerId AND fr.status = :status";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'farmerId' => $data['farmerId'],
                'status' => $data['status']
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function investorlistonebyone($data)
    {
        try {
            $sql = "SELECT DISTINCT (fr.investorId), user.image, user.firstName, user.lastName from gig_request fr INNER JOIN user ON user.uid = fr.investorId WHERE fr.farmerId = :farmerId AND fr.status = :status";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'farmerId' => $data['farmerId'],
                'status' => $data['status']
            ]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }



    public function acceptInvestor($data)
    {
        try {
            $sql = "UPDATE gig_request SET status = :status WHERE gig_request.requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function declineInvestor($data)
    {
        try {
            $sql = "UPDATE gig_request SET status = :state WHERE gig_request.requestId = :requestId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function delete_Gig($id)
    {
        try {
            $sql = "DELETE FROM gig WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $id]);
            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function getnotifications()
    {
        try {
            $sql = "SELECT n.id, n.notified_to, n.title, n.message, n.link, n.saved_time, n.published_time FROM notification n WHERE n.notified_to = :notified_to ORDER BY n.saved_time DESC";
            $stmt =  Database::getBdd()->prepare($sql);
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
}
