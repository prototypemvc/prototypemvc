<h1>Welcome</h1>
<hr />
<p>Hello, welcome from the welcome controller!</p>
<p>This content can be changed in /modules/welcome/view/welcome.php</p>

<?php
	if(!empty($data)) {
		echo $data['var'];
	}
?>