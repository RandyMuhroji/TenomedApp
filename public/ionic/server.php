<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");

$connection = mysqli_connect("localhost","root","","tenomed") or die("Error " . mysqli_error($connection));

  if($_GET['param'] == 'login'){
    $data = file_get_contents('php://input');
    
    $account = json_decode($data);

    $datas = new stdClass();

    $query = mysqli_query($connection, "SELECT * FROM users where email = '$account->email'");


    // echo json_encode("fdafsdf");
     if(mysqli_num_rows($query) >= 1 ){
          
       while($row = mysqli_fetch_assoc($query))
       {
           $data = $row;
       }

       
       
      $tmp = json_encode($data);
      $tmp2 = json_decode($tmp);

      $password = $tmp2->password;

       $cek = password_verify($account->password, $password);
       

      if(true){
        $token = base64_encode($account->email);

        $datas->token = $token;
        $datas->user = $tmp2;
        echo json_encode($datas);
      } 
      else{
        echo json_encode(0);
      }

    }
    else {
       echo json_encode(0);
     }
  }

  else if($_GET['param'] == 'checkAuth'){

    $token = file_get_contents('php://input');

    $key = base64_decode($token);

    $query = mysqli_query($connection, "SELECT * FROM users where email = '$key'");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $data = $row;
      }
      echo json_encode($data);
    }
    else {
      echo json_encode(0);
    }
  }

  else if($_GET['param'] == 'register'){
    $data = json_decode(file_get_contents('php://input'));

    // $data
    $email = $data->email;
    $name  = $data->name;
    $pass  = password_hash('$data->password', PASSWORD_BCRYPT);



    $query = mysqli_query($connection, "SELECT * FROM users where email = '".$email."'");

    if(mysqli_num_rows($query) >= 1 ){
          
      echo json_encode(0);
    }
    else{
      
      $query = mysqli_query($connection, "INSERT INTO users (name, email, password) VALUES ('$name','$email','$pass')");

      $token = base64_encode($email);
      echo json_encode($token);
    }

  }

  else if($_GET['param'] == 'home'){
    $user_id = 3;

    $cafes = [];
    $bookmarks = [];
    $rate = [];
    
    $data = new stdClass();
    
    $query = mysqli_query($connection, "SELECT * FROM cafes where status = 1");
      if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $cafes[] = $row;
      }               
    }

    $query = mysqli_query($connection, "SELECT * FROM bookmarks where user_id = '$user_id'");
      if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $bookmarks[] = $row;
      }               
    }

    $query = mysqli_query($connection, "SELECT cafe_id ,count(cafe_id) people, Round(avg(rate),1) rate FROM `reviews` WHERE parent_id = 0 GROUP BY cafe_id");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $tmp[] = $row;
      }
      $rate = $tmp;
    }

    $data->rate      = $rate;
    $data->cafes     = $cafes;
    $data->bookmarks = $bookmarks; 

    echo json_encode($data);
    
  }

  else if($_GET['param'] == 'detailCafe'){
    $data = json_decode(file_get_contents('php://input'));

    $cafe_id    = $data[0];
    $user_login = $data[1];

    $user_id   = 0;
    $slider    = [];
    $images    = [];
    $opCafe    = [];
    $reviews   = [];
    $highlights = [];
    $menu       = [];
    $bookmark   = 0;
    $statusOpen = "Closed";
    $rate = new stdClass();

    date_default_timezone_set("Asia/Jakarta");

    $date = date("l");
    $today = 4;

    $hour = date('H:i');


    $query = mysqli_query($connection, "SELECT user_id from cafes where id = '$cafe_id' ");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $tmp = json_encode($row);
      }
      $user_id = json_decode($tmp)->user_id;

    }

    $query = mysqli_query($connection, "SELECT count(rate) people, Round(avg(rate),1) rate FROM `reviews` WHERE cafe_id = '$cafe_id' and parent_id = 0");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $tmp = $row;
      }
      $rate = $tmp;
    }


    $query = mysqli_query($connection, "SELECT a.name, g.filename,g.title,g.desc FROM album_gallery a inner join gallery g on a.id = g.album_id where a.name = 'slider' and a.user_id = '$user_id'");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $slider[] = $row;
      }
    }

    $query = mysqli_query($connection, "SELECT a.name, g.filename,g.title,g.desc FROM album_gallery a inner join gallery g on a.id = g.album_id where a.name != 'slider' and a.user_id = '$user_id'");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $images[] = $row;
      }
    }

    $query = mysqli_query($connection, "SELECT day,open_hour,close_hour FROM operational_cafe WHERE cafe_id = '$cafe_id'");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $opCafe[] = $row;
      }
    }

    $query = mysqli_query($connection, "SELECT r.*,u.name,u.avatar FROM `reviews` r left join users u on r.user_id = u.id WHERE cafe_id = '$cafe_id' ");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $reviews[] = $row;
      }
    }

    $query = mysqli_query($connection, "SELECT * FROM highlights WHERE cafe_id = '$cafe_id'");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $highlights[] = $row;
      }
    }

    $query = mysqli_query($connection, "SELECT * FROM bookmarks WHERE cafe_id = '$cafe_id' and user_id = '$user_login'");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $tmp = $row;
      }

      $bookmark = 1;
    }

    $data = new stdClass();

    $query = mysqli_query($connection, "SELECT day,open_hour,close_hour FROM operational_cafe WHERE cafe_id = $cafe_id and day = '$today'" );

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $tmp = $row;
      }

      $data->jam = $tmp;

      if(strtotime($tmp['open_hour']) <= strtotime($hour) and strtotime($tmp['close_hour']) >= strtotime($hour)){
        $statusOpen = "Open Now";
      }
      // $statusOpen = $hour;

    }

    $query = mysqli_query($connection, "SELECT DISTINCT category FROM `menu_cafe` WHERE cafe_id = '$cafe_id' ");

    if(mysqli_num_rows($query) >= 1 ){          
      while($row = mysqli_fetch_assoc($query))
      {
          $ctg = $row['category'];

          $query2 = mysqli_query($connection, "SELECT * FROM `menu_cafe` WHERE cafe_id = '$cafe_id' and category = '$ctg' ");
          if(mysqli_num_rows($query2) >= 1 ){
            $tmp = [];
            while($row2 = mysqli_fetch_assoc($query2)){
              $tmp[] = $row2; 
            }
            $menu[] = $tmp;
          }
      }
    }

    $data->slider     = $slider;
    $data->images     = $images;
    $data->opCafe     = $opCafe;
    $data->reviews    = $reviews;
    $data->highlights = $highlights;
    $data->bookmark   = $bookmark;
    $data->day        = $date;
    $data->statusOpen = $statusOpen;
    $data->rate       = $rate;
    $data->menu       = $menu;


    echo (json_encode($data));

  }    

  else if($_GET['param'] == 'getBookmark'){
    $data = json_decode(file_get_contents('php://input'));

    $cafe_id    = $data[0];
    $user_login = $data[1];

    $cek = 0;

    $query = mysqli_query($connection, "SELECT * FROM bookmarks WHERE cafe_id = '$cafe_id' and user_id = '$user_login'");

    if(mysqli_num_rows($query) >= 1 ){

      $cek = 1;
    }

    if($cek != 0){
      $query = mysqli_query($connection, "Delete from bookmarks where cafe_id = '$cafe_id' and user_id = '$user_login' ");
      $cek = 0;
    }
    else{
      $query = mysqli_query($connection, "INSERT into  bookmarks (user_id, cafe_id,status) VALUES ('$user_login', '$cafe_id','1')");
      $cek = 1;
    }


    echo json_encode($cek);

  }

  else if($_GET['param'] == 'pushReview'){
    $data = json_decode(file_get_contents('php://input'));

    $cafe_id     = $data[0];
    $user_login  = $data[1];
    $review_text = $data[2];
    $review_rate = $data[3];
    $parent_id   = $data[4];

    $data = new stdClass();

    $queryDelete = mysqli_query($connection, "Delete from reviews where user_id='$user_login' and cafe_id='$cafe_id'");

    $queryInsert = mysqli_query($connection, "INSERT into  reviews (user_id, cafe_id,parent_id,rate,description) VALUES ('$user_login', '$cafe_id', '$parent_id','$review_rate', '$review_text')");

    $query = mysqli_query($connection, "SELECT r.*,u.name,u.avatar FROM `reviews` r left join users u on r.user_id = u.id WHERE cafe_id = '$cafe_id' ");

    if(mysqli_num_rows($query) >= 1 ){
          
      while($row = mysqli_fetch_assoc($query))
      {
          $reviews[] = $row;
      }
      $data->reviews = $reviews;
    }

    echo json_encode($data);
  }

  else if($_GET['param'] == 'menu'){
    
    $cafe_id = file_get_contents('php://input');

    $menu = [];

    $query = mysqli_query($connection, "SELECT DISTINCT category FROM `menu_cafe` WHERE cafe_id = '$cafe_id' ");

    if(mysqli_num_rows($query) >= 1 ){          
      while($row = mysqli_fetch_assoc($query))
      {
          $ctg = $row['category'];

          $query2 = mysqli_query($connection, "SELECT * FROM `menu_cafe` WHERE cafe_id = '$cafe_id' and category = '$ctg' ");
          if(mysqli_num_rows($query2) >= 1 ){
            $tmp = [];
            while($row2 = mysqli_fetch_assoc($query2)){
              $tmp[] = $row2; 
            }
            $menu[] = $tmp;
          }
      }
    }
    echo json_encode($menu[0][0]);
  }

  else if($_GET['param'] == 'bookmarks'){
    $user_id = file_get_contents('php://input');
    $cafes   = [];
    $query = mysqli_query($connection, "SELECT c.* from bookmarks b left join cafes c on b.cafe_id = c.id WHERE b.user_id = '$user_id' ");

    if(mysqli_num_rows($query) >= 1 ){          
      while($row = mysqli_fetch_assoc($query)){
        $cafes[] = $row;
      }
    }
  
    echo json_encode($cafes);
  }

  else if($_GET['param'] == 'deleteBookmark'){
    $data = json_decode(file_get_contents('php://input'));

    $cafe_id  = $data[0];
    $user_id  = $data[1];

    $query = mysqli_query($connection, "Delete from bookmarks where cafe_id = '$cafe_id' and user_id = '$user_id'");
  
    echo json_encode(1);
  }

  else if($_GET['param'] == 'reviews'){
    $user_id = file_get_contents('php://input');
    $cafes   = [];
    $query = mysqli_query($connection, "SELECT c.image,r.id As review_id,c.id As id,r.rate,r.description,c.name from reviews r left join cafes c on r.cafe_id = c.id WHERE r.user_id = '$user_id' ");

    if(mysqli_num_rows($query) >= 1 ){          
      while($row = mysqli_fetch_assoc($query)){
        $cafes[] = $row;
      }
    }
  
    echo json_encode($cafes);
  }

  else if($_GET['param'] == 'deleteReview'){
    $review_id = file_get_contents('php://input');;
    $query = mysqli_query($connection, "Delete from reviews where id='$review_id'");
  
    echo json_encode($review_id);
  }

  else if($_GET['param'] == 'changePassword'){
    $data = json_decode(file_get_contents('php://input'));

    $user_id = $data[0];
    $currentPassword = $data[1];
    $newPassword = $data[2];

    $query = mysqli_query($connection, "SELECT * from users where id = '$user_id' ");

    if(mysqli_num_rows($query) >= 1 ){          
      while($row = mysqli_fetch_assoc($query)){
        $data = $row;
      }
      $tmp = json_encode($data);
      $tmp2 = json_decode($tmp);

      $password = $tmp2->password;

      $cek = password_verify($currentPassword, $password);

      if(!$cek){
        $pass  = password_hash('$newPassword', PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password='$pass' WHERE id='$user_id' ";

        if ($connection->query($sql) === TRUE) {
            echo json_encode(1);
        } else {
           echo json_encode(-1);
        }        
      } 
      else{
        echo json_encode(0);
      }
    }

    else{
      echo json_encode(0);
    }
  }
  
  ?>