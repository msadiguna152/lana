<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mlaporan');
		
	}
	public function DINAMIKA(){
		if (!empty($this->input->get('bulan_tahun'))) {
			$bulan_tahun = $this->input->get('bulan_tahun');
		} else {
			$bulan_tahun = date("Y-m");
		};

		$data = array(
			"menu" => "Laporan",
			"laporan" => $this->Mlaporan->get(),
			"bulan_tahun" => $bulan_tahun
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('laporan/dinamika');
		$this->load->view('tema/footer');
	}

	public function cetak_dinamika(){
		if (!empty($this->input->get('bulan_tahun'))) {
			$bulan_tahun = $this->input->get('bulan_tahun');
		} else {
			$bulan_tahun = date("Y-m");
		};

		$data = array(
			"menu" => "Laporan",
			"laporan" => $this->Mlaporan->get(),
			"bulan_tahun" => $bulan_tahun
		);
		$this->load->view('laporan/cetak_dinamika',$data);
	}

	public function LPLPO(){
		if (!empty($this->input->get('bulan_tahun'))) {
			$bulan_tahun = $this->input->get('bulan_tahun');
		} else {
			$bulan_tahun = date("Y-m");
		};

		$data = array(
			"menu" => "Laporan2",
			"laporan" => $this->Mlaporan->get_puskesmas(),
			"bulan_tahun" => $bulan_tahun
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('laporan/lplpo');
		$this->load->view('tema/footer');
	}

	public function test_excel_(){
		// error_reporting(0);

		if (!empty($this->input->get('bulan_tahun'))) {
			$bulan_tahun = $this->input->get('bulan_tahun');
		} else {
			$bulan_tahun = date("Y-m");
		};

		$data = array(
			"menu" => "Laporan",
			"laporan" => $this->Mlaporan->get(),
			"bulan_tahun" => $bulan_tahun
		);

		$this->load->library('excel');
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1','No.');
		$object->getActiveSheet()->setCellValue('B1','Sumber Barang');
		$object->getActiveSheet()->setCellValue('C1','Nama Obat');
		$object->getActiveSheet()->setCellValue('D1','Sediaan/Satuan');
		$object->getActiveSheet()->setCellValue('E1','Stok Awal');

		$row = 2;
		$no = 1;

		foreach ($data['laporan']->result() as $lap){
			$object->getActiveSheet()->setCellValue('A'.$row, $no++);
			$object->getActiveSheet()->setCellValue('A'.$row, $lap->nama_sumber);
			$object->getActiveSheet()->setCellValue('A'.$row, $lap->nama_barang);
			$object->getActiveSheet()->setCellValue('A'.$row, $lap->nama_satuan);
			$object->getActiveSheet()->setCellValue('A'.$row, 0);

			$no++;
		}
		$filename = 'Laporan Dinamika IFK Kab. Tanah Laut'.time().'.xlsx';

		$object->getActiveSheet()->setTitle("Laporan Dinamika IFK");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename. '"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');
		exit;
	}

	public function test_excel()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();


		if (!empty($this->input->get('bulan_tahun'))) {
			$bulan_tahun = $this->input->get('bulan_tahun');
		} else {
			$bulan_tahun = date("Y-m");
		};

		$data = array(
			"menu" => "Laporan",
			"laporan" => $this->Mlaporan->get(),
			"bulan_tahun" => $bulan_tahun
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
			'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];

		$header_style =[
			'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			]
			];

		$sheet->setCellValue('A1', "DINAMIKA LOGISTIK OBAT DAN ALAT KESEHATAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->applyFromArray($header_style); // Set bold kolom A1

		$sheet->setCellValue('A2', "INSTALASI FARMASI KABUPATEN / KOTA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A2:K2'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A2')->applyFromArray($header_style); // Set bold kolom A1


		$sheet->setCellValue('A4', "Provinsi : Kalimantan Selatan");
		$sheet->mergeCells('A4:K4');
		$sheet->getStyle('A4')->getFont()->setBold(false); 

		$sheet->setCellValue('A5', "Kab/Kota : Tanah Laut");
		$sheet->mergeCells('A5:K5');
		$sheet->getStyle('A5')->getFont()->setBold(false); 

		$sheet->setCellValue('A6', "Alamat : Jl. H. Boejasin No. 9 Pelaihari");
		$sheet->mergeCells('A6:K6');
		$sheet->getStyle('A6')->getFont()->setBold(false); 

		$sheet->setCellValue('A7', "Jumlah PKM : 22 (Dua Puluh Dua)");
		$sheet->mergeCells('A7:K7');
		$sheet->getStyle('A7')->getFont()->setBold(false); 

		$sheet->setCellValue('A8', "Bulan / Tahun :");
		$sheet->mergeCells('A8:K8');
		$sheet->getStyle('A8')->getFont()->setBold(false); 

		$sheet->setCellValue('A9', "Tanggal : ");
		$sheet->mergeCells('A9:K9');
		$sheet->getStyle('A9')->getFont()->setBold(false); 

		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A11', "NO."); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('B11', "Sumber Barang"); // Set kolom B3 dengan tulisan "NIS"
		$sheet->setCellValue('C11', "Nama Obat"); // Set kolom C3 dengan tulisan "NAMA"
		$sheet->setCellValue('D11', "Sediaan / Satuan"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$sheet->setCellValue('E11', "Stok Awal"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('F11', "Penerimaan"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('G11', "Pemakaian Rata-rata/Bulan"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('H11', "Pengeluaran"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('I11', "Sisa Stok"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('J11', "Tingkat Kecukupan"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('K11', "Keterangan (ED)"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A12', "1"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('B12', "2"); // Set kolom B3 dengan tulisan "NIS"
		$sheet->setCellValue('C12', "3"); // Set kolom C3 dengan tulisan "NAMA"
		$sheet->setCellValue('D12', "4"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$sheet->setCellValue('E12', "5"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('F12', "6"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('G12', "7=(4+5)-8"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('H12', "8=(4+5)-7"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('I12', "9=8/6"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('J12', "10"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('K12', "11");
		$sheet->getStyle('A12')->applyFromArray($style_col); 
		$sheet->getStyle('B12')->applyFromArray($style_col); 
		$sheet->getStyle('C12')->applyFromArray($style_col); 
		$sheet->getStyle('D12')->applyFromArray($style_col); 
		$sheet->getStyle('E12')->applyFromArray($style_col); 
		$sheet->getStyle('F12')->applyFromArray($style_col); 
		$sheet->getStyle('G12')->applyFromArray($style_col); 
		$sheet->getStyle('H12')->applyFromArray($style_col); 
		$sheet->getStyle('I12')->applyFromArray($style_col); 
		$sheet->getStyle('J12')->applyFromArray($style_col); 
		$sheet->getStyle('K12')->applyFromArray($style_col); 


		

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A11')->applyFromArray($style_col);
		$sheet->getStyle('B11')->applyFromArray($style_col);
		$sheet->getStyle('C11')->applyFromArray($style_col);
		$sheet->getStyle('D11')->applyFromArray($style_col);
		$sheet->getStyle('E11')->applyFromArray($style_col);
		$sheet->getStyle('F11')->applyFromArray($style_col);
		$sheet->getStyle('G11')->applyFromArray($style_col);
		$sheet->getStyle('H11')->applyFromArray($style_col);
		$sheet->getStyle('I11')->applyFromArray($style_col);
		$sheet->getStyle('J11')->applyFromArray($style_col);
		$sheet->getStyle('K11')->applyFromArray($style_col);

		// Mengatur "wrap text" pada sel A1
		$sheet->getStyle('D11')->getAlignment()->setWrapText(true);
		$sheet->getStyle('E11')->getAlignment()->setWrapText(true);
		$sheet->getStyle('F11')->getAlignment()->setWrapText(true);
		$sheet->getStyle('G11')->getAlignment()->setWrapText(true);
		$sheet->getStyle('H11')->getAlignment()->setWrapText(true);
		$sheet->getStyle('I11')->getAlignment()->setWrapText(true);
		$sheet->getStyle('J11')->getAlignment()->setWrapText(true);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$lap = $this->Mlaporan->get();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 13; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($lap->result() as $data) { // Lakukan looping pada variabel siswa

			$sheet->setCellValue('A' . $numrow, $no);
			$sheet->setCellValue('B' . $numrow, $data->nama_sumber);
			$sheet->setCellValue('C' . $numrow, $data->nama_barang);
			$sheet->setCellValue('D' . $numrow, $data->nama_satuan);
			$sheet->setCellValue('E' . $numrow, $data->stok_barang);
			$sheet->setCellValue('F' . $numrow, $data->stok_barang);
			$sheet->setCellValue('G' . $numrow, 0);
			$sheet->setCellValue('H' . $numrow, 0);
			$sheet->setCellValue('I' . $numrow, $data->stok_barang); 
			$sheet->setCellValue('J' . $numrow, 0);
			$sheet->setCellValue('K' . $numrow, 0);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('K' . $numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom 
		$sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$sheet->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$sheet->getColumnDimension('D')->setWidth(10); // Set width kolom D
		$sheet->getColumnDimension('E')->setWidth(8); // Set width kolom E
		$sheet->getColumnDimension('F')->setWidth(12); // Set width kolom E
		$sheet->getColumnDimension('G')->setWidth(20); // Set width kolom E
		$sheet->getColumnDimension('H')->setWidth(12); // Set width kolom E
		$sheet->getColumnDimension('I')->setWidth(8); // Set width kolom E
		$sheet->getColumnDimension('J')->setWidth(12); // Set width kolom E
		$sheet->getColumnDimension('K')->setWidth(20); // Set width kolom E


		// hight row
		// $sheet->getRowDimension(2)->setRowHeight(40);

		$sheet->getRowDimension(11)->setRowHeight(40); // Set width kolom A
		

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		// $sheet->getRowDimension()->setRowHeight(-1);

		// $sheet->mergeCells('B13:B496'); 

		

		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$sheet->setTitle("Laporan Dinamika IFK");

		$filename = 'Laporan Dinamika IFK Kab. Tanah Laut_'.date('d-m-Y').'.xlsx';
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename. '"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */