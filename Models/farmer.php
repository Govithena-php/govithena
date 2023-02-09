<?php

class Farmer extends Model
{
    public function agrologists()
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType";
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
            $sql = "SELECT LG.uid, user.firstName, user.lastName FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::TECH_ASSISTANT]);
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
}
