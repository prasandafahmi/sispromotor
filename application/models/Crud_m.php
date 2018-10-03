<?php

    class Crud_m extends CI_model{

        public function selectSemua($tbl){
            return $this->db->get($tbl);//nama tabel
        }

        function input_data($tbl,$data){
    			$this->db->insert($tbl,$data);
    		}

        function selectX($tbl,$where){
            return $this->db->get_where($tbl,$where);
        }

        function update_data($tbl,$data,$where){
            $this->db->where($where);
            $this->db->update($tbl,$data);
        }
         function hapus($id){
            $sql="DELETE FROM `sispromotor`.`detail` WHERE `detail`.`id` = $id";
            return $this->db->query($sql);
        }

        function getall() {
        $ambildata = $this->db->get('user');
        //jika data ada (lebih dari 0)
        if ($ambildata->num_rows() > 0 ) {
            foreach ($ambildata->result() as $data) {
                $user[] = $data;
            }
            return $user;
             }
         }

        function join3_where($tbl,$tbl2, $tbl3, $w, $where, $where2, $where3)
        {
            $this->db->select('*');
            $this->db->from($tbl);
            $this->db->join($tbl2,$where);
            $this->db->join($tbl3,$where2);
            $this->db->where($w, $where3);
            return $this->db->get();
        }
       
        function join2_where2($id)
        {
           $sql="SELECT * FROM `order` join detail on `order`.`id_order`=detail.id_order WHERE `order`.`id`=$id and detail.status_pelaksana='sukses'";
           return $this->db->query($sql);
        } 
        function Kepuasan($id)
        {
           $sql="Select * from `order` join user on user.id=`order`.id join pembayaran on pembayaran.id_order=`order`.id_order join pengiriman on pengiriman.id_order=`order`.id_order join `detail` on `detail`.id_order=`order`.id_order where user.id=$id and status_all2='sudah' and pembayaran.status='Valid' GROUP BY user.id";
           return $this->db->query($sql);
        }
        
        function Riwayat($id)
        {
           $sql="Select *, detail.harga as h, pembayaran.status as sp from `order` join `user` on user.id=`order`.id join `pembayaran` on pembayaran.id_order=`order`.id_order join  `detail` on `detail`.id_order=`order`.id_order join `produk` on `produk`.id=detail.id where user.id=$id and jumlah='1' order by `order`.kode_order desc";
           return $this->db->query($sql);
        }
        

        
         function joindetail($id)
        {
           $sql="SELECT *, pembayaran.status as sp FROM `order` join detail on `order`.`id_order`=detail.id_order join produk on `produk`.id=`detail`.id join `pembayaran` on `pembayaran`.id_order=`order`.id_order where detail.id_order=$id and jumlah='1'";
           return $this->db->query($sql);
        }
        
        
           function joinhasil($id)
        {
           $sql="SELECT * FROM `order` join detail on `order`.`id_order`=detail.id_order where detail.id_order=$id and detail.status_pelaksana='sukses'";
           return $this->db->query($sql);
        }
        function stats_setuju($id)
        {
            $sql="SELECT *, user.id as u FROM `user` join `order` on `order`.id=`user`.id join `detail` on `detail`.id_order=`order`.id_order join `produk` on `produk`.id=`detail`.id where where `order`.id=$id and `order`.status_all='sudah' and `detail`.status_persetujuan='setuju' ";

             return $this->db->query($sql);
        }
          function pelaksanaan($id)
        {
            $sql="select * from `order` join user on user.id=`order`.id join pembayaran on pembayaran.id_order=`order`.id_order join pengiriman on pengiriman.id_order=`order`.id_order join detail on detail.id_order=`order`.`id_order` join produk on produk.id=detail.id where user.id=$id and status_all2='' and pembayaran.status='Valid' group by `order`.kode_order order by `order`.`id_order` desc";
             return $this->db->query($sql);
        }
        
         function selectbayar($id)
        {
           $sql="SELECT *, user.status as u1 FROM `user` join `order` on `user`.id=`order`.id join `pembayaran` on pembayaran.id_order=`order`.`id_order` WHERE user.id=$id and `order`.status_pemesanan='sukses' order by date desc";
           return $this->db->query($sql);
        }
        function statusvalid($id)
        {
           $sql=" SELECT * FROM `order` join pembayaran on pembayaran.id_order=`order`.`id_order` join user on user.id=`order`.`id` WHERE user.id=$id and `order`.status_all='sudah' and `pembayaran`.status=''";
           return $this->db->query($sql);
        }

        function selectmetode($id)
        {
           $sql=" SELECT * FROM `order` join pembayaran on pembayaran.id_order=`order`.`id_order` join user on user.id=`order`.`id`  WHERE user.id=$id and `pembayaran`.status='proses'";
           return $this->db->query($sql);
        }
        function selectpelaksana($id)
        {
           $sql=" SELECT * , user.id as u FROM `user` join `order` on `order`.id=`user`.id join `detail` on `detail`.id_order=`order`.id_order join pembayaran on pembayaran.id_order=`order`.`id_order` join pengiriman on pengiriman.id_order=`order`.`id_order`  WHERE user.id=$id and `pembayaran`.status='Valid'";
           return $this->db->query($sql);
        }
         function selecttrack($id)
        {
           $sql=" SELECT * FROM `order` join pembayaran on pembayaran.id_order=`order`.`id_order`  join user on user.id=`order`.`id`  WHERE order.id_order=$id and `pembayaran`.status='Valid'";
           return $this->db->query($sql);
        }
        function isitrack($id)
        {
           $sql=" SELECT * FROM `order` join pembayaran on pembayaran.id_order=`order`.`id_order` join pengiriman on pengiriman.id_order=`order`.`id_order` join user on user.id=`order`.`id`  WHERE order.id=$id ";
           return $this->db->query($sql);
        }
           function joinselesai($id)
        {
           $sql="SELECT * FROM `order` join detail on `order`.`id_order`=detail.id_order WHERE  `detail`.status_akhir='sudah'" ;
           return $this->db->query($sql);
        }
            function selesai($id)
        {
           $sql="select * from `order` join user on user.id=`order`.id join pembayaran on pembayaran.id_order=`order`.id_order join pengiriman on pengiriman.id_order=`order`.id_order join `detail` on `detail`.id_order=`order`.id_order where user.id=$id and status_all2='sudah' and pembayaran.status='Valid' and order.survei='1' and detail.status_persetujuan='Setuju'" ;
           return $this->db->query($sql);
        }
        
  function join4_where($tbl,$tbl2, $tbl3, $tbl4, $w, $where, $where2, $where3, $where4)
        {
            $this->db->select('*');
            $this->db->from($tbl);
            $this->db->join($tbl2,$where);
            $this->db->join($tbl3,$where2);
            $this->db->join($tbl4,$where3);
            $this->db->where($w, $where4);
            return $this->db->get();
        } 
function join5_where($tbl,$tbl2, $tbl3, $tbl4, $tbl5, $w, $where, $where2, $where3, $where4, $where5)
        {
        	$this->db->select('*');
			$this->db->from($tbl);
			$this->db->join($tbl2,$where);
			$this->db->join($tbl3,$where2);
			$this->db->join($tbl4,$where3);
			$this->db->join($tbl5,$where4);
            $this->db->where($w, $where5);
			return $this->db->get();
        } 
        function joinn_where($id){
            $sql="SELECT *, user.id as u FROM `user` join `order` on `order`.id=`user`.id join `detail` on `detail`.id_order=`order`.id_order join `produk` on `produk`.id=`detail`.id where order.id_order=$id and status_persetujuan='setuju'";
             return $this->db->query($sql);
        }
         
          
          
        function updateAkun($id) { //coba update

        $nama       = $this->input->post('nama');
        $username   = $this->input->post('username');
        $email      = $this->input->post('email');
        $telepon    = $this->input->post('telepon');
        $status     = $this->input->post('status');
        $instansi   = $this->input->post('instansi');
        $alamat     = $this->input->post('alamat');

        $data = array (
         'nama'     => $nama,
         'username' => $username,
         'telepon'  => $telepon,
         'status'   => $status,
         'instansi' => $instansi,
         'alamat'   => $alamat
        );
        $this->db->where('id', $id);
        $this->db->update('user', $u);
    }


 
    function getById($id) {
        return $this->db->get_where('user', array('id' => $id))->row();
    }
        
        public function insert_order($data)
	{
		$this->db->insert('order', $data);	
		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;
	}

    function update_cart($rowid, $qty, $price, $amount) {
 		$data = array(
			'rowid'   => $rowid,
			'qty'     => $qty,
			'price'   => $price,
			'amount'   => $amount
		);

		$this->cart->update($data);
	}

        function stat_belum($id){
            $sql="SELECT * FROM `detail` join `order` on `order`.id_order=detail.id_order join user on user.id=`order`.id join produk on produk.id=`detail`.id  where `order` .id='$id' and status_persetujuan ='' and jumlah='1' order by `order`.id_order desc";
             return $this->db->query($sql);
        }
   function get_slider(){
        return $this->db->get('beranda');
 }

    function join_where($id){
            $sql="SELECT * FROM `order` join detail on detail.id_order=`order`.id_order join produk on produk.id=detail.id where order.id='$id'";
             return $this->db->query($sql);
        }
    function join_pesan($id){
            $sql="SELECT * FROM `order` join detail on detail.id_order=`order`.id_order where `order`.id_order='$id'";
            return $this->db->query($sql);
        }
    function delete_data($tbl,$where){
            $this->db->delete($tbl,$where);
        }
    function join($tbl,$tbl2,$where)
        {
            $this->db->select('*');
            $this->db->from($tbl);
            $this->db->join($tbl2,$where);
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

    function pilih_order($tgl, $nama){
            $sql = "SELECT `order`.spesifikasi, `order`.request, `order`.status FROM `order` join user on `order`.id = user.id where nama='$nama' and date='$tgl' ";
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
    public function selectTanya($tbl){
            return $this->db->get($tbl);//nama tabel
        }
    }

?>
