<?php  

/**
* 
*/
class M_pembayaran_iklan extends CI_Model
{
	private $table_name="tb_pembayaran_iklan";
    public $id = 'id';
    public $order = 'desc';

	private $primary="id";


	function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table_name)->result();
    }

    function get_by_id($id) {
        $this->db->where($this->table_name.".".$this->id, $id);
        $this->db->select('*')->from($this->table_name);
        return $this->db->get()->row();
    }

	function insert($data) {
		$insert=$this->db->insert($this->table_name,$data['data']);
		$id=$this->db->insert_id();
	
		return $id;
	}
}

?>