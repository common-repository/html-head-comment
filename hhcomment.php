<?php
/*
Plugin Name: HTML HEAD Comment
Plugin URI: http://www.kauczu.az.pl/html-head-comment
Description: With this simple plugin you can add - in easy way - your HTML comment to all pages generated by Wordpress. For example you can put your signature, or site revision number, etc. Comment will be located in &lt;head&gt; section.
Version: 1.0
Author: Karol Kauczu Karcz
Author URI: http://www.kauczu.az.pl
*/

function h_h_comment()
{

	echo "<!--\n";
        echo $comment = get_option("commentValue");
	echo "\n-->\n";
}

function h_h_commentAdminMenu()
{
	add_options_page("HTML HEAD Comment", "HTML HEAD Comment", "administrator", "h_h_cOptions", "h_h_commentOptionsPage");
}

function h_h_commentOptionsPage()
{
	$commentData = get_option("commentValue");

	if($_POST["hidSubmit"] == 'Y')
	{
		$commentData = $_POST["default_comment"];

		update_option("commentValue", $commentData);

		echo "<div class=\"updated\"><p>Your HTML HEAD comment has been updated.</p></div>\n";
	}
	

	echo "<div class=\"wrap\">";
	echo "	<h3>HTML HEAD Comment</h3>";
	echo "	<form name=\"form1\" method=\"post\" action=\"\">";
	echo "		<input type=\"hidden\" name=\"hidSubmit\" value=\"Y\" />";
	echo "		With this simple plugin you can add - in easy way - your HTML comment to all pages generated by Wordpress. For example you can put your signature, or site revision number, etc. Comment will be located in &lt;head&gt; section.<hr/>";
	echo "		<div id=\"poststuff\" class=\"metabox-holder\">";
	echo "			<div id=\"normal-sortables\" class=\"meta-box-sortables\">";
	echo "				<div class=\"postbox \">";
	echo "					<div class=\"handlediv\">";
	echo "						<br/>";
	echo "					</div>";
	echo "					<h3 class=\"hndle\" title=<span>Type here your text you whish to be in comment:</span></h3>";
	echo "					<div class=\"inside\" style=\"display:block;\">";
	echo "						<textarea name=\"default_comment\" style=\"width: 100%; height: 100px;\">" . $commentData . "</textarea></p>";
	echo "						<p><strong>Note: Do not use special characters because it can cause error in output!</strong></p>";
	echo "					</div>";
	echo "				</div>";
	echo "			</div>";
	echo "		</div>";	
	echo "		<p class=\"submit\">";
	echo "			<input type=\"submit\" name=\"Submit\" value=\"Update\"/>";
	echo "		</p>";
	echo "	</form>";
	echo "</div>";

}
add_option("commentValue", "");
add_action("admin_menu", "h_h_commentAdminMenu");
add_action('wp_head', 'h_h_comment');

?>