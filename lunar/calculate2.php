<!DOCTYPE html>

<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){

	  Header("Location: form_login.php");

}else{?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script language=JavaScript>

        var datePickerDivID = "datepicker";
        var iFrameDivID = "datepickeriframe";

        var dayArrayShort = new Array('อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.');
        var dayArrayMed = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        var dayArrayLong = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        var monthArrayShort = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        var monthArrayMed = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        var monthArrayLong = new Array('มกราคม', 'กุภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');

        var defaultDateSeparator = "-";        // รูปแบบตัวคั่นระหว่าง วัน เดือน ปี (มี "/" or ".")
        var defaultDateFormat = "ymd"    // ใส่รูปแบบการเรียงลำดับของ วัน เดือน ปี ครับ (มี "mdy", "dmy", and "ymd")
        var dateSeparator = defaultDateSeparator;
        var dateFormat = defaultDateFormat;


        function displayDatePicker(dateFieldName, displayBelowThisObject, dtFormat, dtSep)
        {
          var targetDateField = document.getElementsByName (dateFieldName).item(0);

          // if we weren't told what node to display the datepicker beneath, just display it
          // beneath the date field we're updating
          if (!displayBelowThisObject)
            displayBelowThisObject = targetDateField;

          // if a date separator character was given, update the dateSeparator variable
          if (dtSep)
            dateSeparator = dtSep;
          else
            dateSeparator = defaultDateSeparator;

          // if a date format was given, update the dateFormat variable
          if (dtFormat)
            dateFormat = dtFormat;
          else
            dateFormat = defaultDateFormat;

          var x = displayBelowThisObject.offsetLeft;
          var y = displayBelowThisObject.offsetTop + displayBelowThisObject.offsetHeight ;

          // deal with elements inside tables and such
          var parent = displayBelowThisObject;
          while (parent.offsetParent) {
            parent = parent.offsetParent;
            x += parent.offsetLeft;
            y += parent.offsetTop ;
          }

          drawDatePicker(targetDateField, x, y);
        }



        function drawDatePicker(targetDateField, x, y)
        {
          var dt = getFieldDate(targetDateField.value );

          // the datepicker table will be drawn inside of a <div> with an ID defined by the
          // global datePickerDivID variable. If such a div doesn't yet exist on the HTML
          // document we're working with, add one.
          if (!document.getElementById(datePickerDivID)) {
            // don't use innerHTML to update the body, because it can cause global variables
            // that are currently pointing to objects on the page to have bad references
            //document.body.innerHTML += "<div id='" + datePickerDivID + "' class='dpDiv'></div>";
            var newNode = document.createElement("div");
            newNode.setAttribute("id", datePickerDivID);
            newNode.setAttribute("class", "dpDiv");
            newNode.setAttribute("style", "visibility: hidden;");
            document.body.appendChild(newNode);
          }

          // move the datepicker div to the proper x,y coordinate and toggle the visiblity
          var pickerDiv = document.getElementById(datePickerDivID);
          pickerDiv.style.position = "absolute";
          pickerDiv.style.left = x + "px";
          pickerDiv.style.top = y + "px";
          pickerDiv.style.visibility = (pickerDiv.style.visibility == "visible" ? "hidden" : "visible");
          pickerDiv.style.display = (pickerDiv.style.display == "block" ? "none" : "block");
          pickerDiv.style.zIndex = 10000;

          // draw the datepicker table
          refreshDatePicker(targetDateField.name, dt.getFullYear(), dt.getMonth(), dt.getDate());
        }


        /**
        This is the function that actually draws the datepicker calendar.
        */
        function refreshDatePicker(dateFieldName, year, month, day)
        {
          // if no arguments are passed, use today's date; otherwise, month and year
          // are required (if a day is passed, it will be highlighted later)
          var thisDay = new Date();

          if ((month >= 0) && (year > 0)) {
            thisDay = new Date(year, month, 1);
          } else {
            day = thisDay.getDate();
            thisDay.setDate(1);
          }

          // the calendar will be drawn as a table
          // you can customize the table elements with a global CSS style sheet,
          // or by hardcoding style and formatting elements below
          var crlf = "\r\n";
          var TABLE = "<table cols=7 class='dpTable'>" + crlf;
          var xTABLE = "</table>" + crlf;
          var TR = "<tr class='dpTR'>";
          var TR_title = "<tr class='dpTitleTR'>";
          var TR_days = "<tr class='dpDayTR'>";
          var TR_todaybutton = "<tr class='dpTodayButtonTR'>";
          var xTR = "</tr>" + crlf;
          var TD = "<td class='dpTD' onMouseOut='this.className=\"dpTD\";' onMouseOver=' this.className=\"dpTDHover\";' ";    // leave this tag open, because we'll be adding an onClick event
          var TD_title = "<td colspan=5 class='dpTitleTD'>";
          var TD_buttons = "<td class='dpButtonTD'>";
          var TD_todaybutton = "<td colspan=7 class='dpTodayButtonTD'>";
          var TD_days = "<td class='dpDayTD'>";
          var TD_selected = "<td class='dpDayHighlightTD' onMouseOut='this.className=\"dpDayHighlightTD\";' onMouseOver='this.className=\"dpTDHover\";' ";    // leave this tag open, because we'll be adding an onClick event
          var xTD = "</td>" + crlf;
          var DIV_title = "<div class='dpTitleText'>";
          var DIV_selected = "<div class='dpDayHighlight'>";
          var xDIV = "</div>";

          // start generating the code for the calendar table
          var html = TABLE;

          // this is the title bar, which displays the month and the buttons to
          // go back to a previous month or forward to the next month
          html += TR_title;
          html += TD_buttons + getButtonCode(dateFieldName, thisDay, -1, "<") + xTD;
          html += TD_title + DIV_title + monthArrayLong[ thisDay.getMonth()] + " " + thisDay.getFullYear() + xDIV + xTD;
          html += TD_buttons + getButtonCode(dateFieldName, thisDay, 1, ">") + xTD;
          html += xTR;

          // this is the row that indicates which day of the week we're on
          html += TR_days;
          for(i = 0; i < dayArrayShort.length; i++)
            html += TD_days + dayArrayShort[i] + xTD;
          html += xTR;

          // now we'll start populating the table with days of the month
          html += TR;

          // first, the leading blanks
          for (i = 0; i < thisDay.getDay(); i++)
            html += TD + " " + xTD;

          // now, the days of the month
          do {
            dayNum = thisDay.getDate();
            TD_onclick = " onclick=\"updateDateField('" + dateFieldName + "', '" + getDateString(thisDay) + "');\">";

            if (dayNum == day)
              html += TD_selected + TD_onclick + DIV_selected + dayNum + xDIV + xTD;
            else
              html += TD + TD_onclick + dayNum + xTD;

            // if this is a Saturday, start a new row
            if (thisDay.getDay() == 6)
              html += xTR + TR;

            // increment the day
            thisDay.setDate(thisDay.getDate() + 1);
          } while (thisDay.getDate() > 1)

          // fill in any trailing blanks
          if (thisDay.getDay() > 0) {
            for (i = 6; i > thisDay.getDay(); i--)
              html += TD + " " + xTD;
          }
          html += xTR;

          // add a button to allow the user to easily return to today, or close the calendar
          var today = new Date();
          var todayString = "Today is " + dayArrayMed[today.getDay()] + ", " + monthArrayMed[ today.getMonth()] + " " + today.getDate();
          html += TR_todaybutton + TD_todaybutton;

          html += "<button class='dpTodayButton' onClick='refreshDatePicker(\"" + dateFieldName + "\");'>เดือนนี้</button> ";
          html += "<button class='dpTodayButton' onClick='updateDateField(\"" + dateFieldName + "\");'>ปิด</button>";

          html += xTD + xTR;

          // and finally, close the table
          html += xTABLE;

          document.getElementById(datePickerDivID).innerHTML = html;
          // add an "iFrame shim" to allow the datepicker to display above selection lists
          adjustiFrame();
        }


        /**
        Convenience function for writing the code for the buttons that bring us back or forward
        a month.
        */
        function getButtonCode(dateFieldName, dateVal, adjust, label)
        {
          var newMonth = (dateVal.getMonth () + adjust) % 12;
          var newYear = dateVal.getFullYear() + parseInt((dateVal.getMonth() + adjust) / 12);
          if (newMonth < 0) {
            newMonth += 12;
            newYear += -1;
          }

          return "<button class='dpButton' onClick='refreshDatePicker(\"" + dateFieldName + "\", " + newYear + ", " + newMonth + ");'>" + label + "</button>";
        }


        /**
        Convert a JavaScript Date object to a string, based on the dateFormat and dateSeparator
        variables at the beginning of this script library.
        */
        function getDateString(dateVal)
        {
          var dayString = "00" + dateVal.getDate();
          var monthString = "00" + (dateVal.getMonth()+1);
          dayString = dayString.substring(dayString.length - 2);
          monthString = monthString.substring(monthString.length - 2);

          switch (dateFormat) {
            case "dmy" :
              return dayString + dateSeparator + monthString + dateSeparator + dateVal.getFullYear();
            case "ymd" :
              return dateVal.getFullYear() + dateSeparator + monthString + dateSeparator + dayString;
            case "mdy" :
            default :
              return monthString + dateSeparator + dayString + dateSeparator + dateVal.getFullYear();
          }
        }


        /**
        Convert a string to a JavaScript Date object.
        */
        function getFieldDate(dateString)
        {
          var dateVal;
          var dArray;
          var d, m, y;

          try {
            dArray = splitDateString(dateString);
            if (dArray) {
              switch (dateFormat) {
                case "dmy" :
                  d = parseInt(dArray[0], 10);
                  m = parseInt(dArray[1], 10) - 1;
                  y = parseInt(dArray[2], 10);
                  break;
                case "ymd" :
                  d = parseInt(dArray[2], 10);
                  m = parseInt(dArray[1], 10) - 1;
                  y = parseInt(dArray[0], 10);
                  break;
                case "mdy" :
                default :
                  d = parseInt(dArray[1], 10);
                  m = parseInt(dArray[0], 10) - 1;
                  y = parseInt(dArray[2], 10);
                  break;
              }
              dateVal = new Date(y, m, d);
            } else if (dateString) {
              dateVal = new Date(dateString);
            } else {
              dateVal = new Date();
            }
          } catch(e) {
            dateVal = new Date();
          }

          return dateVal;
        }


        /**
        Try to split a date string into an array of elements, using common date separators.
        If the date is split, an array is returned; otherwise, we just return false.
        */
        function splitDateString(dateString)
        {
          var dArray;
          if (dateString.indexOf("/") >= 0)
            dArray = dateString.split("/");
          else if (dateString.indexOf(".") >= 0)
            dArray = dateString.split(".");
          else if (dateString.indexOf("-") >= 0)
            dArray = dateString.split("-");
          else if (dateString.indexOf("\\") >= 0)
            dArray = dateString.split("\\");
          else
            dArray = false;

          return dArray;
        }

        /**
        Update the field with the given dateFieldName with the dateString that has been passed,
        and hide the datepicker. If no dateString is passed, just close the datepicker without
        changing the field value.

        Also, if the page developer has defined a function called datePickerClosed anywhere on
        the page or in an imported library, we will attempt to run that function with the updated
        field as a parameter. This can be used for such things as date validation, setting default
        values for related fields, etc. For example, you might have a function like this to validate
        a start date field:

        function datePickerClosed(dateField)
        {
          var dateObj = getFieldDate(dateField.value);
          var today = new Date();
          today = new Date(today.getFullYear(), today.getMonth(), today.getDate());

          if (dateField.name == "StartDate") {
            if (dateObj < today) {
              // if the date is before today, alert the user and display the datepicker again
              alert("Please enter a date that is today or later");
              dateField.value = "";
              document.getElementById(datePickerDivID).style.visibility = "visible";
              adjustiFrame();
            } else {
              // if the date is okay, set the EndDate field to 7 days after the StartDate
              dateObj.setTime(dateObj.getTime() + (7 * 24 * 60 * 60 * 1000));
              var endDateField = document.getElementsByName ("EndDate").item(0);
              endDateField.value = getDateString(dateObj);
            }
          }
        }

        */
        function updateDateField(dateFieldName, dateString)
        {
          var targetDateField = document.getElementsByName (dateFieldName).item(0);
          if (dateString)
            targetDateField.value = dateString;

          var pickerDiv = document.getElementById(datePickerDivID);
          pickerDiv.style.visibility = "hidden";
          pickerDiv.style.display = "none";

          adjustiFrame();
          targetDateField.focus();

          // after the datepicker has closed, optionally run a user-defined function called
          // datePickerClosed, passing the field that was just updated as a parameter
          // (note that this will only run if the user actually selected a date from the datepicker)
          if ((dateString) && (typeof(datePickerClosed) == "function"))
            datePickerClosed(targetDateField);
        }


        /**
        Use an "iFrame shim" to deal with problems where the datepicker shows up behind
        selection list elements, if they're below the datepicker. The problem and solution are
        described at:

        http://dotnetjunkies.com/WebLog/jking/archive/2003/07/21/488.aspx
        http://dotnetjunkies.com/WebLog/jking/archive/2003/10/30/2975.aspx
        */
        function adjustiFrame(pickerDiv, iFrameDiv)
        {
          // we know that Opera doesn't like something about this, so if we
          // think we're using Opera, don't even try
          var is_opera = (navigator.userAgent.toLowerCase().indexOf("opera") != -1);
          if (is_opera)
            return;

          // put a try/catch block around the whole thing, just in case
          try {
            if (!document.getElementById(iFrameDivID)) {
              // don't use innerHTML to update the body, because it can cause global variables
              // that are currently pointing to objects on the page to have bad references
              //document.body.innerHTML += "<iframe id='" + iFrameDivID + "' src='javascript:false;' scrolling='no' frameborder='0'>";
              var newNode = document.createElement("iFrame");
              newNode.setAttribute("id", iFrameDivID);
              newNode.setAttribute("src", "javascript:false;");
              newNode.setAttribute("scrolling", "no");
              newNode.setAttribute ("frameborder", "0");
              document.body.appendChild(newNode);
            }

            if (!pickerDiv)
              pickerDiv = document.getElementById(datePickerDivID);
            if (!iFrameDiv)
              iFrameDiv = document.getElementById(iFrameDivID);

            try {
              iFrameDiv.style.position = "absolute";
              iFrameDiv.style.width = pickerDiv.offsetWidth;
              iFrameDiv.style.height = pickerDiv.offsetHeight ;
              iFrameDiv.style.top = pickerDiv.style.top;
              iFrameDiv.style.left = pickerDiv.style.left;
              iFrameDiv.style.zIndex = pickerDiv.style.zIndex - 1;
              iFrameDiv.style.visibility = pickerDiv.style.visibility ;
              iFrameDiv.style.display = pickerDiv.style.display;
            } catch(e) {
            }

          } catch (ee) {
          }

        }

        </script>

        <style>

        /* the div that holds the date picker calendar */
        .dpDiv {

        	}

        /* the table (within the div) that holds the date picker calendar */
        .dpTable {
        	font-family: TH SarabunPSK;
        	font-size: 18px;
        	text-align: center;
        	color: #505050;
        	background-color: #ece9d8;
        	border: 1px solid #AAAAAA;
          width: 200px;
        	}

        /* a table row that holds date numbers (either blank or 1-31) */
        .dpTR {
        	}

        /* the top table row that holds the month, year, and forward/backward buttons */
        .dpTitleTR {
        	}

        /* the second table row, that holds the names of days of the week (Mo, Tu, We, etc.) */
        .dpDayTR {
        	}

        /* the bottom table row, that has the "This Month" and "Close" buttons */
        .dpTodayButtonTR {
        	}

        /* a table cell that holds a date number (either blank or 1-31) */
        .dpTD {
        	border: 1px solid #ece9d8;
        	}

        /* a table cell that holds a highlighted day (usually either today's date or the current date field value) */
        .dpDayHighlightTD {
        	background-color: #CCCCCC;
        	border: 1px solid #AAAAAA;
        	}

        /* the date number table cell that the mouse pointer is currently over (you can use contrasting colors to make it apparent which cell is being hovered over) */
        .dpTDHover {
        	background-color: #aca998;
        	border: 1px solid #888888;
        	cursor: pointer;
        	color: red;
        	}

        /* the table cell that holds the name of the month and the year */
        .dpTitleTD {
        	}

        /* a table cell that holds one of the forward/backward buttons */
        .dpButtonTD {
        	}

        /* the table cell that holds the "This Month" or "Close" button at the bottom */
        .dpTodayButtonTD {
        	}

        /* a table cell that holds the names of days of the week (Mo, Tu, We, etc.) */
        .dpDayTD {
        	background-color: #CCCCCC;
        	border: 1px solid #AAAAAA;
        	color: white;
        	}

        /* additional style information for the text that indicates the month and year */
        .dpTitleText {
        	font-size: 18px;
        	color: gray;
        	font-weight: bold;
        	}

        /* additional style information for the cell that holds a highlighted day (usually either today's date or the current date field value) */
        .dpDayHighlight {
        	color: 4060ff;
        	font-weight: bold;
        	}

        /* the forward/backward buttons at the top */
        .dpButton {
        	font-family: TH SarabunPSK;
        	font-size: 18px;
        	color: gray;
        	background: #d8e8ff;
        	font-weight: bold;
        	padding: 0px;
        	}

        /* the "This Month" and "Close" buttons at the bottom */
        .dpTodayButton {
        	font-family: TH SarabunPSK;
        	font-size: 18px;
        	color: gray;
        	background: #d8e8ff;
        	font-weight: bold;
        	}

        </style>
      </head>


        <style>

            .button { /*ิbutton*/
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 24px;
                font-family: "TH SarabunPSK";
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }


            .button4 {
                background-color: white;
                color: black;
                border: 2px solid #e7e7e7;
            }

            .button4:hover {background-color: #e7e7e7;}
          label{
              font-family: "TH SarabunPSK";
            }

            .button {
              background-color: #838B83; /* Green */
              border: none;
              color: white;
              padding: 10px 100px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 20px;
              font-family: "TH SarabunPSK";
              margin: 4px 2px;
              cursor: pointer;
            }

            .button1 {width: 50%;}
            .button2 {width: 50%;}
            .button3 {width: 100%;}
            .header a{
                font-family: "TH SarabunPSK";
                font-size: 50px;
                color: #696969;
            }
            a{
              font-family: "TH SarabunPSK";
              font-size: 20px;
            }
            label{
              font-family: "TH SarabunPSK";
              font-size: 20px;
            }
            div.abcd{
              font-family: "TH SarabunPSK";
              font-size: 20px;
            }font{
              font-family: "TH SarabunPSK";

            }
            .data {
              font-family: "TH SarabunPSK";
              font-size: 20px;
            }
            html{
                padding:0px;
                margin:0px;
            }
            div#map_canvas{
                margin:auto;
                width:800px;
                height:550px;
                overflow:hidden;
                font-family: "TH SarabunPSK";
            }div.transbox
              {
            		color: #FFFFFF;
              }link{
              	color: #FFFFFF;
              }
              div.box
              {

              opacity:0.8;
              }.form-control{
                font-family: "TH SarabunPSK";
                font-size: 20px;

              }div .tel{
                font-family: "TH SarabunPSK";
                font-size: 30px;
              }h2{
                font-family: "TH SarabunPSK";
                font-size: 45px;
              }h4{
                font-family: "TH SarabunPSK";
                font-size: 30px;
              }
            </style><body>

        <nav class="navbar navbar-inverse">
          <div class="container-fluid">

            <ul class="nav navbar-nav navbar-center">
              <li><a href="regis.php"><span class="glyphicon glyphicon-user"></span>สมัครสมาชิก</a></li>
              <li><a href="form_login.php"><span class="glyphicon glyphicon-log-in"></span>ลงชื่อเข้าใช้</a></li>
              <form class="navbar-form navbar-left" method="post" action="search_product.php">
              <div class="form-group">
                <input type="text" name="search"class="form-control" placeholder="ค้นหา เช่น (ตู้จดหมาย,ประตูด้านนอก)">
              </div>
              <button type="submit" class="btn btn-default">ค้นหา</button>

            </form>
            </ul>
            <?php
        	  include ("testdb.php");
        	  $strSQL = mysqli_query($mysqli,"SELECT * FROM customer WHERE identification_No='".$_SESSION['IdNo']."'");
        	  $objResult = mysqli_fetch_array($strSQL);


        	  ?>
        		<div align="right" class="transbox">

                  ชื่อผู้ใช้ :
                  <?php echo($objResult['customer_Name']);?>
                  <?php //session_destroy();?>
                  <strong><a href="logout.php">Log out</a></strong>

        	</div>
          </div>
        </nav>


        </body>





        <body id="top">
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- Top Background Image Wrapper -->
        <div class="" style="background-color:#CCCCFF;">
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <header id="header" class="clear">
            <div class="header">
              <a class="navbar-brand" href="#">บ้านสุรพล สแตนเลส</a>
            </div>
            <!-- ################################################################################################ -->

            <div class="relative row2">

            <nav id="mainav" class="fl_right" color="red">
              <ul class="clear">
                <li class="active"><a href="index1.php">หน้าหลัก</a></li>
                <li><a href="HT_order.php">วิธีการสั่งซื้อ</a></li>
                <li><a href="HT_payment.php">วิธีการชำระเงิน</a></li>
                <li><a href="map.php">แผนที่ร้าน</a></li>
                <li><a href="contactcus.php">ติดต่อเรา</a></li>
              </ul>
            </nav>
            </div>
            <!-- ################################################################################################ -->
          </header>


          <body>
            <form name="confirm" method="post" action="">
                <?php

                $product_name=$_POST["PD_Name"];
                $total_price= $_POST["totalprice1"];
                $size=  $_POST["size"];
                $amount= $_POST["am"];
                $cus_Name = $_POST["name"];
                $tel= $_POST["tel"];
                $landmark = $_POST["aa"];

                 ?>

<center><div class="container">
            <h2> ยืนยันการสั่งซื้อ </h2>
              <h4>สินค้า : <?=$product_name;?> <br></h4>
              <h4>ราคารวม : <?=$total_price;?> บาท <br></h4>
              <h4>ขนาด : <?=$size;?> ตารางเมตร<br></h4>
              <h4>จำนวน : <?=$amount;?> ชิ้น<br></h4>
              <h4>ชื่อ-สกุล : <?=$cus_Name;?> <br></h4>
              <h4>เบอร์โทรศัพท์ : <?=$tel;?> <br></h4>
              <h4>จุดสังเกต : <?=$landmark;?> <br></h4>
              <h2> โปรดระบุวันที่สำหรับดูพื้นที่จริง </h2>
              <div class="form-group">
                  			<font face = "MS Sans Serif"><input type="text" class="form-control" id="date" name="date" placeholder="วันที่ลงพื้นที่"></font>
                        <a href="javascript:displayDatePicker('date')">
                        <img border="0" src="img/formcal.gif" width="30" height="30"></a>
              </div>
              <input type="submit" class="button2"name="button" id="button" value="ยินยันการสั่งซื้อ" />
</div>
</center>







          </body>




          <div class="wrapper row4">
            <footer id="footer" class="clear">
              <!-- ################################################################################################ -->
              <center><div class="one_quarter first">
                <ul class="w3-ul">
                <li class="w3-xxxlarge"><i class="fa fa-home"></i> </li>
              </ul>

              </div>
              <div class="one_quarter">

                <address class="btmspace-15">
                บ้านสุรพล สแตนเลส<br>
                24/53  &amp; หมู่ 1<br>

                </address>

              </div>
              <div class="one_quarter">

                <address class="btmspace-15">
                  ต.บางม่วง อ.ตะกั่วป่า<br>
                  จ.พังงา 82110

                </address>

              </div>
              <div class="one_quarter">
                <ul class="nospace">
                  <li class="btmspace-10"><span class="fa fa-phone"></span> 081-326-6568</li>
                  <li><span class="fa fa-envelope-o"></span> suraphol@email.com</li>
                </ul>
              </div>
          </center>
              <!-- ################################################################################################ -->
            </footer>
          </div>

          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->

          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
          <!-- JAVASCRIPTS -->
          <script src="layout/scripts/jquery.min.js"></script>
          <script src="layout/scripts/jquery.backtotop.js"></script>
          <script src="layout/scripts/jquery.mobilemenu.js"></script>
          <!-- IE9 Placeholder Support -->
          <script src="layout/scripts/jquery.placeholder.min.js"></script>
          <!-- / IE9 Placeholder Support -->
          <!-- Homepage specific -->
          <script src="layout/scripts/jquery.flexslider-min.js"></script>






          </html>
<?php }?>
