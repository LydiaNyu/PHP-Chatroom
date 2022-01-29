## Introduction
This project aims to create a basic chat room that will support multiple participants simultaneously.

## Course Website
It has been already uploaded to my school website:  
https://i6.cims.nyu.edu/~st3890/webdev/macro09/

## Design:
Basic features: 

HTML & CSS  
A content panel that asks the user to provide a nickname. This panel should include a button that can be used to save the nickname. This panel should be visible when the page loads.  
A content panel that displays the previous chat history, a text box for new chat messages and a button. This panel should be invisible when the page loads.  
Format your page so that it's visually appealing, though you don't need to go too crazy with this.  

Back-end setup.  
Set up a 'data' folder - make sure you have full permissions to read and write to this location.  
Set up a 'config.php' file that contains a path variable that points to this folder.  

Application Logic.  
When the user supplies a nickname the program should check to see if they supplied a valid nickname. For the purpose of the basic program a valid nickname is a string with at least 1 character. If so, the panel can be hidden and the chat window can be shown. Otherwise an error message should appear.   
When the user types in a message and clicks submit / hits enter an AJAX request should be generated to a PHP script - you will need to send the message they typed and their nickname to this script.  
This script should accept this information and validate it. Valid characters include alphabetic (A-Z), numeric (0-9) and a small # of punctuation characters ('!@#$%^&*()"?.,). Any character outside of these should be rejected and removed. You can use string modification methods in PHP to do this.  
Set up another JavaScript function called 'getChatMessages' - this function should initiate an AJAX request to the server and attempt to access the 'messages.txt' file directly (you can use an AJAX request to get the contents of a text file like this - you don't always have to use it with PHP). Use this information to populate the textarea with the previous chat history.  
Set up some kind of callback structure (setTimeout, setInterval) to repeatedly check for new chat messages. You can do this every 1-2 seconds (don't go any faster than this). Hint: use the "no caching" technique we discussed to prevent the browser from caching the results of the AJAX call. You can do this by appending a random number to the GET variable string associated with the AJAX call.  

Advanced Features:  

Name management subsystem:  
Give the user the ability to change their name after the chat room starts up.  
Store the user's name on their computer using localStorage or cookies so they don't need to enter it every time they visit the page.  
If a name can be found when the page loads you can skip directly to the chat room.  
Set up the textarea so that when new data comes in it automatically scrolls to the bottom of the box so the user can see the most recent message. However, if the user is currently scrolling inside of the textarea you should prevent this from happening (otherwise the user's textarea will "jump").  
Have your program support multiple chat rooms - the user can select which chat room they want to use through a drop down menu on the web page. This will most likely require you to have multiple text files to manage each chat room.  
Build in a server-side 'filtering' system that prevent the user from using 'bad' words (pick innocuous words to start, such as 'apple' and 'pear') -- when these words are detected it should force the system to reject the message and the user should be told what happened. Set up these 'banned' words in a text file so that you don't have to hard-code your PHP file with them.  

Log in. 
Clear the contents of any chat room.  
Update the 'banned' word list.  
Keep track of usage logs (who's using the chat room, when they used it, their IP addresses, etc).  
