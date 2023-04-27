<?php

class Farmer extends Model
{
    public function agrologists()
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::AGROLOGIST]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }


    public function techAssistants()
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName, user.image FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::TECH]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function sendAgrologistRequest($data)
    {
        try {
            $sql = "INSERT INTO agrologist_request (requestId, farmerId, agrologistId, message, status) VALUES (:requestId, :farmerId, :agrologistId, :message, :status)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'requestId' => $data['requestId'],
                'farmerId' => $data['farmerId'],
                'agrologistId' => $data['agrologistId'],
                'message' => $data['message'],
                'status' => $data['status']
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

    public function sendTechRequest($data)
    {
        try {
            $sql = "INSERT INTO techassistant_request (requestId, farmerId, technicalAssistantId, message, status) VALUES (:requestId, :farmerId, :technicalAssistantId, :message, :status)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'requestId' => $data['requestId'],
                'farmerId' => $data['farmerId'],
                'technicalAssistantId' => $data['technicalAssistantId'],
                'message' => $data['message'],
                'status' => $data['status']
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
            $sql = "SELECT fr.requestId, fr.requestedDate, fr.offer, fr.message, user.firstName, user.lastName,  gig.title, gig.thumbnail, gig.city from farmer_request fr INNER JOIN gig ON gig.gigId = fr.gigId INNER JOIN user ON user.uid = fr.investorId WHERE fr.farmerId = :farmerId AND fr.state = :state";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function acceptInvestor($data)
    {
        try {
            $sql = "UPDATE farmer_request SET state = :state WHERE farmer_request.requestId = :requestId";
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
            $sql = "UPDATE farmer_request SET state = :state WHERE farmer_request.requestId = :requestId";
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

    public function getnotifications(){
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
