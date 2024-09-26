<?php
class CartModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Assuming you have a Database class for DB operations
    }

    public function addProduct($userId, $productId, $quantity) {
        // Check if the product already exists in the cart for the user
        $query = "SELECT * FROM cart WHERE id = ? AND id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId, $productId]);
        $existingItem = $stmt->fetch();

        if ($existingItem) {
            // Update the quantity if the product is already in the cart
            $newQuantity = $existingItem['quantity'] + $quantity;
            $updateQuery = "UPDATE cart SET quantity = ? WHERE id = ? AND id = ?";
            $updateStmt = $this->db->prepare($updateQuery);
            $updateStmt->execute([$newQuantity, $userId, $productId]);
        } else {
            // Insert a new cart item
            $insertQuery = "INSERT INTO cart (id, id, quantity) VALUES (?, ?, ?)";
            $insertStmt = $this->db->prepare($insertQuery);
            $insertStmt->execute([$userId, $productId, $quantity]);
        }
    }

    public function getCartItems($userId) {
        $query = "SELECT c.quantity, p.name, p.price
                  FROM cart c
                  JOIN products p ON c.id = p.id
                  WHERE c.uid = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeProduct($userId, $productId) {
        $query = "DELETE FROM cart WHERE id = ? AND id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId, $productId]);
    }
}

?>