
<h2>Enter New Genre Information</h2>
<!-- Alexander Puchalski, arp248, IT202-project, 2026-02-10 -->

<form name="newgenre" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Genre ID:</td>
           <td><input type="text" name="genreID" size="4"></td>
       </tr>
       <tr>
           <td>Genre Code:</td>
           <td><input type="text" name="genreCode" size="20"></td>
       </tr>
       <tr>
           <td>Genre Name:</td>
           <td><input type="text" name="genreName" size="20"></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Genre">
   <input type="hidden" name="content" value="addgenre">
</form>