<?php
	
	class Crud_m extends CI_model{
	
        public function selectSemua($tbl){
			return $this->db->get($tbl);
		}	
		
		function input_data($data, $tbl){
			$this->db->insert($tbl,$data);
		}
        
        function selectX($tbl,$where){
			return $this->db->get_where($tbl,$where);
		}
		
        function update_data($tbl,$data,$where){
            $this->db->where($where);
			$this->db->update($tbl,$data);
		}
        
        function delete_data($tbl,$where){
            $this->db->delete($tbl,$where);
        }
      
         function selectProduk1($id){ //untuk administrasi jasa dan super admin
             $sql ="SELECT * FROM `detail` JOIN produk on produk.id=detail.id join `order` on `order`.`id_order`=detail.id_order where detail.id_order = $id and jumlah='1'";
             return $this->db->query($sql);
         }
         
        
        function selectProduk($id){
             $sql ="SELECT * FROM `detail` JOIN produk on produk.id=detail.id join `order` on `order`.`id_order`=detail.id_order where detail.id_order = $id and detail.status_persetujuan='Setuju' ";
             return $this->db->query($sql);
         }
        
        function detailbayar($id){
             $sql ="SELECT *, pembayaran.status as ps, detail.harga as hp FROM detail join `order` on `order`.`id_order`=detail.id_order join user on user.id=`order`.id join pembayaran on pembayaran.id_order=`order`.`id_order` join produk on produk.id=detail.id WHERE detail.id_order=$id and detail.status_persetujuan='Setuju'";
             return $this->db->query($sql);
         }
        
         function verifikasi(){
             $sql ="SELECT * FROM `pembayaran` join `order` on `order`.`id_order`=pembayaran.`id_order` join user on user.id=`order`.`id` WHERE `order`.status_all='sudah' and pembayaran.status='proses' and pembayaran.tanggal_berakhir!=0000-00-00 AND metode_pembayaran!='' order by pembayaran.id_bayar desc";
             return $this->db->query($sql);
         } 
        
        function verifikasi_where(){
             $sql ="SELECT * FROM `pembayaran` join `order` on `order`.`id_order`=pembayaran.id_order join user on user.id=`order`.`id` WHERE bukti_transfer!='' and (pembayaran.status='valid' or pembayaran.status='Tidak Valid') order by pembayaran.id_order desc";
             return $this->db->query($sql);
         }
        
        function hasil_where(){
             $sql ="SELECT * FROM `order` join `user` on `user`.`id`=`order`.`id` join detail on detail.id_order=`order`.`id_order` WHERE status_akhir='' and status_all2='sudah'";
             return $this->db->query($sql);
         } 
        
        function hasil_where2(){
             $sql ="SELECT * FROM `order` join `user` on `user`.id=`order`.`id` join detail on detail.id_order=`order`.`id_order` WHERE status_all2='sudah'and status_akhir='Selesai'";
             return $this->db->query($sql);
         } 
        
        function result_AdministrasiJ(){
             $sql ="SELECT * FROM `order` join user on `order`.id=user.id join detail on detail.id_order=`order`.`id_order` where `order`.`status_all2`='sudah' and detail.status_persetujuan='Setuju' and detail.status_pelaksana='sukses' and detail.status_akhir='' group by kode_order order by date desc  ";
             return $this->db->query($sql);
         }
        
        function result_AdministrasiJ_riwayat(){
             $sql ="SELECT * FROM `order` join user on `order`.id=user.id join detail on detail.id_order=`order`.`id_order` where `order`.`status_all2`='sudah' and detail.status_persetujuan='Setuju' and detail.status_pelaksana='sukses' and detail.status_akhir='Selesai' group by kode_order order by date desc  ";
             return $this->db->query($sql);
         }
        
      
        function selectmenu(){
             $sql ="SELECT * FROM `order` join `user` on `order`.id=`user`.id join `detail` on `detail`.id_order=`order`.id_order WHERE `detail`.status_persetujuan='' and `order`.status_pemesanan='' group by kode_order order by `order`.id_order desc";
             return $this->db->query($sql);
         }
        
         function join($tbl,$tbl2,$where){
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where);
			return $this->db->get();
        }
          function join_where($tbl,$tbl2,$w, $where, $where2)
        {
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where);
            $this->db->where($w, $where2);
			return $this->db->get();
        }
         function join_where1($tbl,$tbl2,$tbl3,$w, $where, $where2,$where3)
        {
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where);
             $this->db->join($tbl3,$where2);
            $this->db->where($w, $where2);
             $this->db->where($w, $where3);
			return $this->db->get();
        }
        
        function join_where_pesan($tbl,$tbl2,$w, $w2, $where, $where2, $where3)
        {
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where);
            $this->db->where($w, $where2);
            $this->db->where($w2, $where3);
            $this->db->order_by("order.id_order","desc");
			return $this->db->get();
        }
        
        function join3($tbl,$tbl2,$tbl3, $where1, $where2){
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where1);
            $this->db->join($tbl3,$where2);
			return $this->db->get();
        }
        function pembayaran(){
            $sql="SELECT * FROM `pembayaran` join `order` on `order`.`id_order`=pembayaran.id_order join user on user.id=`order`.`id` join `detail` on `detail`.id_order=`order`.id_order WHERE pembayaran.status='Valid' and detail.status_persetujuan='Setuju'";
            return $this->db->query($sql);
        }
        function join3_where($tbl,$tbl2,$tbl3, $w, $where1, $where2, $where3){
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where1);
            $this->db->join($tbl3,$where2);
             $this->db->where($w, $where3);
			return $this->db->get();
        }
        
        function join4_where($tbl,$tbl2,$tbl3, $tbl4, $w, $w1, $where1, $where2, $where3,$where4){
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where1);
            $this->db->join($tbl3,$where2);
            $this->db->join($tbl4,$where3);
             $this->db->where($w, $where3);
             $this->db->where($w1, $where4);
			return $this->db->get();
        }
        
        function join2_where($tbl,$tbl2, $w, $where1, $where2){
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where1);
             $this->db->where($w, $where2);
			return $this->db->get();
        }
        function join4($tbl,$tbl2,$tbl3, $tbl4, $where1, $where2, $where3)
        {
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where1);
            $this->db->join($tbl3,$where2);
            $this->db->join($tbl4,$where3);
			return $this->db->get();
        }
        function join5($tbl,$tbl2,$tbl3, $tbl4, $tbl5, $where1, $where2, $where3, $where4){
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where1);
            $this->db->join($tbl3,$where2);
            $this->db->join($tbl4,$where3);
            $this->db->join($tbl5,$where4);
			return $this->db->get();
        }
        function join6($tbl,$tbl2,$tbl3, $tbl4, $tbl5, $tbl6, $where1, $where2, $where3, $where4, $where5){
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where1);
            $this->db->join($tbl3,$where2);
            $this->db->join($tbl4,$where3);
            $this->db->join($tbl5,$where4);
			return $this->db->get();
        }
        public function order_by(){
            $this->db->from($tbl);
            $this->db->order_by($tbl, "asc");
            $query = $this->db->get(); 
            return $query->result();
        }
        function distinct(){
            $sql = "select DISTINCT user.nama, order.date as tgl from user join `order` on `user`.id = `order`.id ";
            return $this->db->query($sql);
        }
        function selectPustaka(){
            $sql = "SELECT * FROM `produk` WHERE kategori='Pustaka' ";
             return $this->db->query($sql);
        }
         function selectJasaAlat(){
            $sql = "SELECT * FROM `produk` WHERE kategori='Jasa Alat' ";
             return $this->db->query($sql);
        }
         function selectJasaLab(){
            $sql = "SELECT * FROM `produk` WHERE kategori='Jasa Lab' ";
             return $this->db->query($sql);
        }
	}
	
?>
