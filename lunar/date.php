<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>date area</title>
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


  </head>
  <body>
  <div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <br>
    <b>
    วันที่ลงพื้นที่
    </b>
    <form action="datedb.php" method="post" accept-charset="utf-8">
    <br/>
<input type="text" name="Date" value="01/01/2017-31/12/2017" placeholder="click" />

<script type="text/javascript">
$('input[name="Date"]').daterangepicker(
{
    locale: {
      format: 'DD/MM/YYYY'
    },
    startDate: '01/01/2017',
    endDate: '31/12/2017'
}, 

function(start, end, label) {
    //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
}
);
</script>
    <button type="submit" name="save" class="btn btn-info"> Save </button>
    </form>
    </div>
    </div>
    </div>
  </body>
</html>