<?php
session_start();
include 'database/config.php';
include 'fpdf/fpdf.php';
$sr_no = $_GET['sr_no'];
$query = "SELECT * FROM `commitments` LEFT JOIN `records` ON `commitments`.`sr_no` = `records`.`sr_no` WHERE `commitments`.`sr_no` = '$sr_no'";
                    $fetch = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    $row = mysqli_fetch_assoc($fetch);
                    $date = date_create($row['date']);
                    $birth_date = date_create($row['dob']);
                    
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('assets/images/Coat_of_arms_of_Zambia.png',82,16,30);
$pdf->Ln(15);
$pdf->SetFont('Times','B',12);
$pdf->Cell(176,55,'Republic of Zambia', 0, 0, 'C');
$pdf->Ln(5);
$pdf->Cell(176,60,'Ministry of Education', 0, 0, 'C');
$pdf->Ln(15);
$pdf->Cell(176,60,'Commitment by Male Involved in Pregnancy', 0, 0, 'C');
$pdf->Ln(40);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'I/We ("we" in the case of school boy and parents/guardians) '.$row['m_name'].' do hereby promise to support the baby and '.$row['g_name'].' both financially and materially until the child is 21 years of age. I/We also promise to assist the parents of the girl  in ensuring that she returns to school after delivery and by the date stated in the letter of re-admission.');
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->Cell(92,5,'Name of school boy/male responsible for pregnancy: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['sch_name']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(16,5,'Address: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['address']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(24,5,'Date of birth: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,date_format($birth_date, "F j, Y"));
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(35,5,'Grade (if in school): ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['grade']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(23,5,'Occupation: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['occupation']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(10,5,'Date: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,date_format($date, "F j, Y"));
$pdf->SetFont('','');
$pdf->Ln(15);

$pdf->MultiCell(0,5,'Name of Parents/Guardians (where applicable in case of school boys/minors)');
$pdf->Ln(10);
$pdf->Cell(30,5,'Father/Guardian: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['m_father']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(32,5,'Mother/Guardian: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['m_mother']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(10,5,'Date: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,date_format($date, "F j, Y"));
$pdf->SetFont('','');
$pdf->Ln(15);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,'Four copies:');
$pdf->Ln(10);

$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,"1 copy to pupil's parents/guardians");
$pdf->Ln(5);
$pdf->Cell(0,5,"1 copy to pupil");
$pdf->Ln(5);
$pdf->Cell(0,5,"1 copy to school file");
$pdf->Ln(5);
$pdf->Cell(0,5,"1 copy to school Guidance and Counselling file");
$pdf->Ln(5);

/* Page 2 */
$pdf->AddPage();
$pdf->Image('assets/images/Coat_of_arms_of_Zambia.png',82,16,30);
$pdf->Ln(15);
$pdf->SetFont('Times','B',12);
$pdf->Cell(176,55,'Commitment by Parents/Guardians of the Pregnant Girl', 0, 0, 'C');
$pdf->Ln(40);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,5,'I/We, the parents/guardians of '.$row['g_name'].' do hereby promise to ensure that she returns to school after delivery and by the date stated in the letter of re-admission');
$pdf->Ln(10);
$pdf->Cell(0,5,'Name of Parents/Guardians:');
$pdf->Ln(10);

$pdf->Cell(32,5,'Mother/Guardian: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['g_mother']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(17,5,'Address: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['g_mother_address']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(22,5,'Occupation: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['g_mother_occupation']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(10,5,'Date: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,date_format($date, "F j, Y"));
$pdf->SetFont('','');
$pdf->Ln(15);

$pdf->Cell(32,5,'Father/Guardian: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['g_father']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(17,5,'Address: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['g_father_address']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(22,5,'Occupation: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,$row['g_father_occupation']);
$pdf->SetFont('','');
$pdf->Ln(10);

$pdf->Cell(10,5,'Date: ');
$pdf->SetFont('','I');
$pdf->Cell(20,5,date_format($date, "F j, Y"));
$pdf->SetFont('','');
$pdf->Ln(15);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,5,'Four copies:');
$pdf->Ln(10);

$pdf->SetFont('Times','',12);
$pdf->Cell(0,5,"1 copy to pupil's parents/guardians");
$pdf->Ln(5);
$pdf->Cell(0,5,"1 copy to pupil");
$pdf->Ln(5);
$pdf->Cell(0,5,"1 copy to school file");
$pdf->Ln(5);
$pdf->Cell(0,5,"1 copy to school Guidance and Counselling file");
$pdf->Ln(5);

/* Print */
$pdf->Output();
?>