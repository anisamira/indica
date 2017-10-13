<div class='container'>
 
 <table width='100%' border='0'>
  <tr>
   <th width='10%'></th>
   <th width='40%'>Goals</th>
   <th width='40%'>Name</th>
  </tr>
  <?php 
   $query = "select * from goli DESC";
   $result = mysql_query($query);
   $count = 1;
   while($row = mysql_fetch_array($result) ){
    $goal = $row['goals'];
    
  ?>
  <tr>
   <td><?php echo $count; ?></td>
   <td> 
     <div contentEditable='true' class='edit' id='goals_<?php echo $id; ?>'> 
       <?php echo $goals; ?>
     </div> 
   </td>
  </tr>
  <?php
   $count ++;
  }
  ?> 
 </table>
</div>