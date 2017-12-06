<script type="text/javascript">
		jQuery(document).ready(function() {
					var max_fields      = 10; 
					var wrapper         = $(".input_fields_wrap");
					var add_button      = $(".add_field_button"); 
					
					var x = 1; 
					$(add_button).click(function(e){ 
						e.preventDefault();
						if(x < max_fields){ 
							x++;
							$(wrapper).append('<div><input type="text" name="goal[]" style="width:94%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>'); //add input box
						}
					});
					
					$(wrapper).on("click",".remove_field", function(e){ 
						e.preventDefault(); $(this).parent('div').remove(); x--;
					})
					
					
					var wrapperstrategy1  =  $(".wrapstrategy1");
					var add_strategy1 = $(".add_strategy1"); 
							
						$(add_strategy1).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy1).append('<div><input type="text" name="strategy1[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy1).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapperstrategy2  =  $(".wrapstrategy2");
						var add_strategy2 = $(".add_strategy2"); 
							
							$(add_strategy2).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy2).append('<div><input type="text" name="strategy2[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy2).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperstrategy3  =  $(".wrapstrategy3");
						var add_strategy3 = $(".add_strategy3"); 
							
							$(add_strategy3).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy3).append('<div><input type="text" name="strategy3[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy3).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapperstrategy4  =  $(".wrapstrategy4");
						var add_strategy4 = $(".add_strategy4"); 
							
							$(add_strategy4).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy4).append('<div><input type="text" name="strategy4[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy4).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperstrategy5  =  $(".wrapstrategy5");
						var add_strategy5 = $(".add_strategy5"); 
							
							$(add_strategy5).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy5).append('<div><input type="text" name="strategy5[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy5).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperstrategy6  =  $(".wrapstrategy6");
						var add_strategy6 = $(".add_strategy6"); 
							
							$(add_strategy6).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy6).append('<div><input type="text" name="strategy6[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy6).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperstrategy7 =  $(".wrapstrategy7");
						var add_strategy7 = $(".add_strategy7"); 
							
							$(add_strategy7).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy7).append('<div><input type="text" name="strategy7[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy7).on("click",".remove_field", function(e){
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						var wrapperstrategy8  =  $(".wrapstrategy8");
						var add_strategy8 = $(".add_strategy8");
							
							$(add_strategy8).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy8).append('<div><input type="text" name="strategy8[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy8).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						
						var wrapperstrategy9  =  $(".wrapstrategy9");
						var add_strategy9 = $(".add_strategy9");
							
							$(add_strategy9).click(function(e){
							e.preventDefault();
							$(wrapperstrategy9).append('<div><input type="text" name="strategy9[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy9).on("click",".remove_field", function(e){
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						var wrapperstrategy10  =  $(".wrapstrategy10");
						var add_strategy10 = $(".add_strategy10"); 
							
							$(add_strategy10).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy10).append('<div><input type="text" name="strategy10[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy10).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						var wrapperstrategy11  =  $(".wrapstrategy11");
						var add_strategy11 = $(".add_strategy11"); 
							
							$(add_strategy11).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy11).append('<div><input type="text" name="strategy11[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy11).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						var wrapperstrategy12  =  $(".wrapstrategy12");
						var add_strategy12 = $(".add_strategy12"); 
							
							$(add_strategy12).click(function(e){ 
							e.preventDefault();
							$(wrapperstrategy12).append('<div><input type="text" name="strategy12[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div>'); //add input box
						});
							
						$(wrapperstrategy12).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						
						
					var wrapperaction1  =  $(".wrapaction1");
						var add_action1 = $(".add_action1"); 
							
						$(add_action1).click(function(e){
							e.preventDefault();
							$(wrapperaction1).append('<div><input type="text" name="action1[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction1).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapperaction2  =  $(".wrapaction2");
						var add_action2 = $(".add_action2");
							
						$(add_action2).click(function(e){
							e.preventDefault();
							$(wrapperaction2).append('<div><input type="text" name="action2[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction2).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperaction3  =  $(".wrapaction3");
						var add_action3 = $(".add_action3");
							
						$(add_action3).click(function(e){ 
							e.preventDefault();
							$(wrapperaction3).append('<div><input type="text" name="action3[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction3).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapperaction4  =  $(".wrapaction4");
						var add_action4 = $(".add_action4"); 
							
						$(add_action4).click(function(e){
							e.preventDefault();
							$(wrapperaction4).append('<div><input type="text" name="action4[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction4).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperaction5  =  $(".wrapaction5");
						var add_action5 = $(".add_action5");
							
						$(add_action5).click(function(e){
							e.preventDefault();
							$(wrapperaction5).append('<div><input type="text" name="action5[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>'); //add input box
						});
							
						$(wrapperaction5).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperaction6  =  $(".wrapaction6");
						var add_action6 = $(".add_action6");
							
						$(add_action6).click(function(e){ 
							e.preventDefault();
							$(wrapperaction6).append('<div><input type="text" name="action6[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction6).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperaction7  =  $(".wrapaction7");
						var add_action7 = $(".add_action7"); 
							
						$(add_action7).click(function(e){ 
							e.preventDefault();
							$(wrapperaction7).append('<div><input type="text" name="action7[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction7).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperaction8  =  $(".wrapaction8");
						var add_action8 = $(".add_action8"); 
							
						$(add_action8).click(function(e){ 
							e.preventDefault();
							$(wrapperaction8).append('<div><input type="text" name="action8[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction8).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						
						var wrapperaction9  =  $(".wrapaction9");
						var add_action9 = $(".add_action9"); 
							
						$(add_action9).click(function(e){ 
							e.preventDefault();
							$(wrapperaction9).append('<div><input type="text" name="action9[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction9).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperaction10  =  $(".wrapaction10");
						var add_action10 = $(".add_action10"); 
							
						$(add_action10).click(function(e){ 
							e.preventDefault();
							$(wrapperaction10).append('<div><input type="text" name="action10[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction10).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});

						
						
						var wrapperaction11  =  $(".wrapaction11");
						var add_action11 = $(".add_action11"); 
							
						$(add_action11).click(function(e){ 
							e.preventDefault();
							$(wrapperaction11).append('<div><input type="text" name="action11[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction11).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperaction12  =  $(".wrapaction12");
						var add_action12 = $(".add_action12"); 
							
						$(add_action12).click(function(e){ 
							e.preventDefault();
							$(wrapperaction12).append('<div><input type="text" name="action12[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction12).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperaction13  =  $(".wrapaction13");
						var add_action13 = $(".add_action13"); 
							
						$(add_action13).click(function(e){ 
							e.preventDefault();
							$(wrapperaction13).append('<div><input type="text" name="action13[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction13).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperaction14  =  $(".wrapaction14");
						var add_action14 = $(".add_action14"); 
							
						$(add_action14).click(function(e){ 
							e.preventDefault();
							$(wrapperaction14).append('<div><input type="text" name="action14[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperaction14).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						
						var wrapperkpi1  =  $(".wrapkpi1");
						var add_kpi1 = $(".add_kpi1"); 
							
						$(add_kpi1).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi1).append('<div><input type="text" name="kpi1[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi1).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapperkpi2  =  $(".wrapkpi2");
						var add_kpi2 = $(".add_kpi2"); 
							
						$(add_kpi2).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi2).append('<div><input type="text" name="kpi2[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi2).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperkpi3  =  $(".wrapkpi3");
						var add_kpi3 = $(".add_kpi3"); 
							
						$(add_kpi3).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi3).append('<div><input type="text" name="kpi3[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi3).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						var wrapperkpi4  =  $(".wrapkpi4");
						var add_kpi4 = $(".add_kpi4"); 
							
						$(add_kpi4).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi4).append('<div><input type="text" name="kpi4[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi4).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperkpi5  =  $(".wrapkpi5");
						var add_kpi5 = $(".add_kpi5"); 
						$(add_kpi5).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi5).append('<div><input type="text" name="kpi5[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi5).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperkpi6  =  $(".wrapkpi6");
						var add_kpi6 = $(".add_kpi6"); 
							
						$(add_kpi6).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi6).append('<div><input type="text" name="kpi6[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi6).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperkpi7  =  $(".wrapkpi7");
						var add_kpi7 = $(".add_kpi7"); 
							
						$(add_kpi7).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi7).append('<div><input type="text" name="kpi7[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi7).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperkpi8  =  $(".wrapkpi8");
						var add_kpi8 = $(".add_kpi8"); 
							
						$(add_kpi8).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi8).append('<div><input type="text" name="kpi8[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi8).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						
						
						var wrapperkpi9  =  $(".wrapkpi9");
						var add_kpi9 = $(".add_kpi9"); 
							
						$(add_kpi9).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi9).append('<div><input type="text" name="kpi9[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi9).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});
						
						
						
						
						var wrapperkpi10  =  $(".wrapkpi10");
						var add_kpi10 = $(".add_kpi10"); 
							
						$(add_kpi10).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi10).append('<div><input type="text" name="kpi10[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi10).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						var wrapperkpi11  =  $(".wrapkpi11");
						var add_kpi11 = $(".add_kpi11"); 
							
						$(add_kpi11).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi11).append('<div><input type="text" name="kpi11[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi11).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						var wrapperkpi12  =  $(".wrapkpi12");
						var add_kpi12 = $(".add_kpi12"); 
							
						$(add_kpi12).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi12).append('<div><input type="text" name="kpi12[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi12).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						
						var wrapperkpi13  =  $(".wrapkpi13");
						var add_kpi13 = $(".add_kpi13"); 
							
						$(add_kpi13).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi13).append('<div><input type="text" name="kpi13[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi13).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperkpi14  =  $(".wrapkpi14");
						var add_kpi14 = $(".add_kpi14"); 
							
						$(add_kpi14).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi14).append('<div><input type="text" name="kpi14[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi14).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperkpi15  =  $(".wrapkpi15");
						var add_kpi15 = $(".add_kpi15"); 
							
						$(add_kpi15).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi15).append('<div><input type="text" name="kpi15[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi15).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperkpi16  =  $(".wrapkpi16");
						var add_kpi16 = $(".add_kpi16"); 
							
						$(add_kpi16).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi16).append('<div><input type="text" name="kpi16[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi16).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperkpi17  =  $(".wrapkpi17");
						var add_kpi17 = $(".add_kpi17"); 
							
						$(add_kpi17).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi17).append('<div><input type="text" name="kpi17[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi17).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
						
						
						
						var wrapperkpi18  =  $(".wrapkpi18");
						var add_kpi18 = $(".add_kpi15"); 
							
						$(add_kpi18).click(function(e){ 
							e.preventDefault();
							$(wrapperkpi18).append('<div><input type="text" name="kpi18[]" style="width:90%; height:34px; margin-bottom:12px;"/><button href="#" class="btn remove_field btn-u btn-u-red" type="button"><i class="fa fa-trash-o"/></button></div></br>');
						});
							
						$(wrapperkpi18).on("click",".remove_field", function(e){ 
							e.preventDefault(); $(this).parent('div').remove();
						});	
	
	
	
		
						
		});
	</script>




