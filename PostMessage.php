<!-- Chapter Six Tutorial -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale=1.0">
	<title> Message Board </title>
</head>
<body>
	<?php
		if(isset($_POST["submit"])) {
			$Subject = stripslashes($_POST["subject"]);
			$Name = stripslashes($_POST["name"]);
			$Message = stripslashes($_POST["message"]);

			// Replace any '~' characters with '-'
			$Subject = str_replace("~", "-", $Subject);
			$Name = str_replace("~", "-", $Name);
			$Message = str_replace("~", "-", $Message);

			// Create a variable that serves a single line of data for us to save to the file
			$MessageRecord = "$Subject~$Name~$Message\n";

			// Open up the file messages.txt and save the file data to a variable
			$MessageFile = fopen("MessageBoard/messages.txt", "ab");

			// Check to see if there are issues accessing that file. If so, then handle the error. If not, then post the message.

			if($MessageFile === FALSE) {
				echo "There was an error saving your message!\n";
			}
			else {
				fWrite($MessageFile, $MessageRecord);
				fclose($MessageFile);
				echo "Your message has been saved! \n";
			}
		}
	?>

	<h1> Post New Message </h1>
	<hr/>
	<form action="PostMessage.php" method="POST"> 
		<label style="font-weight:bold;" for="subject"> Subject: </label>
		<input type="text" name="subject"/>
		<label style="font-weight:bold;" for="name"> Name: </label>
		<input type="text" name="name" /> <br/>
		<textarea name="message" rows="6" cols="80"></textarea><br/>
		<input type="submit" name="submit" value="Post Message" />
		<input type="reset" name="reset" value="Reset Form"/>
	</form>
	<hr/>
	<p><a href="MessageBoard.php"> View Message </a>
</body>
</html>