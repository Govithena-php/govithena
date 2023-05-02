<?php

class bankAccount
{
    public function add($data)
    {
        try {
            $sql = "INSERT INTO bank_account (accountNumber, userId, bank, branch, branchCode) VALUES (:accountNumber, :userId, :bank, :branch, :branchCode)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'accountNumber' => $data['accountNumber'],
                'userId' => $data['userId'],
                'bank' => $data['bank'],
                'branch' => $data['branch'],
                'branchCode' => $data['branchCode']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getBankDetails($id)
    {
        try {
            $sql = "SELECT * FROM bank_account WHERE userId = :id AND status = 'ACTIVE' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function delete($accountNumber)
    {
        try {
            $sql = "DELETE FROM bank_account WHERE accountNumber = :accountNumber";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['accountNumber' => $accountNumber]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function update($data)
    {

        echo $data['oldAccountNumber'];
        echo $data['accountNumber'];
        echo $data['bank'];
        echo $data['branch'];
        echo $data['branchCode'];
        // die();

        try {
            $sql = "UPDATE bank_account SET accountNumber = :accountNumber, bank = :bank, branch = :branch, branchCode = :branchCode WHERE accountNumber = :oldAccountNumber";
            $stmt = Database::getBdd()->prepare($sql);
            $res = $stmt->execute([
                'oldAccountNumber' => $data['oldAccountNumber'],
                'accountNumber' => $data['accountNumber'],
                'bank' => $data['bank'],
                'branch' => $data['branch'],
                'branchCode' => $data['branchCode']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
