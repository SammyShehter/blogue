QUnit.test( "Todays Date", function( assert ) {
	var date = new Date();
	assert.equal("" + date.getDate() + "." + (date.getMonth()+1) + "." + date.getUTCFullYear(), last_update, "Todays Date");
});

QUnit.test( "Basic Recuper", function( assert ) {
    var good = 'style=\"text-align:left;\"width=\"90%\"></td></tr></tbody></table><br>שםעובד:<br>שםהמעסיק:<br>שםעורךהחישוב:<br>שנים:1,&nbsp;&nbsp;&nbsp;&nbsp;חודשים:0.00<br>תקופתעבודה:(23-10-2014)-(22-10-2015)<br>אחוזמשרה:100.0%<br>הערות:<br><br></div><divid=\"div_output_body\"><u>חישובדמיהבראה(תשלוםליוםהבראה:378ש\"ח)</u><tableborder=\"1\"id=\"output_table0\"><tbody><tr><td><b>שנים</b></td><td><b>ימיזכאות</b></td><td><b>ימיםלעובד</b></td><td><b>סכוםבכלשנה</b></td></tr><tr><td>1</td><tdstyle=\"text-align:center;\">5.00</td><tdstyle=\"text-align:center;\">5.00</td><tdstyle=\"text-align:center;\">1,890.00</td></tr><tr></tr></tbody></table><b>סה\"כ:1,890.00</b><br><br><u>חישובחופשה(תשלוםליוםחופשה:186.00ש\"ח)</u><tableborder=\"1\"id=\"output_table1\"><tbody><tr><td><b>שנים</b></td><td><b>ימיםלשנהמלאה</b></td><td><b>ימיחופשהלעובד</b></td><td><b>סכוםבכלשנה</b></td></tr><tr><td>1</td><tdstyle=\"text-align:center;\">12</td><tdstyle=\"text-align:center;\">12</td><tdstyle=\"text-align:center;\">2,232.00</td></tr><tr></tr></tbody></table><b>סה\"כ:2,232.00</b><br><br></div><divid=\"div_output_footer\"style=\"align:center;padding-right:0.5cm;padding-left:0.5cm;padding-top:1cm\"></div>';
	showForm(1);
	$("#formElement2-1").val("2014-10-23");
	$("#formElement3-1").val("2015-10-22");
	resetOutput();main([calcRecuper,calcVacation,calcHolidays]);
	var result = $('#div_output').html();
	result = result.replace(/[\t\n\s]+/g, "");
	result = result.substring(90);
	resetPage();
	assert.equal( result, good, "Basic Recuper" );
});

QUnit.test("Basic Pension", function(assert) {
	var good = ' \
<div id="div_output_header"><table width="100%"><tbody><tr><td width="10%">22-10-2015</td><td style="text-align:left;" width="90%"></td></tr></tbody></table><br>שם עובד: <br>שם המעסיק: <br>שם עורך החישוב: <br>שנים: 1, &nbsp;&nbsp;&nbsp;&nbsp; חודשים: 0.00<br>תקופת עבודה: (23-10-2014) - (22-10-2015)<br>אחוז משרה: 100.0%<br>הערות: <br><br></div> \
<div id="div_output_body"><u></u> על פי חוק, החישוב נעשה על בסיס שכר המינימום בישראל או השכר בפועל - הגבוה מביניהם<br><u>חישוב פנסיה</u> (הפרשות המעסיק בלבד, החל מהחודש השביעי לעבודה)<table border="1" id="output_table2"><tbody><tr><td><b>תקופה</b></td><td><b>מס חודשים לחישוב</b></td><td><b>שכר בסיס</b></td><td><b>אחוזים</b></td><td><b>רכיב הגמל</b></td><td><b>רכיב הפיצויים</b></td><td><b>סכום תקופה</b></td></tr><tr><td>23-10-2014 - 31-03-2015</td><td style="text-align:center;">0.00</td><td style="text-align:center;">4,300.00</td><td style="text-align:center;">6.00%+6.00%</td><td style="text-align:center;">0.00</td><td style="text-align:center;">0.00</td><td style="text-align:center;">0.00</td></tr><tr></tr><tr><td>01-04-2015 - 22-10-2015</td><td style="text-align:center;">6.00</td><td style="text-align:center;">4,650.00</td><td style="text-align:center;">6.00%+6.00%</td><td style="text-align:center;">1,674.00</td><td style="text-align:center;">1,674.00</td><td style="text-align:center;">3,348.00</td></tr><tr></tr></tbody></table><b>סה"כ: 3,348.00</b><br><br></div> \
<div id="div_output_footer" style="align:center;padding-right:0.5cm;padding-left:0.5cm;padding-top:1cm"></div>';
	showForm(1);
	$("#formElement2-1").val("2014-10-23");
	$("#formElement3-1").val("2015-10-22");
	resetOutput();main([calcPension,calcCompen,calcEarly]);
	var result = $('#div_output').html();
	good = good.replace(/[\t\n\s]+/g, "");
	good = good.substring(90);
	result = result.replace(/[\t\n\s]+/g, "");
	result = result.substring(90);
	resetPage();
	assert.equal( result, good, "Simple pension" );
})

