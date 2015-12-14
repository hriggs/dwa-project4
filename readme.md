# DWA-15 P4: Final Project / PuzzleLit

## Live URL
<http://p4.hriggs.me>

## Description
PuzzleLit is a site where users can solve logic puzzles. If they register 
and log in their stats (time started, time ended, total time spent, total moves, 
and attempt number) will be recorded. Otherwise, they can play anonymously and their 
stats will not be stored. Logged in users have the ability to update their profile 
information, and also sort their stats. For example, they can sort by attempt number, 
number of moves, or by total time spent on a puzzle. They can also delete their stats 
for any puzzle. Users can also see the top scores of each puzzle sorted by either 
fastest time or fewest number of moves. Finally, there is a list of all puzzles which 
includes details such as a description, picture, and directions for each puzzle. Not 
yet built puzzles are also listed on this page under a "Coming Soon!" heading. 

## Demo
<https://TBD.com>
* Again, so sorry for the white noise in the background of the demo! 

## Details for Teaching Team
### Database Tables in Addition to Users Table
* puzzles
* gamesessions
* gamesession_user

### CRUD Operations
* Create: gamesessions and gamesession_user data created when puzzle is solved by logged in user
* Read: data from puzzles, gamesessions, and user all read and displayed (and sorted) on screen
* Update: user profile data can be updated on user profile and change password pages
* Delete: gamesessions and gamesession_user data can be deleted from user's stats page

## Other
* All pages with forms use server-side validation (and HTML validation when possible too)
* JavaScript used for logic puzzles, but PHP used for everything else (all in Laravel)
* All backgrounds, textures, puzzle piece images, and puzzle images created and/or editted using GIMP image editting software

## Outside Code
### Packages
* Faker (user data) package: <https://github.com/fzaninotto/Faker>
* Bootstrap: <http://getbootstrap.com/>
* Carbon PHP extension: <http://carbon.nesbot.com/>

### List of Puzzles Page Images
* The River Crossing Puzzle <https://commons.wikimedia.org/wiki/File:River_rafting.JPG>
* The Endangered Miners <https://commons.wikimedia.org/wiki/File:Gua_Tempurung.jpg>
* Fear of the Stew Pot <https://commons.wikimedia.org/wiki/File:Jungle_forest_from_above.jpg>
* The Tower of Hanoi information and image: <https://en.wikipedia.org/wiki/Tower_of_Hanoi>

### River Crossing Puzzle Images
* <http://www.freepik.com/free-photos-vectors/river>
* <http://www.freepik.com/free-vector/cartoon-wild-animals-vector-pack_740905.htm>
* <http://pixabay.com/en/sack-rope-full-cartoon-brown-306758/>
* <http://all-free-download.com/free-vector/download/cabbage_clip_art_13716.html>
* <http://www.freepik.com/index.php?goto=2&k=people&order=2&vars=8>

### Endangered Miners Puzzle Images
* Lantern <http://findicons.com/icon/136202/kerosene_lantern?id=136215>
* Bandage icons <http://www.flaticon.com/free-icons/bandage_24151>
* Pickaxe and axe <http://www.iconarchive.com/tag/pickaxe>