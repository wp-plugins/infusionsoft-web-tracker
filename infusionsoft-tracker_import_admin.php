<style>
input.infusionWebTrackerInput{
    text-align:right;
}


</style>

<?php 
		if($_POST['infusionsoft_tracker_hidden'] == 'Y') {
			//Form data sent
			$apiKey = $_POST['infusionsoft_tracker_apiKey'];
			$appName = $_POST['infusionsoft_tracker_appName'];
			//Test Connection
			include 'isdk.php';
			// force to download a file #create connection    
			$myApp = new iSDK;
		    
			if ($myApp->connectWithVars($appName, $apiKey, 't')) {
			    
			    update_option('infusionsoft_tracker_appName', $appName);
			    update_option('infusionsoft_tracker_apiKey', $apiKey);
			    
			    $result = $myApp->getWebTrackingServiceTag();
			    
			    update_option('infusionsoft_tracker_scriptTag', $result);
			    
			    ?>
			    <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
			    <?php
			}
			else{
			    ?>
			    <div class="updated"><p><strong><?php _e('Error Connecting - Please Try Again' ); ?></strong></p></div>
			    <?php
			}
			
?>
			
			<?php
		} else {
			//Normal page display
                        
                        $appName = get_option('infusionsoft_tracker_appName');
			$apiKey = get_option('infusionsoft_tracker_apiKey');
			
		}
	?>
<style>
    .panel{
	background: #f6f6f6;
	width: 300px;
	height: 300px;
	display: block;
	float: left;
	border: 2px groove #f6f6f6;
    }
    #about{
	width: 600px;
	
    }
</style>
<div class="wrap">
    <?php    echo "<h2>" . __( 'Infusionsoft Analytics for WordPress', 'infusionsoft_tracker_trdom' ) . "</h2>"; ?>
    <div class="panel" id="apiPanel">
	<h3>Enter Your API Details</h3>		
	<form name="infusionsoft_tracker_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	    <input type="hidden" name="infusionsoft_tracker_hidden" value="Y">
	    
	    <p><?php _e("Infusionsoft Application Name: " ); ?></p>
	    <input class='infusionsoft_tracker' type="text" name="infusionsoft_tracker_appName" value="<?php echo $appName; ?>" size="16"><?php _e(".infusionsoft.com" ); ?>
	    <p><?php _e("Infusionsoft API Key: " ); ?></p>
	    <input class='infusionsoft_trackerInput' type="password" name="infusionsoft_tracker_apiKey" value="<?php echo $apiKey; ?>" size="32"><br />
	    <input type="submit" name="Submit" value="<?php _e('Save', 'infusionsoft_tracker_trdom' ) ?>" />
	
	</form>
    </div>
    <div class="panel" id="video">
	<h3>Need Help?</h3>
    </div>
    <div class="panel" id="about">
	<h3>What is Infusionsoft Analytics?</h3>
	<p>See how many people are visiting your site, what pages they are visiting and for how long - All from within your Infusionsoft application.</p>
	<p>When people opt-in, a complete history of the pages they've visited on your site will be tied to their contact record.</p>
    </div>
    
</div>
	
