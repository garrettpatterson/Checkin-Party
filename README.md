#Checkin-Party Readme

Checkin-Party is a small php mobile-optimized app to create an interactive party atmosphere among your guests using QR codes.  Its intended for short-term (hours not days), captive audiences with the goal of incentivizing your guests to *do* something, whether it's move around, learn more about targeted items etc...  It is flexible to be used for full smartphone use, manned-stations with paper "passes", or mixed.

Possible uses could be:
*Office party
*Christmas Party
*Open house

Other projects used:
jQuery Mobile

##Files
*charts.php
**I should remove this
*checkin.php
**checkin handler for venue.php
*index.php
**home/splash page for use before and during the party
**has triggers for 'pre-register' as well as 'no-phone' users
*newuser.php
**new user signup handler for start.php
*nophone.php
**Creates individualized QR code/party pass for participants
*papercheckin.php
**Creates QR codes for dummy users set up in the DB for paper-pass use
*prizes.php
** contains the php functions and logic for determinig prize winners
*qr.php
** has qr codes for each page and venue/station
*start.php
** main registration entry point
*venue.php
** The page for actually checkin in
*venuecheckin.php
**page for manual checkin of paper pass users
*venues.php
** full list of all your venues/stations and relevant information

##Setup
1. Fork/Download all files
2. Make sure sqlite3 is installed for php and local tools
** I used PDO so it would be a snap to switch to MySQL
** I checked in a blank sqlite db
*** If you're using this make sure folder and file permissions are setup on your server to be able to write to the DB
3. Enter venue/station information into the "venue" table
4. Within prizes.php configure your prize parameters
** maxrandom on line 10
** probability of getting a random prize on line 16
** limit to number of random prizes someone can receive
** maxfinish on line 32
5. The "app" itself is ready, get some interns to print out some posters for each station and party on!

##Checking In
The app is designed for full autonomy of your guests, other than having someone to hand out prizes as they are earned.  People can just start scanning at any station, if they're not signed up it will direct them to the signup page, then redirect them back to where they were trying to check in.  At each station all someone needs to do is just scan the new QR code.  1st party cookies should be enabled, I haven't seen any issues so far with major phones/browsers handling this.

###Paper Passes
If you get the dreaded "what if people don't have a smartphone and/or QR code reader" and can't just say "I don't care about people from 2005", there is an alternative solution.  You can use both at the same party, or I can see a scenario when you'll just make everyone use a paper pass.
1. Create as many blank entries in the user table as you expect to need passes for
2. Print out QR code passes for each, hand them out to your guests.
3. One person will need to be at each of your stations with their own smartphone, this becomes the checker-inner/Manual sCanner/ManScan.
## On the first scan the attending person will need to select the station, and enter the global admin password.
## This information will be remembed each subsequent time on that phone, so as long as they stay put all they will need to enter is people's emails if they so desire. *emails aren't necessary* but its nice for tracking...
## Prize info will pop on the attendants phone, and they will hand prizes to the person with the pass
4. Either people will preregister and print thier own pass OR, the first time they get checked in, their email can be entered and it will be saved for subsequent check ins.

##Prizes
The whole point is to incentivize people to go around and visit each of your stations you set up.  Whether there is information at each you want them to know, activities they need to do at each etc...  Our set up was 5 $5 Starbucks cards at each station given out on a random basis to people who checked-in, then 25 $5 Starbucks cards to be given to the first 25 people to visit ALL stations.  We also had a grand prize drawing at the end, but did not automate this through the app.

### Types in the DB
1. start - intended for use if you want to give prizes away for the first people to sign up/begin the game.
2. random - for the random prizes each station
3. finish - for those who check in to ALL stations
4. grand - if you want to use this app to give away prizes for a grand prize somehow

### Prizelog
The "prizelog" table logs who received what prizes at stations.  This is used to throttle the amount of prizes you allow each person in prizes.php and keep track of general "eligibility".

#TODO
## Real-time stats page to display during your party
## Prize admin page 
###To validate and track wether or not a prize has been given away
### Validate who has won prizes at each station
## store all config options in text file or DB
## create admin pages to set up the party with stations etc...
