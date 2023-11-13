<?php  
     $connect = mysqli_connect("localhost", "root", "", "qr_application");  
     $output = '';  
     $sql = "SELECT * FROM tbl_sample ORDER BY steps ASC";  
     $result = mysqli_query($connect, $sql);  
     $output .= '  
     <div>
               <link rel="stylesheet" type="text/css" href="batch.css">
               <a href="logout.php" class="btns brn-dark">Logout</a>
     
      </div> 
      <div style="text-align: right; margin-top: -30px;">               
               <a href="generateqr.php" class="btnd brn-dark">Upload to QR</a>
      </div>     

      <div class="table-responsive" style="background-color: 99c8d6; margin-top: 20px; ">  
           <table class="table table-bordered" >  
                <tr>  
                <th width="40%" style="text-align: center" rowspan="2" >Mixing Phase</th>   
                <th width="5%"  style="text-align: center" rowspan="2" >Steps</th>  
                <th width="10%" style="text-align: center" rowspan="2" >Actions </th>  
                <th width="10%" style="text-align: center" rowspan="2">Material Name</th>
                <th width="10%" style="text-align: center" >Material Weight</th>                    
                <th width="10%" style="text-align: center" >Rotator 1</th>
                <th width="10%" style="text-align: center" >Rotator 2</th>
                <th width="10%" style="text-align: center" >Mixing Time</th>
                <th width="10%" style="text-align: center" >Pressure</th>  
                                          
                     <th width="10%">Delete</th>  
                     
                </tr> 
               
                <tr>
                                     <th >Input [Kg]</th>
                                     <th >Speed [rpm]</th>
                                     <th >Speed[rpm]</th>
                                     <th >Input [mins]</th>
                                     <th >Input on/off</th>
                               </tr>';
     $rows = mysqli_num_rows($result);
     if($rows > 0)  
     {  
          if($rows > 20)
          {
               $delete_records = $rows - 20;
               $delete_sql = "DELETE FROM tbl_sample LIMIT $delete_records";
               mysqli_query($connect, $delete_sql);
          }
          while($row = mysqli_fetch_array($result))  
          {  
           $output .= '  
                <tr> 
                     <td class="Mixing_Phase" data-steps0="'.$row["steps"].'" contenteditable style="text-align: left">'.$row["Mixing_Phase"].'</td>  
                     <td style="text-align: center">'.$row["steps"].'</td>  
                     <td class="Actions" data-steps1="'.$row["steps"].'" contenteditable style="text-align: center">'.$row["Actions"].'</td>  
                     <td class="Material_name" data-steps2="'.$row["steps"].'" contenteditable style="text-align: center">'.$row["Material_name"].'</td>
                     <td class="Material_Weight" data-steps3="'.$row["steps"].'" contenteditable style="text-align: center">'.$row["Material_Weight"].'</td> 
                     <td class="Rotator_1" data-steps4="'.$row["steps"].'" contenteditable style="text-align: center">'.$row["Rotator_1"].'</td>
                     <td class="Rotator_2" data-steps5="'.$row["steps"].'" contenteditable style="text-align: center">'.$row["Rotator_2"].'</td> 
                     <td class="Mixing_time" data-steps6="'.$row["steps"].'" contenteditable style="text-align: center">'.$row["Mixing_time"].'</td>
                     <td class="Pressure" data-steps7="'.$row["steps"].'" contenteditable style="text-align: center">'.$row["Pressure"].'</td> 
                     <td style="text-align: center"><button type="button" name="delete_btn" data-steps8="'.$row["steps"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
          }  
          $output .= '  
           <tr>  

                <td id ="Mixing_Phase" contenteditable></td> 
                <td></td>  
                <td id ="Actions" contenteditable></td>  
                <td id ="Material_name" contenteditable></td>
                <td id ="Material_Weight" contenteditable></td>
                <td id ="Rotator_1" contenteditable></td>    
                <td id ="Rotator_2" contenteditable></td> 
                <td id ="Mixing_time" contenteditable></td> 
                <td id ="Pressure" contenteditable></td>                 
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
          ';  
          }  
          else  
          {  
          $output .= '
				<tr> 
                         <td id="Mixing_Phase" contenteditable></td> 
					<td></td>  
					<td id="Actions" contenteditable></td>  
					<td id="Material_name" contenteditable></td> 
                         <td id="Material_Weight" contenteditable></td>  
                         <td id="Rotator_1" contenteditable></td>
                         <td id="Rotator_2" contenteditable></td>
                         <td id="Mixing_time" contenteditable></td>
                         <td id="Pressure" contenteditable></td>                         
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
          }  
          $output .= '</table>  
                       
          <div style="text-align: right;">
          <a href="" class="btn brn-dark">Save Batch</a>
      </div>
      
      
      <div style="text-align: left;">
      <a href="delete table.php" class="btn brn-dark">Clear table</a>
  </div>'; 
       
          echo $output;  
          
 
 ?>