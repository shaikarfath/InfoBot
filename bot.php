

<?php
$conn = mysqli_connect("localhost","root","","chatbot");

if($conn){
$user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);

$query = "SELECT * FROM chatbot WHERE user_query LIKE '%$user_messages%'";
$runQuery = mysqli_query($conn, $query);

if(mysqli_num_rows($runQuery) > 0){
    $result = mysqli_fetch_assoc($runQuery);
    echo $result['bot_reply'];
}else{
    echo "I am sorry, I didn't get that. Could you please ask again?";
}
}else{
    echo "connection Failed " . mysqli_connect_errno();
}
?>