<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Bot</title>
    <link rel="stylesheet" href="css/chatbot.css">
</head>
<body>
        <div class="about"><center>
            
                Welcome
                 <p>Hello I am a Simple Chatbot, my name is INFO BOT. I can provide you with information you would like to know about famous historical places.</p></center>
            </div>
    <div id="container">
        <div id="botscreen">
            <div id="botheader">
                INFO BOT
            </div>

            <div id="Display">
        </div>
            <div id="userQuery">
                <input type="text" name="user_query" id="user_query" autocomplete="OFF" placeholder="Type here for INFO" required>
                <input type="submit" value="Send" id="send" name="send">
            </div>
        </div>
    </div>

    <!--footer-->
    
    <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
        <div class="container text-center">
          <center class="down">Copyright &copy; This Website belongs to <strong><em>Kiran Machiraju, Arfath Shaik, Ankush Singh and Roshin Roychan</em></strong></center>
        </div>
    </footer>
    
    
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
            $("#user_query").on("keyup",function(){

                if($("#user_query").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        // when send button clicked
        $("#send").on("click",function(e){
            $userMessage = $("#user_query").val();
            $appendUserMessage = '<div class="chat usersMessages">'+ $userMessage +'</div>';
            $("#Display").append($appendUserMessage);

            // ajax start
            $.ajax({
                url: "bot.php",
                type: "POST",
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#Display").append($appendBotResponse);
                }
            });
            $("#user_query").val("");
            $("#send").css("display","none");
        });
    </script>
    
<!--    Background effect script-->
    <script>
const colors = ["#3CC157", "#2AA7FF", "#1B1B1B", "#FCBC0F", "#F85F36"];

const numBalls = 50;
const balls = [];

for (let i = 0; i < numBalls; i++) {
  let ball = document.createElement("div");
  ball.classList.add("ball");
  ball.style.background = colors[Math.floor(Math.random() * colors.length)];
  ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
  ball.style.top = `${Math.floor(Math.random() * 100)}vh`;
  ball.style.transform = `scale(${Math.random()})`;
  ball.style.width = `${Math.random()}em`;
  ball.style.height = ball.style.width;
  
  balls.push(ball);
  document.body.append(ball);
}

// Keyframes
balls.forEach((el, i, ra) => {
  let to = {
    x: Math.random() * (i % 2 === 0 ? -11 : 11),
    y: Math.random() * 12
  };

  let anim = el.animate(
    [
      { transform: "translate(0, 0)" },
      { transform: `translate(${to.x}rem, ${to.y}rem)` }
    ],
    {
      duration: (Math.random() + 1) * 2000, // random duration
      direction: "alternate",
      fill: "both",
      iterations: Infinity,
      easing: "ease-in-out"
    }
  );
});
        </script>
    
</body>
</html>