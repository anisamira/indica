<?php  
 include('connection.php');
 $output = '';  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered"> 
				<tr>
					<th colspan="3"></th>
					<th colspan="2">BASELINE</th>
					<th colspan="5">TARGET</th>
					<th colspan="4">REFERENCE</th>						
					<th>Action</th>
				</tr>
                <tr>  
					<th>Id</th>   
					<th>KPI</th>
					<th>Operation Definition</th>
					<th>Achievement 2014</th>  
					<th>Achievement 2015</th>
					<th>Target 2016</th>  
					<th>Target 2017</th>  
					<th>Target 2018</th>  
					<th>Target 2019</th>  
					<th>Target 2020</th>
					<th>Ownership</th> 
					<th>Data Source</th> 
					<th>Estimated Cost (RM)</th> 
					<th>Expected Financial Returns</th> 				
                    <th>Delete</th> 
					
										
                </tr>    
                <tr>  
               
					<td></td>  
					<td id="kpidesc" contenteditable></td>
					<td id="op_def" contenteditable></td>
					<td id="base1" contenteditable></td>  
					<td id="base2" contenteditable></td>
					<td id="tgt1" contenteditable></td>  
					<td id="tgt2" contenteditable></td>  
					<td id="tgt3" contenteditable></td>  
					<td id="tgt4" contenteditable></td>  
					<td id="tgt5" contenteditable></td>
					<td id="own" contenteditable></td>  
					<td id="datasource" contenteditable></td>  
					<td id="estcost" contenteditable></td>  
					<td id="expfinreturn" contenteditable></td>    				
					
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			</tr>  
      </table>  
      </div>';  
 echo $output;  
 ?>