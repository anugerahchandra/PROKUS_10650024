$this->load->library('pdf');
$this->pdf->SetCreator(PDF_CREATOR);
$this->pdf->SetAuthor('Nicola Asuni');
$this->pdf->SetTitle('TCPDF Example 002');
$this->pdf->SetSubject('TCPDF Tutorial');
$this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// remove default header/footer
$this->pdf->setPrintHeader(false);
$this->pdf->setPrintFooter(false);
 
// set default monospaced font
$this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
//set margins
$this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
 
//set auto page breaks
$this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//set image scale factor
$this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
//set some language-dependent strings
$this->pdf->setLanguageArray($l);
 
// ---------------------------------------------------------
 
// set font
$this->pdf->SetFont('times', 'BI', 20);
 
// add a page
$this->pdf->AddPage();
 
// set some text to print
$txt = <<<EOD
TCPDF Example 002
 
Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;
 
// print a block of text using Write()
$this->pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
 
// ---------------------------------------------------------
 
//Close and output PDF document
$this->pdf->Output('example_002.pdf', 'I');
 
//============================================================+
// END OF FILE
//============================================================+