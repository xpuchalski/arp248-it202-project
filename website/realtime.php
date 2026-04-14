<?php
ob_start();
include("individualbooks.php");
include("bookgenre.php");

$totalGenres = genre::getTotalGenres();
$totalBooks = book::getTotalBooks();
$listpricetotal = book::getTotalListPrice();
$buypricetotal = book::getTotalBuyPrice();

$doc = new DOMDocument("1.0");

$inventoryElement = $doc->createElement("inventory");
$inventoryElement = $doc->appendChild($inventoryElement);

$genreelement = $doc->createElement("categories", $totalGenres);
$genreelement = $inventoryElement->appendChild($genreelement);

$booksElement = $doc->createElement("items", $totalBooks);
$booksElement = $inventoryElement->appendChild($booksElement);

$listpricetotalElement = $doc->createElement("listpricetotal", $listpricetotal);
$listpricetotalElement = $inventoryElement->appendChild($listpricetotalElement);

$buypricetotalElement = $doc->createElement("buypricetotal", $buypricetotal);
$buypricetotalElement = $inventoryElement->appendChild($buypricetotalElement);

$output = $doc->saveXML();
header("Content-type: application/xml");
ob_end_clean();
echo $output;
?>
