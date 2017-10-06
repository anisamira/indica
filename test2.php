 <table class="table table-bordered" style="width: 900px; margin-top: 5px;" align="center">
  <thead>
    <tr>
      <th class="cntr">
        From Date
      </th>
      <th class="cntr">
        To Date
      </th>
      <th class="cntr">
        From Hours
      </th>
      <th class="cntr">
        To Hours
      </th>
      <th class="cntr">
        MW
      </th>
      <th class="cntr">
        MW-Hours
      </th>
    </tr>
  </thead>
  <tbody class="tbody">
    <tr class="schedule">
      <td>
        <input type="text" name="fromDate" class="fromDate" id="fromDate" />
      </td>
      <td>
        <input type="text" name="toDate" class="toDate" id="toDate" />
      </td>
      <td>
        <table class="from_hour" width="100%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0">
          <tr class="from_hour_row">
            <td>
              <input type="text" name="fromHour" class="fromHour" id="fromHour" size="10" />
            </td>
          </tr>
        </table>
      </td>
      <td>
        <table class="to_hour" width="100%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0">
          <tr class="to_hour_row">
            <td>
              <input type="text" name="toHour" class="toHour" id="toHour" size="10" />
            </td>
          </tr>
        </table>
      </td>
      <td>
        <table class="mw" width="100%" cellspacing="0" cellpadding="0" color="#111111" border="0">
          <tr class="mw_row">
            <td>
              <input type="text" name="mw" class="mw" id="mw" value="0.00" size="10" />
            </td>
          </tr>
        </table>
      </td>
      <td>
        <table class="mw_hr" width="100%" cellspacing="0" cellpadding="0" color="#111111" border="0">
          <tr class="mw_hr_row">
            <td>
              <input type="text" name="mwhrs" class="mwhrs" id="mwhrs" />
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr class="sumtr" id="sumtr">
      <td id="sumtd" colspan="5">
        Total Mw-Hr : 
      </td>
      <td name="totalmwhrs" class="totalmwhrs" id="totalmwhrs">
        0
      </td>
    </tr>
  </tbody>
</table>
