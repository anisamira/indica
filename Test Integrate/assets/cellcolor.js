		<script type="text/javascript" src="/my portable files/jquery.min.js"></script>
		<script type="text/javascript" src="/my portable files/jquery.table2excel.min.js"></script>
<script>
	$(document).ready(function(){
		$("table td.cellcolor").each( function() {
			var thisCell = $(this);
			var cellValue = parseInt(thisCell.text());
		
			if (!isNaN(cellValue) && (cellValue <=50)) {
				thisCell.css("background-color","#FF0000");
			}
			else if (!isNaN(cellValue) && (cellValue <=80)) {
				thisCell.css("background-color","#FFFF00");
			}
			else{
				thisCell.css("background-color","#3CB371");
			}
		})
	})
		
	
	

	
	
	
</script>