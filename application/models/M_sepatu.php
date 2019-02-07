
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sepatu extends CI_Model {

	public function ambilsepatu(){
			$ambilsepatu = $this->db->join('kategori', 'kategori.kode_kategori = sepatu.kode_kategori')->get('sepatu')->result();
	
			return $ambilsepatu;
	}


	public function ambilkategori(){

			$ambilkategori = $this->db->get('kategori')->result();

			return $ambilkategori;
	}

	public function tambah($nama_file){

	if($nama_file == ""){

			$tambah = array(
				'nama_sepatu' => $this->input->post('nama_sepatu'),
				'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'merk' => $this->input->post('merk'),
				'stok' => $this->input->post('stok'), );

	}else{

		$tambah = array(
				'nama_sepatu' => $this->input->post('nama_sepatu'),
				'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'merk' => $nama_file,
				'stok' => $this->input->post('stok'), );

	}
	return $this->db->insert('sepatu', $tambah);
	}

public function tampil_ubah_sepatu($kode_sepatu){
		return $this->db->join('kategori', 'kategori.kode_kategori = sepatu.kode_kategori')->where('kode_sepatu',$kode_sepatu)->get('sepatu')->row();

	}



public function update(){
			$ubah = array(
				'nama_sepatu' => $this->input->post('nama_sepatu'),
				'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'merk' => $this->input->post('merk'),
				'stok' => $this->input->post('stok'), );

			return $this->db->where('kode_sepatu',$this->input->post('kode_sepatu'))->update('sepatu', $ubah);

}


public function update_ft($nama_file){
				$ubah = array(
				'nama_sepatu' => $this->input->post('nama_sepatu'),
				'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'merk' => $this->input->post('merk'),
				'stok' => $this->input->post('stok'), );

		return $this->db->where('kode_sepatu',$this->input->post('kode_sepatu'))->update('sepatu', $ubah);





}


public function hapus($kode_sepatu ){
	return $this->db->where('kode_sepatu',$kode_sepatu)->delete('sepatu');
}




public function ambilsepatucart($kode_sepatu){
	return $this->db->where('kode_sepatu',$kode_sepatu )->get('sepatu')->row();

}

}

/* End of file M_sepatu.php */
/* Location: ./application/models/M_sepatu.php */

?>