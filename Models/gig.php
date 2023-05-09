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

    public function Allgig($id)
    {
        try {
            $sql = "SELECT gig.gigId, gig.farmerId, gig.title, gig.thumbnail, gig.capital, gig.city, gig.category, gig.status, gig.landArea, gig.description, gig.investorId, user.firstName as fName, user.lastName as lName FROM gig INNER JOIN user ON gig.investorId = user.uid WHERE gig.farmerId = :id ORDER BY createdAt DESC";
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
    //         return $gigs;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //         die();
    //         return null;
    //     }
    // }



    public function create($data)
    {
        try {
            $sql = "INSERT INTO `gig` (`gigId`, `title`, `description`, `category`, `image`, `capital`, 'profitMargin', `cropCycle`, `city`, `landArea`, `farmerId`) VALUES (:gigId, :title, :description, :category, :image, :capital, :profitMargin, :timePeriod, :location, :landArea, :farmerId)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function updateDetails($data){
    // var_dump($data);
    // die();
        try {
            // $sql = "UPDATE gig SET status = 'RESERVED', investorId = :investorId, reservedDate = CURRENT_TIMESTAMP WHERE gigId = :id";
            $sql = "UPDATE gig SET title = :title, description = :description, category = :category, capital = :capital, profitMargin = :profitMargin, cropCycle = :cropCycle, city = :city, landArea = :landArea WHERE gigId = :id";

            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true, 'data' => true];
        } catch (PDOException $e) {
            echo $e->getMessage();die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function editGig($gigId){
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


    public function gigimg($gigId)
    {
        try {
            $sql = "SELECT * FROM gig_image WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $gig = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $gig];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getGigIdFarmerIdByIgIdAndInvestorId($igId, $investorId)
    {
        try {
            $sql = "SELECT gigId, farmerId FROM investor_gig WHERE igId = :igId AND investorId = :investorId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['igId' => $igId, 'investorId' => $investorId]);
            $gig = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $gig];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

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
            $sql = "SELECT COUNT(*) as count FROM gig WHERE investorId = :investorId AND status = 'RESERVED' OR status = 'UNDER_COMPLETION' OR status='UNDER_REVIEW'";
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
            $sql = "SELECT g.gigId, g.farmerId, g.title, g.city, g.cropCycle, g.thumbnail, u.firstName, u.lastName, u.image, u.city as FCity, DATE(g.reservedDate) as reservedDate, g.status FROM gig g INNER JOIN user u ON g.farmerId = u.uid WHERE g.investorId = :id AND g.status = 'RESERVED' OR g.status = 'UNDER_COMPLETION'  OR g.status = 'UNDER_REVIEW' ORDER BY g.reservedDate DESC";
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
            $sql = "SELECT g.gigId, g.title, g.city, g.thumbnail, g.farmerId, u.firstName, u.lastName, u.image FROM gig g INNER JOIN user u ON g.farmerId = u.uid WHERE g.investorId = :id AND g.status = 'UNDER_REVIEW' ORDER BY g.reservedDate DESC";
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
            $sql = "SELECT g.gigId, g.title, g.city, g.thumbnail, g.farmerId, u.firstName, u.lastName, u.image FROM gig g INNER JOIN user u ON g.farmerId = u.uid WHERE g.investorId = :id AND g.status = 'COMPLETED' ORDER BY g.reservedDate DESC";
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

    public function getStartedDate($gigId)
    {
        try {
            $sql = "SELECT DATE(reservedDate) as startDate FROM gig WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function markAsCompleted($gigId)
    {
        try {
            $sql = "UPDATE gig SET status = 'COMPLETED' WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function markAsUnderReview($gigId)
    {
        try {
            $sql = "UPDATE gig SET status = 'UNDER_REVIEW' WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            return ['success' => true, 'data' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function checkBeforeReview($gigId, $userId)
    {
        try {
            $sql = "SELECT farmerId FROM gig WHERE gigId = :gigId AND investorId = :userId AND status = 'UNDER_REVIEW'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId, 'userId' => $userId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function checkGigBelongToInvestor($gigId, $investorId)
    {
        try {
            $sql = "SELECT gigId, title, city, thumbnail FROM gig WHERE gigId = :gigId AND investorId = :investorId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId, 'investorId' => $investorId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => true, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getCompletedGigsByFarmer($id)
    {
        try {
            $sql = "SELECT ig.investorId, ig.gigId, ig.timestamp, gig.title, gig.category, gig.thumbnail as gimage, gig.city as gcity, user.firstName, user.lastName, user.city as ucity, user.image as uimage FROM investor_gig as ig INNER JOIN gig ON ig.gigId = gig.gigId INNER JOIN user ON ig.investorId = user.uid WHERE ig.farmerId = :id AND ig.status='COMPLETED' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getWorkedWith($uid)
    {
        try {
            $sql = "SELECT COUNt(investorId) as investorCount FROM gig WHERE farmerId = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $uid]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getInvestmentsSumByFarmer($uid)
    {
        try {
            $sql = "SELECT SUM(amount) as totalInvestment FROM investment WHERE farmerId = :uid";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['uid' => $uid]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getCategoryVsGigsByInvestor($id)
    {
        try {
            $sql = "SELECT count(roi.roiId) as count, g.category FROM return_of_investment roi INNER JOIN gig g ON roi.gigId = g.gigId WHERE roi.investorId = :investorId AND (roi.status = 'APPROVED' OR roi.status = 'CLEARING') GROUP BY g.category";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function fetchReservedGigsForDashboard($id)
    {
        try {
            $sql = "SELECT gig.gigId, gig.title, gig.city, gig.thumbnail, gig.status, user.firstName, user.lastName, user.city FROM gig INNER JOIN user ON gig.farmerId = user.uid WHERE gig.investorId = :id AND gig.status = 'RESERVED' OR gig.status = 'UNDER_COMPLETION' ORDER BY gig.createdAt DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
