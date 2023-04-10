<?php

class Category
{
    public function getActiveCategoriesCount()
    {
        try {
            $sql = "SELECT COUNT(*) AS activeCategoriesCount FROM category WHERE status = 'ACTIVE'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllCategories()
    {
        try {
            $sql = "SELECT c.id, c.name, c.slug, c.type, c.createdBy, c.createdAt, c.thumbnail, u.firstName, u.lastName FROM category c INNER JOIN user u ON c.createdBy = u.uid ORDER BY (createdAt) DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $result];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function createCategory($data)
    {
        try {
            $sql = "INSERT INTO category (`id`,`name`, `slug`, `type`, `thumbnail`, `createdBy`) VALUES(:id, :name, :slug, :type, :thumbnail, :createdBy)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'id' => $data['id'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'type' => $data['type'],
                'thumbnail' => $data['thumbnail'],
                'createdBy' => $data['createdBy']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function deleteCategory($id)
    {
        try {
            $sql = "DELETE FROM category WHERE id = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function updateCategoryImage($id, $image)
    {
        try {
            $sql = "UPDATE category SET thumbnail = :thumbnail WHERE id = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['thumbnail' => $image, 'id' => $id]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function updateCategory($data)
    {
        try {
            $sql = "UPDATE category SET name = :name, slug = :slug, type = :type WHERE id = :id";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'type' => $data['type'],
                'id' => $data['cid']
            ]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
