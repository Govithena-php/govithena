<?php

class FarmerProgress
{
    public function fetchAllByGig($gigId)
    {
        try {
            $sql = "SELECT fp.progressId, fp.farmerId, fp.gigId, fp.subject, fp.description, DATE(fp.timestamp) as date, TIME(fp.timestamp) as time FROM farmer_progress as fp WHERE fp.gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $data];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function fetchImagesByProgressId($progressId)
    {
        try {
            $sql = "SELECT fpi.imageName FROM farmer_progress_image as fpi WHERE progressId = :progressId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['progressId' => $progressId]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $data];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }


    public function create($data)
    {
        try {
            $sql = "INSERT INTO farmer_progress (`progressId`, `farmerId`, `gigId`, `subject`, `description`) VALUES (:progressId, :farmerId, :gigId, :subject, :description)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'progressId' => $data['progressId'],
                'farmerId' => $data['farmerId'],
                'gigId' => $data['gigId'],
                'subject' => $data['subject'],
                'description' => $data['description']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function saveProgressImage($data)
    {
        try {
            $sql = "INSERT INTO farmer_progress_image (imageName, progressId) VALUES (:imageName, :progressId)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'imageName' => $data['imageName'],
                'progressId' => $data['progressId']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
