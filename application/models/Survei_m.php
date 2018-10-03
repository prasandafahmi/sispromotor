<?php
	
	class Survei_m extends CI_model{
        
        public function survei($kode, $value){
            $sql="SELECT COUNT('".$kode."') as jumlah FROM `survei` WHERE ".$kode."='".$value."'";
            $query= $this->db->query($sql);
            return $query->result();
        }
    }
        
?>