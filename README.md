# Blacklist Website
CPSC 349 Project 1 by The Boys: Website to blackmail people and pay ransoms!

Members:
<ul>
	<li>Nathaniel Richards nathrich23@csu.fullerton.edu</li>
	<li>Matthew Nguyen nmatthew45@csu.fullerton.edu</li>
	<li>Yafu Deng yafu123@csu.fullerton.edu</li>
	<li>David Lee 626davidlee@csu.fullerton.edu</li>
</ul>

How to get our website running:  
<ol>
<li>Download our repo here: https://github.com/nathrichCSUF/BlacklistWebsite</li>
<li>Move /BlacklistWebsite to your web server's /htdocs folder.</li>
<li>Start up your web server & MySQL (We are using XAMPP & phpMyAdmin).</li>
<li>Create a database called "blacklistwebsite" and use it.</li>
        MySQL commands: "CREATE DATABASE blacklistwebsite;"
                        "use blacklistwebsite;"

<li>Create two tables, account & blackmail.</li>
        MySQL commands: "CREATE TABLE account (
                          userID int(5) PRIMARY KEY,
                          username varchar(10),
                          password varchar(10)
                         );"

                        "CREATE TABLE blackmail (
                          PostId INT(4) PRIMARY KEY,
                          title varchar(100),
                          description varchar(470),
                          demandList varchar(470),
                          image varchar(400),
                          isPaid boolean,
                          LikeCount int(11),
                          DislikeCount int(11),
                          userID int(5),
                          FOREIGN KEY (userID) REFERENCES account(userID)
                        );"
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
<br>
 Sample Usage Scenario
	a. Creating an account
		- From index.php, click "Create Account".
		- Enter a username and Password.
		- Click "Submit".
		- Click "Return to homepage".
	b. Creating a blackmail
		- From index.php, click "Create a Blackmail".
		- Enter login credentials. Click "Submit".
		- Enter a title, demands, description, image URL.
		- Click "Submit"
		- Click "Return to homepage"
		- The created blackmail should show up on the homepage.
	c. View your blackmails
		- From index.php, click "View your Blackmails"
		- Enter login credentials. Click "Submit".
		- View your blackmails until you get bored.
		- Click "Return to homepage"
	d. Pay a ransom
		- From index.php, click "Pay Ransom" for a blackmail.
</ol>
