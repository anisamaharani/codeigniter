<?php

class mMhs extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('t_mhs')->result_array();
	}

	public function addItem($data)
	{

		$query = $this->db->insert('t_mhs', $data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	function deleteItem()
	{
		$id = $this->input->get('id');
		$this->db->delete('t_mhs', ['id' => $id]);
	}

	function editItem()
	{
		return $this->db->get_wehere('id');
	}

	function updateItem()
	{
		$this->db->wehere('$where');
		$this->db->update('$table, $data');
	}
}
