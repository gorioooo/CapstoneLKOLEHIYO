<?php
if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $filePath = 'uploads/' . $fileName;

    if (file_exists($filePath)) {
        echo "<h2>Preview of Excel File: $fileName</h2>";

        require_once 'vendor/autoload.php'; // You may need to install a library like PhpSpreadsheet

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

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
    } else {
        echo "<h2>Error: File not found.</h2>";
    }
} else {
    echo "<h2>Error: File not specified.</h2>";
}
?>
