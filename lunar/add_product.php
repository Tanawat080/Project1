<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>payment</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6"> <br />
      <h4 align="center"> ชำระเงิน </h4>
      <hr />
      <form action="add_product_db.php" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อ</p>
            <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อ" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ที่อยู่ </p>
            <textarea name="p_detail" class="form-control"  rows="3"  required placeholder="ที่อยู่"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3">
            <p> เบอร์โทร </p>
            <input type="text"  name="p_tel" class="form-control" required placeholder="เบอร์โทร" />
          </div>
          <div class="col-sm-8 info">
            <p> ภาพสลิป </p>
            <input type="file" name="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" name="btnadd"> UPLOAD </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<p align="center"> ร้าน สุรพล สแตนเลส  </p>
</body>
</html>