<?php
 session_start();
 require_once('../path.php');
$page_title = 'All site users';
$header_title = "All site members";
?>

<?php require_once(HEADER_PATH); ?><br>

<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a>

<section id="members">
    <div class="common">
    	<?php
//$account = find_all_account();
  find_all_account();

/*
echo '<div class="attributes"><table>';
$show_data = "<tr>";
foreach ($account as $key => $value) {
      	$show_data.= "<th>{$key}</th>";
      	      }
      $show_data.= "</tr>";
echo $show_data;

$show_data = "<tr>";
      	foreach ($account as $key => $value) {
      		
      		$show_data.= "<td>{$account[$key]}</td>";
      	}
      	$show_data.= "</tr>";
      	echo $show_data;
      	*/
      	
     
       ?>
   </table>
      </div>
    </div>
</section>





<?php require_once(FOOTER_PATH); ?><br>
