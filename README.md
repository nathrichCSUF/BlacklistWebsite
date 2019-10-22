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
Step 1. Download our repo here: https://github.com/nathrichCSUF/BlacklistWebsite
Step 2. Move /BlacklistWebsite to your web server's /htdocs folder
Step 3. Start up your web server & MySQL (We are using XAMPP & phpMyAdmin)
Step 4. Create a database called "blacklistwebsite" and use it.
        MySQL commands: "CREATE DATABASE blacklistwebsite;"
                        "use blacklistwebsite;"
STEP 5. Create two tables, account & blackmail.
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
Step 6. Create a user. Go to "Privileges", select "Add user account",
        for "User name:" enter "bl_user", for "Password:" enter "TheBoys123!",
        retype password, hit the "Check all" box for "Global Privileges",
        hit "Go".
