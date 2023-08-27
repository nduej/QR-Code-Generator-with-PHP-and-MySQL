<?php
require_once 'conn.php';
require_once 'phpqrcode/qrlib.php';


$path = 'images/';
$qrcode = $path . time() . ".png";
$qrimage = time() . ".png";

if (isset($_REQUEST['sbt-btn'])) {
    $qrtext = $_REQUEST['qrtext'];
    $qrimage = time() . ".png"; // Move this line here

    // Prepare and execute the query using PDO
    $qrtext = $_REQUEST['qrtext'];
    $query = mysqli_query($conn, "INSERT INTO qrcode SET qrtext='$qrtext', qrimage='$qrimage'");

    if ($query) {
        ?>
        <script>
            alert("Data saved successfully");
        </script>
        <?php
    }
}



QRcode::png($qrtext, $qrcode, 'H', 4, 4);
echo "<img src='" . $qrcode . "'>";