<?php  include 'ViewResult.php';

 function fetch_data()  
 {  
      $connect = OpenCon();
	  $Prep = $_GET['value'];
      $output = '';  
      $sql = "SELECT * FROM abstract Where IsApproved = '1' AND IsGraded1=1 AND IsGraded2=1";  
      $result = mysqli_query($connect, $sql);  
	  $i = 0;
      while($row = mysqli_fetch_array($result))  
      {
        if($row["PresType"] != $Prep) continue;		  
       $i = $i + 1;  
	   $Path = 'Abstract/'.$row["UploadedItem"];
      $output .= '<tr>  
                          <td>'.$i.'</td>  
                          <td>'.$row["Title"].'</td>
                          <td>'.$row["Fullname"].'</td>
                          <td><a target="blank" href='.$Path.'>View Pdf</a></td>    						  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
                       
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
		        <?php $Prep = $_GET['value'];  ?>
                <h3 align="center"><?php echo "List of all ".$Prep." Presentator"; ?></h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="15%">Serial No.</th>  
                               <th width="40%">Presentation Title</th> 
                               <th width="25%">Full Name</th> 
                               <th width="20%">View Abstract</th>  							   
                          </tr>  
                     <?php
                      $val = fetch_data();  					 
                      echo $val;
                     ?>  
                     </table>  
                     <br />  
                </div>    
                </div>  
           </div>  
      </body>  
 </html>  