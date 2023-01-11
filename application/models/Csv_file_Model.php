<?php
class Csv_file_Model extends CI_Model
{
 public function get_data()
 {
      $this->db
      ->select("tracking_number,order_id");
      $this->db
       ->from('orders');
      return $this->db->get();
 }
}

?>
