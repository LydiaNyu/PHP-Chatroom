<!doctype html>
<html>
  <head>
    <title>Let's Chat!</title>

    <!-- custom styles for this application -->
    <style>
      #messages {
        display: block;
        width: 500px;
        height: 300px;
      }
      .hidden {
        display: none;
      }
      body{background-color: coral;
         font-size: 200%;
         font-family: Fantasy;
         text-align:center;
      }
      #messages{
         margin:auto;
      }

    </style>
  </head>
  <body>
    <h1>Let's Chat!</h1>
    
    <div id = "chatroomOptions">
    Choose Your chat room!!!
    <select id="filter">
        <option value="room1">room 1</option>
        <option value="room2">room 2</option>
        <option value="room3">room 3</option>
      </select>
    </div>
    
    <div id="panel_name">
      Name: <input type="text" id="name">
      <button id="savename">Chat</button>
    </div>

    <div id="panel_chat" class="hidden">
      <textarea id="messages" readonly></textarea>
      <input type="text" id="newmessage">
      <button id="sendmessage">Send Message</button>
      <br>
      <button id="changeName"> Change Your Name</button>
    </div>
    
    <div id="panel_newname" class = "hidden">
      <input type="text" id="newname">
      <button id="newnameset">submit your new Name</button>
    </div>
    <p id ="banned">  </p>
    <p id ="kk">  </p>
    <a href="adminlogin.php">Admin control system</a>
    <!-- bring in the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- custom script for this application -->
    <script>
      // grab some DOM refs
      let panel_name = document.querySelector("#panel_name");
      let panel_chat = document.querySelector("#panel_chat");
      let name = document.querySelector("#name");
      let savename = document.querySelector("#savename");
      let changeName = document.querySelector("#changeName");
      let panel_newname = document.querySelector("#panel_newname");
      let newname = document.querySelector("#newname");
      let newnameset = document.querySelector("#newnameset");
      let initialuser = window.localStorage.getItem('username');
      let filter = document.querySelector("#filter");
      let banned = document.querySelector("#banned");
      console.log(filter);
      window.localStorage.setItem('filter',filter.value);
	  var onmouse = false;
      // when the user clicks on the save name we need to progress to the next phase of the program
      var username;
      if(initialuser && initialuser.length>0){
      // show the chat panel_chat
          panel_chat.classList.remove('hidden');
  
          // hide this panel
          panel_name.classList.add('hidden');
          panel_newname.classList.add('hidden');
      
      }
      changeName.onclick = function(event){
      	panel_chat.classList.remove('hidden');
  
          // hide this panel
          panel_name.classList.add('hidden');
          panel_newname.classList.remove('hidden');
      }
      newnameset.onclick = function(event){
          window.localStorage.setItem('username',newname.value);
          panel_chat.classList.remove('hidden');
  
          // hide this panel
          panel_name.classList.add('hidden');
          panel_newname.classList.add('hidden');
          $.getJSON("https://api.ipify.org?format=json",
                                          function(data) {
           window.localStorage.setItem('ip',data.ip);
           
           
        })
        
         $.ajax({

          type: 'POST',
          url: 'userSaveHis.php',
          data: {
            username: newname.value,
            ip: window.localStorage.getItem('ip')
            
          },
          success: function(data, status) {
             
          },
          error: function(req, data, status) {

          }

        });

        
      }
      savename.onclick = function(event) {

        // grab the name the user entered
        
        username = name.value;
        // make sure it has at least one character in it
        if (username.length > 0) {
          window.localStorage.setItem('username',name.value);
          // show the chat panel_chat
          panel_chat.classList.remove('hidden');
          
          // hide this panel
          panel_name.classList.add('hidden');
          
        }
      }

      let messages = document.querySelector("#messages");
      let newmessage = document.querySelector("#newmessage");
      let sendmessage = document.querySelector("#sendmessage");
      
      // when the user chooses to chat we need to send that data to the server to be stored
      sendmessage.onclick = function(event) {

        // package up this message and send it to the server to be stored for later use
        let msg = newmessage.value;
        $.ajax({

          type: 'POST',
          url: 'savemessage.php',
          data: {
            message: msg,
            nickname: window.localStorage.getItem('username'),
            filter: window.localStorage.getItem('filter')
          },
          success: function(data, status) {
             

            if(data == "ok"){
              scrollLogToBottom();
              
              
            }
            else if(data == "banned"){
              banned.innerHTML = "your message included some banned word!!";
             
            }
            else{
             
            }
          },
          error: function(req, data, status) {

          }

        });

      }


      // function to grab data from the server
      function getData() {
        let roomnum = window.localStorage.getItem('filter');
        // contact the text file and grab its current value
        $.ajax({
          type: 'GET',
          url: 'data/'+roomnum +'.txt?nocache='+Math.random(),
          success: function(data, status) {
            
            if( onmouse != true && messages.value != data){
                scrollLogToBottom();
                
            }
            
            setTimeout( getData, 1000 );
            messages.value = data;
          }
        });


      }
      getData();
      
    function scrollLogToBottom() {
        
        messages.scrollTop = messages.scrollHeight;
    }
    messages.onmouseover= function(event){
    	onmouse = true;
    	
    }
    messages.onmouseout= function(event){
    	onmouse = false;
    	
    }
    filter.onchange = function(event){
    	window.localStorage.setItem('filter',filter.value);
    }


    </script>

  </body>
</html>
