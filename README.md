# Blacklist Website
CPSC 349 Project 1 by The Boys: Website to blackmail people and pay ransoms!

Members:
<ul>
	<li>Nathaniel Richards nathrich23@csu.fullerton.edu</li>
	<li>Matthew Nguyen nmatthew45@csu.fullerton.edu</li>
	<li>Yafu Deng yafu123@csu.fullerton.edu</li>
	<li>David Lee 626davidlee@csu.fullerton.edu</li>
</ul>

<h1>How to get our website running</h1>  
<ol>
<li>Download our repo here: https://github.com/nathrichCSUF/BlacklistWebsite</li>
<li>Move /BlacklistWebsite to your web server's /htdocs folder.</li>
<li>Start up your web server & MySQL (We are using XAMPP & phpMyAdmin).</li>
<li>Create a database called "blacklistwebsite" and use it.</li>
     MySQL commands:
     <ol>
       <li>"CREATE DATABASE blacklistwebsite;"</li>
       <li>"use blacklistwebsite;"</li>
     </ol>
<li>Create two tables, account & blackmail.</li>
		 MySQL commands:
		  <ol>
		    <li>"CREATE TABLE account (userID int(5) PRIMARY KEY, username varchar(10), password varchar(10));"</li>
		    <li>"CREATE TABLE blackmail (postid INT(4) PRIMARY KEY, title VARCHAR(100), description VARCHAR(470),
		      demandlist VARCHAR(470), image VARCHAR(400), ispaid BOOLEAN, likecount INT(11), dislikecount INT(11),
		      userid INT(5), FOREIGN KEY (userid) REFERENCES account(userid));"</li>
		  </ol>

<li>Create a user.</li>
	<ol>
		<li>Go to "Privileges"</li>
		<li>select "Add user account"</li>
    <li>for "User name:" enter "bl_user"</li>
		<li>for "Password:" enter "TheBoys123!"</li>
    <li>retype password</li>
		<li>hit the "Check all" box for "Global Privileges"</li>
    <li>hit "Go"</li>
	</ol>
</ol>

<br>

<h1>Sample Usage Scenario</h1>
	<ol>Creating an account
		<li>From index.php, click "Create Account".</li>
		<li>Enter a username and Password.</li>
		<li>Click "Submit".</li>
		<li>Click "Return to homepage".</li>
	</ol>
	<ol>Creating a blackmail
		<li>From index.php, click "Create a Blackmail".</li>
		<li>Enter login credentials. Click "Submit".</li>
		<li>Enter a title, demands, description, image URL.</li>
		<li>Click "Submit".</li>
		<li>Click "Return to homepage".</li>
		<li>The created blackmail should show up on the homepage.</li>
	</ol>
	<ol>View your blackmails
		<li>From index.php, click "View your Blackmails".</li>
		<li>Enter login credentials. Click "Submit".</li>
		<li>View your blackmails until you get bored.</li>
		<li>Click "Return to homepage".</li>
	</ol>
	<ol>Pay a ransom
		<li>From index.php, click "Pay Ransom" for a blackmail.</li>
	</ol>
