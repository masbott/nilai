<?php
class PDF extends FPDF
{
	//Page header
    private $hae_semester;
    function jajal( $hae_semester ) {
        $this->hae_semester  = $hae_semester;
    }

	function Header()
	{
        global $hae_semester;
                // print_r( $hasil_semester );
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                $this->cell(100,6,"CETAK HASIL BELAJAR ". date('d/m/Y H:i') ,0,0,'L',1); 
                $this->cell(100,6,"TANGGAL CETAK : " . date('d/m/Y'),0,1,'R',1); 
                // $this->Image(base_url().'assets/dist/img/user7-128x128.jpg', 10, 25,'20','20','jpeg');
                
                $this->Ln(12);
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                // $this->cell(25,6,'',0,0,'L',0); 
                $this->cell(100,6,'CETAK HASIL BERLAJAR',0,1,'L',1); 
                // $this->cell(25,6,'',0,0,'L',0); 
                $this->cell(100,6,"SEMESTER : ".$this->hae_semester , 0,1,'L',1); 
                // $this->cell(25,6,'',0,0,'L',0); 
                // $this->cell(100,6,'Lokasi : Semarang, Jawa Tengah',0,1,'L',1); 
                
                
                $this->Ln(5);
                $this->setFont('Arial','',10);
                $this->setFillColor(230,230,200);
                $this->cell(10,6,'No.',1,0,'C',1);
                $this->cell(100,6,'Matapelajaran',1,0,'C',1);
                $this->cell(40,6,'Nilai',1,0,'C',1);
                
	}
 
	function Content($get_data_cetak) {
	           // $this->hae_semester = $hae_semester;
            $ya = 46;
            $rw = 3;
            $no = 1;
                foreach ($get_data_cetak->result() as $key) {
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);	
                        $this->cell(10,6,$no,1,0,'L',1);
                        $this->cell(100,6,$key->nama_mapel,1,0,'L',1);
                        // $this->cell(30,10,$key->nohp,1,0,'L',1);
                        // $this->cell(50,10,$key->kelamin,1,1,'L',1);
                        $ya = $ya + $rw;
                        $no++;  
                }            
                
	}
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
                $this->Cell(0,10,'CETAK HASIL BELAJAR ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new PDF();
$pdf->jajal($hae_semester);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($get_data_cetak);
$pdf->Output();