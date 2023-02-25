<?php

class FieldVisit extends Model
{

    public function fetchAllByGig($gigId)
    {
        try {
            $sql = "SELECT field_visit.visitId, field_visit.agrologistId, field_visit.week, field_visit.fieldVisitDetails, field_visit.image as fimage, field_visit.visitDate, DATE(field_visit.entryTime) as entryDate, TIME(field_visit.entryTime) as entryTime, user.firstName, user.image as uimage, user.lastName  FROM field_visit INNER JOIN user ON field_visit.agrologistId = user.uid WHERE field_visit.gigId = :gigId";
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
}
