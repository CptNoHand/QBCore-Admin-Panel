<?php
try{
	$database = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
} catch(PDOException $ex)
{
	echo "Could not connect to your database. Please Make sure to Check your credentials in your config file! ".$ex->getMessage();
	die();
}

?>

<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient qb-core">
                </i>
            </div>
                <div>Character Search
                    <div class="page-title-subheading">This page shows all unique characters that have been created. You can click on the character name to view more information about that character!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">All Characters</h4>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Character ID</th>
                                <th>Character Name (Citizen ID)</th>
                                <th>License (Rockstar License)</th>
                                <th>Account Owner</th>
                                <th>Last Connection</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $result = $database->query("SELECT * FROM players");
                            foreach($result as $row)
                            {
                            $json = $row["charinfo"];
                            $charactername = json_decode($json);

                            echo 
                            '<td>'. $row['id'] .'</td>
                            <td><a id="accentcolor" href="characterInfo.php?citizenid=' . $row['citizenid'] . '">'. $charactername->{'firstname'}. ' '.$charactername->{'lastname'}. ' ('. $row['citizenid'].')</td>
                            <td>'. $row['license'] .'</td>
                            <td>'. $row['name'] .'</td>
                            <td>'. $row['last_updated'] .'</td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

