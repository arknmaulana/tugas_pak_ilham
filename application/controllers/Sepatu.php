<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sepatu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sepatu','mbk');
	}

	public function index()
	{
		if($this->session->userdata('level')){

			$data['kategori']=$this->mbk->ambilkategori();
			$data['sepatu']=$this->mbk->ambilsepatu();
			$data['konten']='v_sepatu';
			$this->load->view('template',$data);
		}else{
			redirect('Login','refresh');
		}
	}


	public function tambah(){
		$this->form_validation->set_rules('nama_sepatu', 'nama_sepatu', 'trim|required');
		$this->form_validation->set_rules('size', 'size', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('merk', 'merk', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'jpg|png';

			if($_FILES['cover']['name'] != ""){

				$this->load->library('upload', $config);


				if(!$this->upload->do_upload('merk')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('Sepatu','refresh');

				}else{

					if($this->mbk->tambah($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
					}else{
						$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
					}

					redirect('Sepatu','refresh');


				}

			}else{

				if($this->mbk->tambah('')){
					$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
				}else{
					$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
				}
				redirect('Sepatu','refresh');
			}

		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Sepatu','refresh');
		}

	}

	public function tampil_ubah_sepatu($kode_sepatu){
		$data =  $this->mbk->tampil_ubah_sepatu($kode_sepatu);
		echo json_encode($data);

	}

	public function update(){

		if($this->input->post('update')){

			if($_FILES['merk']['name']==""){

				if($this->mbk->update()){

					$this->session->set_flashdata('pesan', 'sukses ubah data ');
				}else{

					$this->session->set_flashdata('pesan', 'gagal ubah data ');
				}
				redirect('Sepatu','refresh');	


			}else{


				$config['upload_path'] = './assets/gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('cover')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('Sepatu','refresh');

				}else{


					if($this->mbk->update_ft($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'sukses ubah data ');

					}else{

						$this->session->set_flashdata('pesan', 'gagal ubah data ');

					}


					redirect('Sepatu','refresh');


				}
			}

		}

	}

	public function hapus($kode_sepatu){
		if($this->mbk->hapus($kode_sepatu)){

			$this->session->set_flashdata('pesan', 'anda berhasil menghapus data sepatu');
			redirect('Sepatu','refresh');

		}else{

			$this->session->set_flashdata('pesan', 'anda gagal menghapus data sepatu');
			redirect('Sepatu','refresh');
		}
	}
}

/* End of file Sepatu.php */
/* Location: ./application/controllers/Sepatu.php */


?>