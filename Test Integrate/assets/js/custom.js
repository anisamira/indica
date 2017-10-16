/* Write here your custom javascript codes */
			$("#my_button").click(function(){            
    $("#my_table").append('<tr style="height:300px"><td>Some New text</td></tr>');
	
	
	 var max_fields      = 10; //maximum input boxes allowed
					var wrapper         = $(".input_fields_wrap"); //Fields wrapper
					var add_button      = $(".add_field_button"); //Add button ID
					
					var x = 1; //initlal text box count
					$(add_button).click(function(e){ //on add input button click
						e.preventDefault();
						if(x < max_fields){ //max input box allowed
							x++; //text box increment
							$(wrapper).append('<div><input type="text" name="goal[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field">X</button</div></br>'); //add input box
						}
					});
					
					$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
						e.preventDefault(); $(this).parent('div').remove(); x--;
					})
});




