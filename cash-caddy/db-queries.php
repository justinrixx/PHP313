<?php

require "load-db.php";
$db = loadDatabase();

function get_category_by_id($id, $column_string) {
  $stmt = $db->prepare('SELECT ' . $column_string . ' FROM category WHERE id=:id');
  $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();
  $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $categories[0];
}

?>