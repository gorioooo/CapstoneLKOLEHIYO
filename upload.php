<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade History</title>
</head>
<body>
    <h1>Student Grade History</h1>
    
    <!-- Upload Form -->
    <form action="display_grades.php" method="post" enctype="multipart/form-data">
        <label for="excelFile">Upload Excel File:</label>
        <input type="file" name="excelFile" accept=".xls, .xlsx" required>
        <br>
        <input type="submit" name="submit" value="Upload and Display Grades">
    </form>

    <!-- Uploaded Files History -->
    <h2>Uploaded Files:</h2>
    <?php
        $uploadedFiles = glob('uploads/*.xlsx');
        foreach ($uploadedFiles as $file) {
        $fileName = basename($file);
        echo "<p><a href='view_file.php?file=$fileName' target='_blank'>$fileName</a></p>";
        }
    ?>
</body>
</html>