QUnit.test("Half day a week", function(assert) {
	var good = ' \
		<div id="div_output_header"><table width="100%"><tbody><tr><td width="10%">02-11-2015</td><td style="text-align:left;" width="90%"></td></tr></tbody></table><br>שם עובד: <br>שם המעסיק: <br>שם עורך החישוב: <br>שנים: 1, &nbsp;&nbsp;&nbsp;&nbsp; חודשים: 0.00<br>תקופת עבודה: (03-11-2014) - (02-11-2015)<br>אחוז משרה: 11.6%<br>הערות: <br><br></div> \
		<div id="div_output_body"><u></u> על פי חוק, החישוב נעשה על בסיס שכר המינימום בישראל או השכר בפועל - הגבוה מביניהם<br><u>חישוב פנסיה</u> (הפרשות המעסיק בלבד, החל מהחודש השביעי לעבודה)<table border="1" id="output_table3"><tbody><tr><td><b>תקופה</b></td><td><b>מס חודשים לחישוב</b></td><td><b>שכר בסיס</b></td><td><b>אחוזים</b></td><td><b>רכיב הגמל</b></td><td><b>רכיב הפיצויים</b></td><td><b>סכום תקופה</b></td></tr><tr><td>03-11-2014 - 02-11-2015</td><td style="text-align:center;">6.00</td><td style="text-align:center;">2,150.00</td><td style="text-align:center;">6.00%+6.00%</td><td style="text-align:center;">774.00</td><td style="text-align:center;">774.00</td><td style="text-align:center;">1,548.00</td></tr><tr></tr></tbody></table><b>סה"כ: 1,548.00</b><br><br></div> \
		<div id="div_output_footer" style="align:center;padding-right:0.5cm;padding-left:0.5cm;padding-top:1cm"></div>';
	showForm(2);
	$("#formElement2-2").val("2014-11-03");
	$("#formElement3-2").val("2015-11-02");
	$("#formElement5-2").val("1000");
	$("#formElement8-2").val("0.5");
	$("#formElement9-2").val("5");
	
	resetOutput();main([calcPension,calcCompen,calcEarly]);
	var result = $('#div_output').html();
	good = good.replace(/[\t\n\s]+/g, "");
	good = good.substring(90);
	result = result.replace(/[\t\n\s]+/g, "");
	result = result.substring(90);
	resetPage();
	assert.equal( result, good, "Simple pension" );
})
QUnit.test("4 years pension", function(assert) {
	var good = ' \
<div id="div_output_header"><table width="100%"><tbody><tr><td width="10%">03-11-2015</td><td style="text-align:left;" width="90%"></td></tr></tbody></table><br>שם עובד: <br>שם המעסיק: <br>שם עורך החישוב: <br>שנים: 4, &nbsp;&nbsp;&nbsp;&nbsp; חודשים: 0.00<br>תקופת עבודה: (04-11-2011) - (03-11-2015)<br>אחוז משרה: 100.0%<br>הערות: <br><br></div> \
		<div id="div_output_body"><u></u> על פי חוק, החישוב נעשה על בסיס שכר המינימום בישראל או השכר בפועל - הגבוה מביניהם<br><u>חישוב פנסיה</u> (הפרשות המעסיק בלבד, החל מהחודש השביעי לעבודה)<table border="1" id="output_table4"><tbody><tr><td><b>תקופה</b></td><td><b>מס חודשים לחישוב</b></td><td><b>שכר בסיס</b></td><td><b>אחוזים</b></td><td><b>רכיב הגמל</b></td><td><b>רכיב הפיצויים</b></td><td><b>סכום תקופה</b></td></tr><tr><td>04-11-2011 - 31-12-2011</td><td style="text-align:center;">0.00</td><td style="text-align:center;">4,100.00</td><td style="text-align:center;">3.33%+3.33%</td><td style="text-align:center;">0.00</td><td style="text-align:center;">0.00</td><td style="text-align:center;">0.00</td></tr><tr></tr><tr><td>01-01-2012 - 30-09-2012</td><td style="text-align:center;">4.90</td><td style="text-align:center;">4,100.00</td><td style="text-align:center;">4.16%+4.16%</td><td style="text-align:center;">835.74</td><td style="text-align:center;">835.74</td><td style="text-align:center;">1,671.49</td></tr><tr></tr><tr><td>01-10-2012 - 31-12-2012</td><td style="text-align:center;">3.00</td><td style="text-align:center;">4,300.00</td><td style="text-align:center;">4.16%+4.16%</td><td style="text-align:center;">536.64</td><td style="text-align:center;">536.64</td><td style="text-align:center;">1,073.28</td></tr><tr></tr><tr><td>01-01-2013 - 31-12-2013</td><td style="text-align:center;">12.00</td><td style="text-align:center;">4,300.00</td><td style="text-align:center;">5.00%+5.00%</td><td style="text-align:center;">2,580.00</td><td style="text-align:center;">2,580.00</td><td style="text-align:center;">5,160.00</td></tr><tr></tr><tr><td>01-01-2014 - 31-03-2015</td><td style="text-align:center;">15.00</td><td style="text-align:center;">4,300.00</td><td style="text-align:center;">6.00%+6.00%</td><td style="text-align:center;">3,870.00</td><td style="text-align:center;">3,870.00</td><td style="text-align:center;">7,740.00</td></tr><tr></tr><tr><td>01-04-2015 - 03-11-2015</td><td style="text-align:center;">7.10</td><td style="text-align:center;">4,650.00</td><td style="text-align:center;">6.00%+6.00%</td><td style="text-align:center;">1,980.90</td><td style="text-align:center;">1,980.90</td><td style="text-align:center;">3,961.80</td></tr><tr></tr></tbody></table><b>סה"כ: 19,606.57</b><br><br></div> \
		<div id="div_output_footer" style="align:center;padding-right:0.5cm;padding-left:0.5cm;padding-top:1cm"></div>';
	showForm(1);
	$("#formElement2-1").val("2011-11-04");
	$("#formElement3-1").val("2015-11-03");
	resetOutput();main([calcPension,calcCompen,calcEarly]);
	var result = $('#div_output').html();
	good = good.replace(/[\t\n\s]+/g, "");
	good = good.substring(90);
	result = result.replace(/[\t\n\s]+/g, "");
	result = result.substring(90);
	resetPage();
	assert.equal( result, good, "Simple pension" );
})

