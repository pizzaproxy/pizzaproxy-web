<?php
class OrderProxy {
  
  CONST TABLE_NAME = "orderproxy";
  
  public static function delete($id) {
    
    $stmt = Database::pdo()->exec("delete from " . self::TABLE_NAME ." where id = $id");
    
  }
  
  public static function getOrderAmount($orderid) {
    $query = "select sum(". OrderProxy::TABLE_NAME . ".amount) as amount
    	from ". OrderProxy::TABLE_NAME ."
    	where  ". OrderProxy::TABLE_NAME .".orderid = $orderid
    	group by ". OrderProxy::TABLE_NAME .".orderid";
        
    $stmt = Database::pdo()->query($query);
    
    $result = $stmt->fetchAll();
    
    return $result[0]["amount"];
    
  }
  
  public static function getOrderID($id) {
  	$query = "select ". OrderProxy::TABLE_NAME .".orderid
  	from ". OrderProxy::TABLE_NAME ."
  	where  ". OrderProxy::TABLE_NAME .".id = $id";
  
  	$stmt = Database::pdo()->query($query);
  
  	$result = $stmt->fetchAll();
  
  	return $result[0]["orderid"];
  }
  
  public static function updateOrders(array $orders) {
    foreach ($orders as $id => $amount) {
      if (is_numeric($amount)) {
        if ($amount == 0) {
          self::delete($id);
        }
        else if ($amount > 0) {
          $stmt = Database::pdo()->exec("update " . self::TABLE_NAME ." set amount = $amount where id = $id");
        }
        Bon::doBon(OrderProxy::getOrderID($id), Order::getOrder(OrderProxy::getOrderID($id)));
      }
    }
  }
  
}