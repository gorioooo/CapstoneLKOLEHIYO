<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Import Excel to MySQL</title>
</head>
<body>
  <from class="" action="" enctype = "multipart/form-data" method="post">
   <input type="files" name="excel" required value="">  
   <button type="submit" name="import">Import</button>
  </form>

    <tr>
       <td>#</td>
       <td>Name</td>
       <td>Age</td>
       <td>Country</td>
    </tr>
    <?php
    $i = 1;
    $rows = mysqli_query($conn, "SELECT * FROM tb_data");
    foreach($rows as $row) :
    ?>
    <tr>
     <td> <?php echo $i++; ?> </td>
     <td> <?php echo $row["name"]; ?> </td>
     <td> <?php echo $row["age"]; ?> </td>
     <td> <?php echo $row["country"]; ?> </td>
    </tr>
    <?php endforeach; ?>
  </table> 

  <?php
  if(isset($_POST["import"])){
    $fileName = $_FILES["excel"]["name"];
    $fileExtention = explode('.', $fileName);
    $fileExtention = strtolower(end($fileExtention));

    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtention;

    $targetDirectory = "uploads/" . $newFileName;
    move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors', 0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpeadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader ad $key => $row){
     $name = $row[0];
     $age = $row[1];
     $country = $row[2];
     mysqli_query($conn, "INSERT INTO tb_data VALUES('', '$name', '$age', '$country')");
    }


    echo
    "
    <script>
    alert('Successfully Import');
    document. location.href = '';
    </script> 
    ";
  ?>
</body>
</html>