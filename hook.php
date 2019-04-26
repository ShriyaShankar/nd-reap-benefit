<?php
        if($_GET['auth']==='9058af53d965f7668a83355ea1c1d636bc230deb9c1c9cf2a50da562f688c7b0' && $_GET['source']=='GitHub') {
                //echo shell_exec('/usr/bin/git pull 2>&1');    //For debug purposes
                // authenticated

        // The commands
        $commands = array(
        'echo $PWD',
        'whoami',
        'git pull',
        'git status'
        );
        // Run the commands for output
        	$output = '';
        	foreach($commands AS $command){
        		// Run it
        		$tmp = shell_exec($command);
        		// Output
        		$output .= "<span style=\"color: #D5575C;\">\$</span> <span style=\"color: #424969;\">{$command}\n</span>";
        		$output .= htmlentities(trim($tmp)) . "\n";
        	}
        }

        else {
                header("Location: https://rb.snpranav.com/");
                die();
        }
?>

<!DOCTYPE HTML>
 <html lang="en-US">
 <head>
        <meta charset="UTF-8">
        <title>Git Deploy</title>
  <meta name="robots" content="noindex, nofollow">
 </head>
 <body style="background-color: #FFF; font-weight: bold; padding: 0 10px;">

<img src="https://res.cloudinary.com/snpranav/image/upload/signature-name.gif">
 <pre>
<?php echo $output; ?>
 </pre>
      <br>
      <a href="/" id="button">Go to Homepage</a>

      <style>
          #button {
              background-color: #D5575C;
              color: white;
              border: 2px solid #D5575C;
              border-radius: 12px;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
          }

          #button:hover {
              background-color: white;
              color: black
          }
      </style>
</body>
</html>
