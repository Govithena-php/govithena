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
            return ['success' => true, 'data' => $gig];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }


    public function fetchAll($order = "ASC", $limit = null)
    {
        try {
            $sql = "SELECT gig.gigId, gig.farmerId, gig.title, gig.thumbnail, gig.capital, gig.city, gig.category, gig.cropCycle, user.firstName, user.lastName FROM gig INNER JOIN user ON gig.farmerId = user.uid";
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

<<<<<<< Updated upstream
    public function Allgig($id)
    {
        try {
            $sql = "SELECT gig.gigId, gig.farmerId, gig.title, gig.thumbnail, gig.capital, gig.city, gig.category, gig.status, gig.landArea, gig.description, investor_gig.investorId, user.firstName as fName, user.lastName as lName FROM gig INNER JOIN investor_gig ON gig.farmerId = investor_gig.farmerId INNER JOIN user ON user.uid = investor_gig.investorId WHERE gig.farmerId = :id ORDER BY createdAt DESC";
            // $sql = "SELECT * FROM gig WHERE farmerId = :id ORDER BY createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $gigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($gigs);
            // die;
            return $gigs;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }
    // public function Investorgig($id)
    // {
    //     try {
    //         $sql = "SELECT * FROM gig_progress WHERE farmerId = :id ORDER BY createdAt DESC";
    //         $stmt = Database::getBdd()->prepare($sql);
    //         $stmt->execute(['id' => $id]);
    //         $gigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
=======
    // public function Allgig($id)
    // {
    //     try {
    //         $sql = "SELECT gig.gigId, gig.farmerId, gig.title, gig.thumbnail, gig.capital, gig.city, gig.category, gig.status, gig.landArea, gig.description, investor_gig.investorId, user.firstName as fName, user.lastName as lName FROM gig INNER JOIN investor_gig ON gig.farmerId = investor_gig.farmerId INNER JOIN user ON user.uid = investor_gig.investorId WHERE gig.farmerId = :id ORDER BY createdAt DESC";
    //         // $sql = "SELECT * FROM gig WHERE farmerId = :id ORDER BY createdAt DESC";
    //         $stmt = Database::getBdd()->prepare($sql);
    //         $stmt->execute(['id' => $id]);
    //         $gigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         // var_dump($gigs);
    //         // die;
>>>>>>> Stashed changes
    //         return $gigs;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //         die();
    //         return null;
    //     }
    // }
<<<<<<< Updated upstream


=======
>>>>>>> Stashed changes

    public function create($data)
    {
        try {
            $sql = "INSERT INTO `gig` (`gigId`, `title`, `description`, `category`, `image`, `capital`, 'profitMargin', `timePeriod`, `location`, `landArea`, `farmerId`) VALUES (:gigId, :title, :description, :category, :image, :capital, :profitMargin, :timePeriod, :location, :landArea, :farmerId)";
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
            return ['success' => true, 'data' => $gig];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    // public function getGigIdFarmerIdByIgIdAndInvestorId($igId, $investorId)
    // {
    //     try {
    //         $sql = "SELECT gigId, farmerId FROM investor_gig WHERE igId = :igId AND investorId = :investorId";
    //         $stmt = Database::getBdd()->prepare($sql);
    //         $stmt->execute(['igId' => $igId, 'investorId' => $investorId]);
    //         $gig = $stmt->fetch(PDO::FETCH_ASSOC);
    //         return ['success' => true, 'data' => $gig];
    //     } catch (PDOException $e) {
    //         return ['success' => false, 'error' => $e->getMessage()];
    //     }
    // }

    public function viewProimg($progressId)
    {
        try {
            $sql = "SELECT * FROM gig_progress_image WHERE progressId = :progressId ";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['progressId' => $progressId]);
            $progressimg = $stmt->fetch(PDO::FETCH_ASSOC);
            return $progressimg;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return null;
        }
    }

    public function viewPro($gigId)
    {
        try {
            $sql = "SELECT * FROM gig_progress WHERE gigId = :gigId ";
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

    public function ReserveGig($data)
    {
        try {
            $sql = "UPDATE gig SET status = 'RESERVED', investorId = :investorId, reservedDate = CURRENT_TIMESTAMP WHERE gigId = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(
                [
                    'id' => $data['gigId'],
                    'investorId' => $data['investorId']
                ]
            );
            return ['success' => true, 'data' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }




    public function fetchGigImages($gigId)
    {
        try {
            $sql = "SELECT image FROM gig_image WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $gigImages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $gigImages];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function updateGigDetails($data)
    {
        try {
            $sql = "UPDATE gig SET title = :title, category = :category, capital = :initialInvestment, cropCycle = :cropCycle, landArea = :landArea, profitMargin =:profitMargin WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function updateGigLocation($data)
    {
        try {
            $sql = "UPDATE gig SET addressLine1 = :addressLine1, addressLine2 = :addressLine2, city = :city, district = :district WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function updateGigDescription($data)
    {
        try {
            $sql = "UPDATE gig SET description = :description WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    //gigs page =================================================================

    public function countActiveGigByInvestor($investorId)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM gig WHERE investorId = :investorId AND status = 'RESERVED'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function countCompletedGigByInvestor($investorId)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM gig WHERE investorId = :investorId AND status = 'COMPLETED'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllReservedGigByInvestor($id)
    {
        try {
            $sql = "SELECT g.gigId, g.farmerId, g.title, g.city, g.thumbnail, u.firstName, u.lastName, u.image, u.city as FCity, DATE(g.reservedDate) as reservedDate FROM gig g INNER JOIN user u ON g.farmerId = u.uid WHERE g.investorId = :id AND g.status = 'RESERVED' ORDER BY g.reservedDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => true, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllToReviewGigByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM investor_gig INNER JOIN gig ON investor_gig.gigId = gig.gigId WHERE investorId = :id AND investor_gig.status = 'TO_REVIEW' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => true, 'data' => $e->getMessage()];
        }
    }

    public function getCompletedGigsByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM investor_gig INNER JOIN gig ON investor_gig.gigId = gig.gigId WHERE investorId = :id AND investor_gig.status = 'COMPLETED' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => true, 'data' => $e->getMessage()];
        }
    }

    public function getfarmerIdByGigId($gigId)
    {
        try {
            $sql = "SELECT farmerId FROM gig WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $gig = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $gig];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getReservedGigCount($investorId)
    {
        try {
            $sql = "SELECT count(*) as gigCount FROM gig WHERE investorId = :investorId AND status = 'RESERVED' OR status='UNDER_COMPLETION'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getCompletedGigCount($investorId)
    {
        try {
            $sql = "SELECT count(*) as gigCount FROM gig WHERE investorId = :investorId AND status = 'COMPLETED' OR status = 'UNDER_REVIEW'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
