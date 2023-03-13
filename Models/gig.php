<?php

class Gig extends Model
{
    function viewGig($id)
    {
        try {
            $sql = "SELECT * FROM gig WHERE gigId = :id";
            $stmt =  Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $gig = $stmt->fetch(PDO::FETCH_ASSOC);
            return $gig;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }


    public function fetchAll($order = "ASC", $limit = null)
    {
        try {
            $sql = "SELECT gig.gigId, gig.farmerId, gig.title, gig.image, gig.capital, gig.location, gig.category, gig.timePeriod, user.firstName, user.lastName FROM gig INNER JOIN user ON gig.farmerId = user.uid";
            if ($order == "ASC") {
                $sql .= " ORDER BY createdAt ASC";
            } else {
                $sql .= " ORDER BY createdAt DESC";
            }
            if (isset($limit)) $sql .= " LIMIT $limit";

            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $gigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($gigs) {
                return ['status' => true, 'data' => $gigs];
            } else {
                return ['status' => true, 'data' => null];
            }
        } catch (PDOException $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }


    public function All($id)
    {
        try {
            $sql = "SELECT * FROM gig WHERE farmerId = :id ORDER BY createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $gigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $gigs;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }


    public function create($data)
    {
        try {
            $sql = "INSERT INTO `gig` (`gigId`, `title`, `description`, `category`, `thumbnail`, `profitRate`, `capital`, `timePeriod`, `location`, `landArea`, `farmerId`) VALUES (:gigId, :title, :description, :category, :thumbnail, :capital, :profitRate, :timePeriod, :location, :landArea, :farmerId)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function fetchBy($gigId)
    {
        try {
            $sql = "SELECT * FROM gig WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $gig = $stmt->fetch(PDO::FETCH_ASSOC);
            return $gig;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function saveGigImage($data)
    {
        try {
            $sql = "INSERT INTO gig_image (imageName, gigId) VALUES (:imageName, :gigId)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'imageName' => $data['imageName'],
                'gigId' => $data['gigId']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
