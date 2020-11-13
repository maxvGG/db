<?php 
    require_once "db_Connection.php";
    // require_once "readuser.php";
    
    if(!isset($_SESSION)){
        $_SESSION['send'] = FALSE;
        session_start();

    }
    if(isset($_SESSION['send']) && $_SESSION['send'] === true){
        header('Location: index.php');
    }
    if(isset($_POST['send'])) {
        $user = new User();
        $username = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $user->createUser($username, $email, $password);
        if($user) {
            $_SESSION['send'] = TRUE;
        }
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,thead,th,td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>db eindopdracht db cms/ inlog systeem</h1>
    <hr>
    <h2>create user</h2>
    <form action="index.php" method='POST'>
        <input type="text" name="user" placeholder="User name"/><br>
        <input type="email" name="email" placeholder="Email"/><br>
        <input type="password" name="password" placeholder="Password"/><br>
        <input type="submit" value="submit" name="send" class="btn"/>
    </form>

    <h2>delete user</h2>
    <table>
  <thead>
    <tr>
      <th>id</th>
      <th>username</th>
      <th>email</th>
    </tr>
   </thead>
   <tbody id="products">
            

        </tbody>
</table>
<script>
        fetch("user.php")
        .then((response) => response.json())
        .then((data) => {
        for (let i = 0; i < data.length; i++) {
            const table = document.getElementById("products");
            var row = table.insertRow(i);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            cell1.innerHTML = data[i].naam;
            cell2.innerHTML = data[i].prijs;
            cell3.innerHTML = data[i].beschrijving;
            cell4.innerHTML = data[i].categorie;
            cell5.innerHTML = data[i].toegevoegd;
            cell6.innerHTML = data[i].update_datum;
            cell7.innerHTML = data[i].id;
        }
        })
        .catch((error) => console.log("error is ", error));
    </script> 
</body>
</html>