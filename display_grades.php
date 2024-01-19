<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Handle the uploaded Excel file
    $targetDir = "upload/";
    $targetFile = $targetDir . basename(str_replace(" ", "_", $_FILES["excelFile"]["name"]));
    
    if (move_uploaded_file($_FILES["excelFile"]["tmp_name"], $targetFile)) {
        // Display a success message
        echo "<h2>File uploaded successfully!</h2>";

        // Display grades from the uploaded file
        displayGrades($targetFile);
    } else {
        echo "<h2>Error uploading file. Please try again.</h2>";
    }
} else {
    header("Location: index.html");
    exit();
}

function displayGrades($filePath) {
    require_once 'vendor/autoload.php'; // You may need to install a library like PhpSpreadsheet

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();

    echo "<h2>Student Grade History</h2>";

    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>ID Number</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Semester</th>
                <th>Quarter</th>
            </tr>";

    foreach ($worksheet->getRowIterator() as $row) {
        $data = $row->getCellIterator()->toArray();
        echo "<tr><td>" . implode("</td><td>", $data) . "</td></tr>";
    }

    echo "</table>";
}
?>
