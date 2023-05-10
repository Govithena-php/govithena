<?php

class FieldVisit extends Model
{

    public function fetchAllByGigId($gigId)
    {
        try {
            $sql = "SELECT field_visit.visitId, field_visit.agrologistId, field_visit.week, field_visit.fieldVisitDetails, field_visit.thumbnail as fimage, DATE(field_visit.visitDate) as visitDate, TIME(field_visit.visitDate) as visitTime, user.firstName, user.image as uimage, user.lastName  FROM field_visit INNER JOIN user ON field_visit.agrologistId = user.uid WHERE field_visit.gigId = :gigId ORDER BY field_visit.visitDate DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $fieldVisits = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($fieldVisits) {
                return ['success' => true, 'data' => $fieldVisits];
            } else {
                return ['success' => false, 'data' => null];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function countByGigId($gigId)
    {
        try {
            $sql = "SELECT COUNT(visitId) as count FROM field_visit WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $count];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
