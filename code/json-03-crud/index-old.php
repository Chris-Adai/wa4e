<?php
require_once "pdo.php";
session_start();
?>
<html>
<head></head><body>
<p><b>Original non-JSON index.php</b></p>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
echo('<table border="1"><tbody>'."\n");
$stmt = $pdo->query("SELECT title, plays, rating, id FROM tracks");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['title']));
    echo("</td><td>");
    echo($row['plays']);
    echo("</td><td>");
    echo($row['rating']);
    echo("</td><td>");
    echo('<a href="edit.php?id='.htmlentities($row['id']).'">Edit</a> / ');
    echo('<a href="delete.php?id='.htmlentities($row['id']).'">Delete</a>');
    echo("\n</form>\n");
    echo("</td></tr>\n");
}
?>
</tbody>
</table>
<a href="add.php">Add New</a>