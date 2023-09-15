<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"];
  $htmlContent = "<!doctype html>
<html lang="en"> 
 <head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Birthday Surprise</title> 
  <style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #00FF00;
    overflow: hidden;
}

.center {
    text-align: center;
}

button {
    font-size: 20px;
    padding: 10px 20px;
    cursor: pointer;
    box-shadow: 3px 3px 5px #888888;
}

.hidden {
    display: none;
}

#birthdayBox, #surpriseMessage {
    margin-top: 20px;
}

#birthdayBox .neon {
    color: #f06;
    text-shadow: 0 0 10px #f06, 0 0 20px #f06, 0 0 30px #f06, 0 0 40px #f06, 0 0 50px #f06;
    animation: neon 1s infinite alternate;
}

@keyframes neon {
    0% {
        text-shadow: 0 0 10px #f06, 0 0 20px #f06, 0 0 30px #f06, 0 0 40px #f06, 0 0 50px #f06;
    }
    100% {
        text-shadow: 0 0 20px #f06, 0 0 40px #f06, 0 0 60px #f06, 0 0 80px #f06, 0 0 100px #f06;
    }
}
/* ... previous code ... */
#blessingBox {
    background-color: #FFD700; /* Golden yellow background color */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

#blessingBox p {
    margin: 10px 0;
    font-size: 18px;
    font-weight: bold;
    color: #ff6600; /* Orange text color */
    text-align: center;
}
/* ... previous code ... */  
  </style> 
 </head> 
 <body> 
  <div class="container"> 
   <div class="background"></div> <!-- Your content goes here --> 
  </div> 
  <div id="nameEntry" class="center"> 
   <h2>ARE YOU DHARITRI?</h2> <button id="yesButton">Yes</button> <button id="noButton">No</button> 
  </div> 
  <div id="birthdayBox" class="hidden center"> 
   <h1 class="neon">HAPPY BIRTHDAY $name!</h1> <button id="surpriseButton">Surprise</button> 
  </div> <!-- ... previous code ... --> 
  <div id="surpriseMessage" class="hidden center"> 
   <div id="blessingBox"> 
    <p>May God bless you,be happy in your life </p> 
    <p>I wish that you succeed in your life </p> 
    <p>always smile, my friend...</p> 
    <p>Smile, please!</p> 
   </div> 
  </div> <!-- ... previous code ... --> 
  <script>
    const nameEntry = document.getElementById('nameEntry');
const birthdayBox = document.getElementById('birthdayBox');
const surpriseMessage = document.getElementById('surpriseMessage');
const yesButton = document.getElementById('yesButton');
const noButton = document.getElementById('noButton');
const surpriseButton = document.getElementById('surpriseButton');

yesButton.addEventListener('click', () => {
    nameEntry.style.display = 'none';
    birthdayBox.style.display = 'block';
});

noButton.addEventListener('click', () => {
    alert('Please come back when you are Dharitri!');
});

surpriseButton.addEventListener('click', () => {
    birthdayBox.style.display = 'none';
    surpriseMessage.style.display = 'block';
});  
  </script> 
 </body>
</html> 
 </body>
</html> ";

  // Generate a unique filename
  $filename = "hello_page_" . time() . ".html";

  // Save the HTML content to a file
  file_put_contents($filename, $htmlContent);

  // Set headers to force download
  header("Content-Type: application/octet-stream");
  header("Content-Transfer-Encoding: Binary");
  header("Content-disposition: attachment; filename=\"$filename\"");
  readfile($filename);

  // Delete the temporary HTML file
  unlink($filename);
}
?>