QUnit.test("Well rounded compensation", function(assert) {
	var good = '\
style=\"text-align:left;\"width=\"90%\"></td></tr></tbody></table><br>שםעובד:<br>שםהמעסיק:<br>שםעורךהחישוב:<br>שנים:3,&nbsp;&nbsp;&nbsp;&nbsp;חודשים:0.17<br>תקופתעבודה:(11-06-2013)-(15-06-2016)<br>אחוזמשרה:100.0%<br>הערות:<br><br></div><divid=\"div_output_body\"><u></u>עלפיחוק,החישובנעשהעלבסיסשכרהמינימוםבישראלאוהשכרבפועל-הגבוהמביניהם<br><u>חישובפנסיה</u>(הפרשותהמעסיקבלבד,החלמהחודשהשביעילעבודה)<tableborder=\"1\"id=\"output_table5\"><tbody><tr><td><b>תקופה</b></td><td><b>מסחודשיםלחישוב</b></td><td><b>שכרבסיס</b></td><td><b>אחוזים</b></td><td><b>רכיבהגמל</b></td><td><b>סכוםתקופה</b></td></tr><tr><td>11-06-2013-31-12-2013</td><tdstyle=\"text-align:center;\">0.70</td><tdstyle=\"text-align:center;\">4,300.00</td><tdstyle=\"text-align:center;\">5.00%</td><tdstyle=\"text-align:center;\">150.50</td><tdstyle=\"text-align:center;\">150.50</td></tr><tr></tr><tr><td>01-01-2014-31-03-2015</td><tdstyle=\"text-align:center;\">15.00</td><tdstyle=\"text-align:center;\">4,300.00</td><tdstyle=\"text-align:center;\">6.00%</td><tdstyle=\"text-align:center;\">3,870.00</td><tdstyle=\"text-align:center;\">3,870.00</td></tr><tr></tr><tr><td>01-04-2015-15-06-2016</td><tdstyle=\"text-align:center;\">14.50</td><tdstyle=\"text-align:center;\">4,650.00</td><tdstyle=\"text-align:center;\">6.00%</td><tdstyle=\"text-align:center;\">4,045.50</td><tdstyle=\"text-align:center;\">4,045.50</td></tr><tr></tr></tbody></table><b>סה\"כ:8,066.00</b><br><br><u>פיצוייפיטורין</u><tableborder=\"1\"id=\"output_table6\"><tbody><tr></tr></tbody></table>סכוםהשכרXמספרהשנים:<pstyle=\"text-align:right;\"dir=\"ltr\">3.01X4,650.00=<b>13,996.50</b></p><u>תמורתהודעהמוקדמת:186.00ש\"ח</u><tableborder=\"1\"id=\"output_table7\"><tbody><tr></tr><tr><td>ימיםקלנדריים:</td><td><b>חודש</b></td></tr><tr><td>סכוםלתשלום:</td><td><b>4,650.00</b></td></tr></tbody></table></div><divid=\"div_output_footer\"style=\"align:center;padding-right:0.5cm;padding-left:0.5cm;padding-top:1cm\"></div>';
	showForm(1);
	$("#formElement2-1").val("2013-06-11");
	$("#formElement3-1").val("2016-06-15");
	$('#formElement13-1').click();
	resetOutput();main([calcPension,calcCompen,calcEarly]);
	var result = $('#div_output').html();
	result = result.replace(/[\t\n\s]+/g, "");
	result = result.substring(90);
	resetPage();
	assert.equal( result, good, "Simple pension" );
})