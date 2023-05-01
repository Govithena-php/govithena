<?php

class Progress
{
    public function fetchAllByIgId($igId)
    {
        try {
            $sql = "SELECT gp.progressId, gp.userId, gp.gigId, gp.subject, gp.description, gp.userType, DATE(gp.timestamp) as date, TIME(gp.timestamp) as time, u.firstName, u.lastName, u.image FROM gig_progress as gp INNER JOIN user u on u.uid = gp.userId WHERE gp.igId = :igId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['igId' => $igId]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $data];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function fetchImagesByProgressId($progressId)
    {
        try {
            $sql = "SELECT fpi.image FROM gig_progress_image as fpi WHERE progressId = :progressId";
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
            $sql = "INSERT INTO gig_progress (`progressId`, `userId`, `gigId`, `subject`, `description`) VALUES (:progressId, :userId, :gigId, :subject, :description)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'progressId' => $data['progressId'],
                'userId' => $data['userId'],
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
            $sql = "INSERT INTO gig_progress_image (imageName, progressId) VALUES (:imageName, :progressId)";
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

    public function deleteProgress($progressId)
    {
        try {
            $sql = "DELETE FROM gig_progress WHERE progressId = :progressId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'progressId' => $progressId
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function deleteProgressImages($progressId)
    {
        try {
            $sql = "DELETE FROM gig_progress_image WHERE progressId = :progressId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'progressId' => $progressId
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function updateProgress($data)
    {
        try {
            $sql = "UPDATE gig_progress SET subject = :subject, description = :description, timestamp = CURRENT_TIMESTAMP WHERE progressId = :progressId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'progressId' => $data['progressId'],
                'subject' => $data['subject'],
                'description' => $data['description']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    // public function updateProgressImage($data)
    // {
    //     try {
    //         $sql = "UPDATE gig_progress_image SET imageName = :imageName WHERE progressId = :progressId";
    //         $stmt = Database::getBdd()->prepare($sql);
    //         $stmt->execute([
    //             'progressId' => $data['progressId'],
    //             'imageName' => $data['imageName']
    //         ]);
    //         return ['success' => true];
    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //         die();
    //         return ['success' => false, 'error' => $e->getMessage()];
    //     }
    // }
}
