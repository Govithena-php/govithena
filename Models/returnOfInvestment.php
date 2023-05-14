<?php

class returnOfInvestment
{
    public function deposit_gig($data)
    {
        try {
            $sql = "INSERT INTO return_of_investment(gigId, farmerId, investorId, amount, description) VALUES(:gigId, :farmerId, :investorId, :amount, :description)";
            $stmt = Database::getBdd()->prepare($sql);
            $res = $stmt->execute([
                'gigId' => $data['gigId'],
                'farmerId' => $data['farmerId'],
                'investorId' => $data['investorId'],
                'amount' => $data['amount'],
                'description' => $data['description']
            ]);

            if ($res) {
                return ['success' => true];
            } else {
                return ['success' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
