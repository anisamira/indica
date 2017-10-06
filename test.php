  <table id="tableRealizzazione" style="border:1px solid;" class="display">
    <thead>
      <tr bgcolor="#B8D3E8" style:="">
        <th width="10%">Costi gestione</th>

        <th width="60%">descrizione</th>

        <th width="10%" align="center">Totale (migliaia euro)</th>

        <th width="10%">Azioni</th>
      </tr>
    </thead>

    <tbody>
      <tr class="even">
        <td>Locazione</td>

        <td><input type="text" value="" id="DescrizioneLocazione" name=
        "DescrizioneLocazione[]" /></td>

        <td align="center"><input type="text" class="totaliCostiGestione" value="0" id=
        "TotaleLocazione" name="TotaleLocazione[]" /></td>

        <td align="left"><input type="button" style="width: 50px;" value="+" id=
        "aggiungi" /></td>
      </tr>

      <tr class="odd">
        <td>Personale</td>

        <td><input type="text" value="" id="DescrizionePersonale" name=
        "DescrizionePersonale[]" /></td>

        <td align="center"><input type="text" class="totaliCostiGestione" value="0" id=
        "TotalePersonale" name="TotalePersonale[]" /></td>

        <td align="left"><input type="button" style="width: 50px;" value="+" id=
        "aggiungi" /></td>
      </tr>

      <tr class="even">
        <td>Consumi e manutenzione</td>

        <td><input type="text" value="" id="DescrizioneConsumiManutenzione" name=
        "DescrizioneConsumiManutenzione" /></td>

        <td align="center"><input type="text" class="totaliCostiGestione" value="0" id=
        "TotaleConsumiManutenzione" name="TotaleConsumiManutenzione" /></td>

        <td align="left"><input type="button" style="width: 50px;" value="+" id=
        "aggiungi" /></td>
      </tr>

      <tr class="odd">
        <td>Assicurazioni e simili</td>

        <td><input type="text" value="" id="DescrizioneAssicurazioniSimili" name=
        "DescrizioneAssicurazioniSimili" /></td>

        <td align="center"><input type="text" class="totaliCostiGestione" value="0" id=
        "TotaleAssicurazioniSimili" name="TotaleAssicurazioniSimili" /></td>

        <td align="left"><input type="button" style="width: 50px;" value="+" id=
        "aggiungi" /></td>
      </tr>

      <tr class="even">
        <td>Marketing</td>

        <td><input type="text" value="" id="DescrizioneMarketing" name=
        "DescrizioneMarketing" /></td>

        <td align="center"><input type="text" class="totaliCostiGestione" value="0" id=
        "TotaleMarketing" name="TotaleMarketing" /></td>

        <td align="left"><input type="button" style="width: 50px;" value="+" id=
        "aggiungi" /></td>
      </tr>

      <tr>
        <td>Totale</td>

        <td></td>

        <td align="center"><input type="text" readonly="readonly" value="0" id=
        "TotaleGestione" name="TotaleGestione" style=
        "background-color: rgb(204, 204, 204);" /></td>

        <td></td>
      </tr>
    </tbody>
  </table>
  	<!-- JS Global Compulsory -->
		<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
		<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  
  
<script type="text/javascript">  
 
    $('#aggiungi').live('click', function(){
        var thisRow = $(this).parent().parent();
        
        // clone and add data
        thisRow.clone(true).insertAfter(thisRow).data('is_clone',true);
        $(this).val("-");
        $(this).attr("id","remove");
        
        var nextRow = thisRow.next();
        nextRow.find('input:not(#aggiungi)').val("");
        
        if (thisRow.data('is_clone')){
            while(thisRow.data('is_clone')){
                thisRow = thisRow.prev();
            }
        }else{
            nextRow.children(":first").remove();
        }
        
        currRowSpan = thisRow.children(":first").attr("rowspan");
        thisRow.children(":first").attr("rowspan", currRowSpan+1);
    });
    
    $('#remove').live('click', function(){
        var thisRow = $(this).parent().parent(),
            prevRow = thisRow.prev();
        
        if (thisRow.data('is_clone')){
            while(prevRow.data('is_clone')){
                prevRow = prevRow.prev();
            }
        }else{
            prevRow = thisRow.next()
                             .removeData('is_clone')
                             .children(":first")
                             .before(thisRow.children(":first"))
                             .end();
        }
        
        currRowSpan = prevRow.children(":first").attr("rowspan");
        prevRow.children(":first").attr("rowspan", currRowSpan-1);
        thisRow.remove();
    });



</script>


