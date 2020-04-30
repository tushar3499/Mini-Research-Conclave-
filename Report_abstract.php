<?php  include 'ReportType.php';
 include 'connection.php';
 function fetch_data()  
 {  
      $connect = OpenCon();
      $output = '';  
	  $pres= $_GET['value'];
      $sql = "SELECT Id, Title, Reviewer1, Reviewer2 FROM abstract Where PresType='$pres' AND IsApproved = '1'";  
      $result = mysqli_query($connect, $sql);  
	  $i = 0;
      while($row = mysqli_fetch_array($result))  
      {      
        $con1 = OpenCon();  
        $reviewFullname1 = '';
		$reviewFullname2 = '';
		$str=$row['Reviewer1'];
		$sql1 = "SELECT * FROM Users Where Username = '$str'";
		$result1 = $con1->query($sql1);
		while($res = $result1->fetch_assoc()){
			$reviewFullname1 = $res["Fullname"];
		}
		$str=$row['Reviewer2'];
		$sql1 = "SELECT * FROM Users Where Username = '$str'";
		$result1 = $con1->query($sql1);
		while($res = $result1->fetch_assoc()){
			$reviewFullname2 = $res["Fullname"];
		}
       $i = $i + 1;  
      $output .= '<tr>  
                          <td>'.$i.'</td>  
                          <td>'.$row["Title"].'</td>  
                          <td>'.$reviewFullname1.'</td>  
                          <td>'.$reviewFullname2.'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">List of Assigned Reviewers to the Abstracts</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th width="10%">Serial No.</th>  
                <th width="30%">Abstract Title</th>    
                <th width="30%">Reviewer1</th>  
                <th width="30%">Reviewer2</th>   
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
	  ob_end_clean();
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
                       
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h3 align="center">List of Assigned Reviewers to the Abstracts</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="10%">Serial No.</th>  
                               <th width="30%">Abstract Title</th>    
                               <th width="30%">Reviewer1</th>  
                               <th width="30%">Reviewer2</th>  
                          </tr>  
                     <?php
                      $val = fetch_data();  					 
                      echo $val;
                     ?>  
                     </table>  
                     <br />  
                </div>  
				<form method="post">  
                    <input type="submit" <?php if($val == '') {?> disabled="disabled" <?php } ?> name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                 </form>  
                </div>  
           </div>  
      </body>  
 </html>  