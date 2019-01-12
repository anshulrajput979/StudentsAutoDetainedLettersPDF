<?php  
include('fpdf/fpdf.php');
include("documents/conn.php");

class PDF extends FPDF
{
function WordWrap(&$text, $maxwidth)
{
    $text = trim($text);
    if ($text==='')
        return 0;
    $space = $this->GetStringWidth(' ');
    $lines = explode("\n", $text);
    $text = '';
    $count = 0;

    foreach ($lines as $line)
    {
        $words = preg_split('/ +/', $line);
        $width = 0;

        foreach ($words as $word)
        {
            $wordwidth = $this->GetStringWidth($word);
            if ($wordwidth > $maxwidth)
            {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                    if($width + $wordwidth <= $maxwidth)
                    {
                        $width += $wordwidth;
                        $text .= substr($word, $i, 1);
                    }
                    else
                    {
                        $width = $wordwidth;
                        $text = rtrim($text)."\n".substr($word, $i, 1);
                        $count++;
                    }
                }
            }
            elseif($width + $wordwidth <= $maxwidth)
            {
                $width += $wordwidth + $space;
                $text .= $word.' ';
            }
            else
            {
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n".$word.' ';
                $count++;
            }
        }
        $text = rtrim($text)."\n";
        $count++;
    }
    $text = rtrim($text);
    return $count;
}
}
$sessionals=$_GET["sessionals"];
$requestid=json_decode($_GET["roll_id"],true);
$pdf = new PDF();
$pdf->SetTitle("Detained Letters");
    foreach ($requestid as $key => $value){
// Instanciation of inherited class
  $sql="select * from student_data where rollno=$value";
        $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    $SEMESTER=$row["Semester"];
    $BRANCH=$row["Branch"];
    $SNAME=$row["Sname"];
    $SFNAME=$row["Sfather"];
    $SPHN=$row["Sphn"];
    $ADDRESS=$row["address"];
if($SEMESTER%2==0){
    $SEMESTER="ODD";
}
else{
    $SEMESTER="EVEN";
}

$text="As you are aware that the classes for the ".$SEMESTER." semester(2018-19) have commenced from 30th July 2018 And your ward, ".$SNAME." College Roll No.DGIGN-14-".$BRANCH."-".$value." student of B.tech Semester ".$SEMESTER." of ".$BRANCH." has fallen short of attendance as per the university norms.";

$text1="We regret to inform you that he is being detained from appearing in the ".$sessionals." Sessional Examination scheduled from ".date("Y/m/d").".";
$text3="However he/she is supposed to come prepared and appears in practice test.";
$text4="You are advised to motivate him for improvement.";
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->SetFont("","U");
$pdf->Image('logo.jpg',110,0,100);
$pdf->Ln(25);
$pdf->Cell(20);
$pdf->Cell(150,10,'DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING');
$pdf->Ln(15);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->SetFont("","");
$pdf->Cell(24,8,"Ref:DGIGN/");
$pdf->Cell(60,8,date("Y")."/".$BRANCH."/4172");
$pdf->Cell(40);
$pdf->Cell(16,8,"Date:");
$pdf->Cell(30,8,date("Y/m/d"));
$pdf->Ln(15);
$pdf->Cell(10);
$pdf->Cell(10,8,"To,");
$pdf->Ln(10);
$pdf->Cell(10);
$pdf->SetFont("","U",14);
$pdf->Cell(100,8,"Mr.".$SFNAME);
$pdf->Ln(10);
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);
$nb=$pdf->WordWrap($ADDRESS,80);
$pdf->Write(5,$ADDRESS);
$pdf->Ln(20);
$pdf->Cell(25);
$pdf->Cell(120,9,"Subject:Detained from First Sessional Examination");
$pdf->SetFont("Courier","",12);
$pdf->Ln(10);
$pdf->Cell(30,9,"Dear Parents,");
$pdf->Ln(8);
$pdf->WordWrap($text,170);
$pdf->Write(10,$text);
$pdf->Ln(8);
$pdf->WordWrap($text1,250);
$pdf->Write(10,$text1);
$pdf->Ln(8);
$pdf->WordWrap($text3,400);
$pdf->Write(10,$text3);
$pdf->Ln(8);
$pdf->WordWrap($text4,250);
$pdf->Write(10,$text4);
$pdf->Ln(10);
$pdf->Cell(40,9,"With Regards.");
$pdf->Ln(30);
$pdf->SetFont("Arial","B",16);
$pdf->Cell(30,9,"HOD");
$pdf->SetFont("","",9);
$pdf->SetMargins(10,0,0);
$pdf->Ln(15);
$pdf->Cell(50,5,"www.dronacharya.info");
$pdf->Cell(80);
$pdf->Cell(90,5,"#27 Knowledge Park-III,Greater Noida(U.P)");

    };
       $pdf->Output();

?>