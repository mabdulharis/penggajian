<?php

class Laporan_Absensi extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('login');
		}
	}

	public function index() {	
		$data['title'] = "Laporan Absensi Pegawai";

		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/absensi/laporan_absensi');
		$this->load->view('template_admin/footer');
	}

	public function cetak_laporan_absensi(){

	$data['title'] = "Cetak Laporan Absensi Pegawai";
	if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	$data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' ORDER BY nama_pegawai ASC")->result();
	$this->load->view('template_admin/header',$data);
	$this->load->view('admin/absensi/cetak_absensi', $data);
	}

	public function laporan_absensi_pdf()
	{
		$data['title'] = "Cetak Laporan Absensi Pegawai";
	if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	$data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' ORDER BY nama_pegawai ASC")->result();
	$this->load->view('template_admin/header',$data);
	$this->load->view('admin/absensi/cetak_absensi', $data);
		// $this->load->library('dompdf_gen');
		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/penggajian/application/third_party/dompdf/autoload.inc.php";
			
		$dompdf = new Dompdf\Dompdf();
		$this->load->view('admin/absensi/laporan_pdf_absen', $data);
		$paper_size = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();
		$dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("laporan_data_absensi.pdf", array('Attachment' => 
		0));
		// nama file pdf yang di hasilkan
	 }
	 public function export_excel()
	 {
			$data['title'] = "Cetak Laporan Absensi Pegawai";
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$bulantahun = $bulan.$tahun;
			}else{
				$bulan = date('m');
				$tahun = date('Y');
				$bulantahun = $bulan.$tahun;
			}
		 $data = array(
			 'title'=>'Laporan absensi',
			 'lap_kehadiran'=> $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' ORDER BY nama_pegawai ASC")->result_array());
		 $this->load->view('admin/absensi/export_excel_absensi', $data);
		 $this->load->view('template_admin/header',$data);
		
	 }

	}
?>