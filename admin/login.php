<?php

	@session_start();

	include_once('functions/checkbrand.php');

    $phpver = phpversion();
    $phpver = intval(substr(phpversion(), 0, 1));

	if (session_id() != "") {

		if ($phpver >= 5) {

			if (isset($_SESSION['un1fySess']) && isset($_SESSION['un1fyUserid'])) header("Location:./");
			else {

				include_once('functions/createsession.php');

			}

		}
	}
	else $nosess = true;

	@session_write_close();

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex" />
<link rel="shortcut icon" href="./unify-images/icon.png" />
<link rel="apple-touch-icon-precomposed" href="./unify-images/apple-touch-icon-precomposed.png" />
<title>Tutor Negotia</title>

	<script type="text/javascript" src="unify-js/lib/jquery.js"></script>
    <script type="text/javascript" src="unify-js/unify-main.js"></script>

    <link href="css/unify-main.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="un1fyPromptWrap">

        <div id="un1fyLoginWrap" class="un1fyLoginWrap">

           		<h1 class="logo">Tutor Negotia</h1>

            	<?php
					$errors = Array();

					if ($phpver < 5) $errors['php'] = 'Unify requires PHP version 5 or higher. You are running version ' . $phpver . '.';
					if ( isset($nosess) && $nosess ) $errors['session'] = '<strong>Sessions</strong> are disabled. Unify requires sessions.';

					if (!empty($errors)) :
				?>

                <h2>Oops! We need to fix some configuration errors before proceeding:</h2>

                <ul id="un1fyLoginConfig" class="un1fyLoginConfig clearfix">

                	<?php foreach ($errors as $key => $error) : ?>

                        <li>

                            <a href="<?php
								if( $key == 'php') echo 'http://unify.desk.com/customer/portal/articles/410557-server-settings';
								if( $key == 'session') echo 'http://unify.desk.com/customer/portal/articles/410557-server-settings';
								?>"><?php echo $error; ?><span>learn more &raquo;</span></a>

                        </li>

                    <?php endforeach; ?>

                </ul>

                <p><a id="un1fyConfigRetry" href="javascript:">Retry</a></p>

				<?php else : ?>

                <div id="un1fyAppInfo" class="un1fyAppInfo">
                     <p>
                    Copyright Tutor Negotia 2017<br />
                    Editor de Contenido</p>
                    <p class="un1fyTopBorder">Desarrollado por <a href="http://www.estudiosherpa.com">SHERPA Estudio</a>.</p>
                </div>
                <div id="un1fyLoginCont" class="un1fyLoginCont">
                    <form id="un1fyLoginForm" method="post" action="./functions/login.php" target="un1fyLoginIframe">

                        <fieldset>
                            <legend>Login</legend>
                            <ol>
                                <li id="un1fyUsername"><label>Username</label><br />
                                <input class="un1fyInput" name="un1fyUsername" type="text" tabindex="1" /><p class="error">Required</p></li>
                                <li id="un1fyPassword"><label>Password</label><br />
                                <input class="un1fyInput" name="un1fyPassword" type="password" tabindex="2" /><p class="error">Required</p></li>
                                <li id="un1fyEnter" class="clearfix"><button id="un1fyLoginBtn" type="submit" class="un1fyLoginBtn" tabindex="3">login</button> <p><a id="forgotPass" href="javascript:">Forgot your password?</a></p><p class="error invalid"></p></li>
                            </ol>
                            <div id="forgot" class="forgotLogin clearfix">
                            	<p>Submit your username to receive an<br/>email with your new password.</p>
                                <button id="un1fySubmitBtn" type="submit" class="un1fySubmitBtn" tabindex="3">submit</button><p class="clearfix"><a id="forgotCancel" href="javascript:">Back to login</a></p>
                                <p class="message"></p>
                            </div>
                        </fieldset>

                    </form>
                </div>

                <?php endif; ?>

        </div>

  	</div>

    <iframe id="un1fyPageSrc" name="un1fyPageSrc" marginheight="0" align="top" frameborder="0" src="../" application="yes"></iframe>

</body>
</html>