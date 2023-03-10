<?php

class FarmerProgress
{
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
            echo $e->getMessage();
            die();
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
            echo $e->getMessage();
            die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
