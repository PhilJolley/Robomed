<?php
  function insert_social($info, $db){
    if(social_exist($info['user_id'], $info['type'], $db)){
      if(update_social($info, $db)){
        return true;
      }
      else{
        return false;
      }
    }else{
      try {
        $stmt = $db->prepare("INSERT INTO social (url, user_id, type) VALUES (:url, :uid, :type) ");
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':uid', $user_id);
        $stmt->bindParam(':type', $type);
        $url = $info['url'];
        $user_id = $info['user_id'];
        $type = $info['type'];
        $stmt->execute();
      }


        catch(PDOException $e){
          return $e->getMessage();
        }
      $stmt=NULL;
      return true;
    }
  }

  function update_social($info, $db){
    try {
      $stmt = $db->prepare("UPDATE social SET url = :url WHERE user_id = :uid AND type = :type");
      $stmt->bindParam(':url', $url);
      $stmt->bindParam(':uid', $user_id);
      $stmt->bindParam(':type', $type);
      $url = $info['url'];
      $user_id = $info['user_id'];
      $type = $info['type'];
      $stmt->execute();
    }

      catch(PDOException $e){
        return $e->getMessage();
      }
    $stmt=NULL;
    return true;
  }

  function social_exist($uid, $type, $db){
    try {
      $stmt = $db->prepare("SELECT count(*) FROM social WHERE type = :type AND user_id = :uid");
      $stmt->bindParam(':uid', $uid);
      $stmt->bindParam(':type', $type);
      $stmt->execute();
    }catch(PDOException $e){
      return $e->getMessage();
    }
    $result = $stmt -> fetch();
    if($result['count(*)'] > 0){
      return true;
    }
    else{
      return false;
    }
  }

  function get_social($uid, $type, $db){
    try {
      $stmt = $db->prepare("SELECT * FROM social WHERE type = :type AND user_id = :uid");
      $stmt->bindParam(':uid', $uid);
      $stmt->bindParam(':type', $type);
      $stmt->execute();
    }catch(PDOException $e){
      return $e->getMessage();
    }
    $result = $stmt -> fetch();
    return $result;
  }
  //dashboard
  function find_all_dashboard() {
    global $db;

    $sql = "SELECT * FROM dashboard ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_dashboard_by_id($id) { //passing in the id
    global $db;

    $sql = "SELECT * FROM dashboard ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'"; //getting the id from url
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
  }

  /*function validate_dashboard($dashboard) { //save for later
    $errors = [];

    // menu_name
    if(is_blank($subject['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $subject['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  } */

  function insert_dashboard($dashboard) { //save for later
    global $db;

    $errors = validate_subject($dashboard);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO dashboard ";
    $sql .= "(dash_name, facebook_url, linkedin_url, twitter_url, bitcoin_num) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $dashboard['dash_name']) . "',";
    $sql .= "'" . db_escape($db, $dashboard['facebook_url']) . "',";
    $sql .= "'" . db_escape($db, $dashboard['linkedin_url']) . "'";
    $sql .= "'" . db_escape($db, $dashboard['twitter_url']) . "'";
    $sql .= "'" . db_escape($db, $dashboard['bitcoin_num']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_dashboard($dashboard) {
    global $db;

    /*$errors = validate_subject($dashboard);
    if(!empty($errors)) {
      return $errors;
    } */

    $sql = "UPDATE dashboard SET ";
    $sql .= "facebook_url='" . db_escape($db, $dashboard['facebook_url']) . "', ";
    $sql .= "linkedin_url='" . db_escape($db, $dashboard['linkedin_url']) . "', ";
    $sql .= "twitter_url='" . db_escape($db, $dashboard['twitter_url']) . "' ";
    $sql .= "bitcoin_num='" . db_escape($db, $dashboard['bitcoin_num']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  //facebook table

  function find_all_facebook() {
    global $db;

    $sql = "SELECT * FROM facebook ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_facebook_by_url($id) { //passing in the id
    global $db;

    $sql = "SELECT * FROM facebook ";
    $sql .= "WHERE fb_url='" . db_escape($db, $id) . "'"; //getting the id from url
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
  }

  function update_facebook($facebook) {
    global $db;

    /*$errors = validate_subject($facebook);
    if(!empty($errors)) {
      return $errors;
    } */

    $sql = "UPDATE facebook SET ";
    $sql .= "fb_url='" . db_escape($db, $facebook['fb_url']) . "' ";
    /*$sql .= "like='" . db_escape($db, $facebook['like']) . "', ";
    $sql .= "share='" . db_escape($db, $facebook['share']) . "', ";
    $sql .= "comment='" . db_escape($db, $facebook['comment']) . "' "; */
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  //linkedin
  function find_all_linkedin() {
    global $db;

    $sql = "SELECT * FROM linkedin ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_linkedin_by_url($id) { //passing in the id
    global $db;

    $sql = "SELECT * FROM dashboard ";
    $sql .= "WHERE li_url='" . db_escape($db, $id) . "'"; //getting the id from url
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
  }

  function update_linkedin($linkedin) {
    global $db;

    /*$errors = validate_subject($facebook);
    if(!empty($errors)) {
      return $errors;
    } */

    $sql = "UPDATE linkedin SET ";
    $sql .= "li_url='" . db_escape($db, $linkedin['li_url']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  //Twitter
  function find_all_twitter() {
    global $db;

    $sql = "SELECT * FROM twitter ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_twitter_by_url($id) { //passing in the id
    global $db;

    $sql = "SELECT * FROM twitter ";
    $sql .= "WHERE twt_url='" . db_escape($db, $id) . "'"; //getting the id from url
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
  }

  function update_twitter($twitter) {
    global $db;

    /*$errors = validate_subject($facebook);
    if(!empty($errors)) {
      return $errors;
    } */

    $sql = "UPDATE twitter SET ";
    $sql .= "twt_url='" . db_escape($db, $twitter['twt_url']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  /*// Subjects

  function find_all_subjects() {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_subject_by_id($id) { //passing in the id
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'"; //getting the id from url
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
  }

  function validate_subject($subject) {
    $errors = [];

    // menu_name
    if(is_blank($subject['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $subject['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }

  function insert_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $subject['menu_name']) . "',";
    $sql .= "'" . db_escape($db, $subject['position']) . "',";
    $sql .= "'" . db_escape($db, $subject['visible']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  // Pages

  function find_all_pages() {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_page_by_id($id) {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // returns an assoc. array
  }

  function validate_page($page) {
    $errors = [];

    // subject_id
    if(is_blank($page['subject_id'])) {
      $errors[] = "Subject cannot be blank.";
    }

    // menu_name
    if(is_blank($page['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    $current_id = $page['id'] ?? 0;
    if(!has_unique_page_menu_name($page['menu_name'], $current_id)){
      $errors[] = "Menu name must be unique";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $page['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $page['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    // content
    if(is_blank($page['content'])) {
      $errors[] = "Content cannot be blank.";
    }

    return $errors;
  }

  function insert_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $page['subject_id']) . "',";
    $sql .= "'" . db_escape($db, $page['menu_name']) . "',";
    $sql .= "'" . db_escape($db, $page['position']) . "',";
    $sql .= "'" . db_escape($db, $page['visible']) . "',";
    $sql .= "'" . db_escape($db, $page['content']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_page($page) {
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $page['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
    $sql .= "content='" . db_escape($db, $page['content']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_page($id) {
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  } */


  //user
    // Find all user, ordered last_name, first_name
    function find_all_user() {
    global $db;

    $sql = "SELECT * FROM user ";
    $sql .= "ORDER BY last_name ASC, first_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_user_by_id($id) {
    global $db;

    $sql = "SELECT * FROM user ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM user ";
    $sql .= "WHERE user_name='" . db_escape($db, $user_name) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function validate_user($user, $options=NULL) {

    if($options!=NULL){
      $password_required = $options['password_required'] ?? true;
    }

    if(is_blank($user['full_name'])) {
      $errors[] = "Full name cannot be blank.";
    } elseif (!has_length($user['full_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Full name must be between 2 and 255 characters.";
    }

    if(is_blank($user['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($user['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($user['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($user['user_name'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($user['user_name'], array('min' => 6, 'max' => 255))) {
      $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($admin['user_name'], $user['id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }
    if($password_required){
      if(is_blank($user['password'])) {
        $errors[] = "Password cannot be blank.";
      } elseif (!has_length($user['password'], array('min' => 6))) {
        $errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      }
    }

    if(is_blank($user['confirm_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($user['password'] !== $user['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }

    return $errors;
  }

  function insert_user($user) {
    global $db;

    $errors = validate_user($user);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user ";
    $sql .= "(full_name, email, user_name, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $user['full_name']) . "',";
    $sql .= "'" . db_escape($db, $user['email']) . "',";
    $sql .= "'" . db_escape($db, $user['user_name']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_user($user) {
    global $db;

    $password_sent = !is_black($user['password']);
    $errors = validate_admin($user, ['password_required' => $password_sent]);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE user SET ";
    $sql .= "first_name='" . db_escape($db, $user['full_name']) . "', ";
    $sql .= "email='" . db_escape($db, $user['email']) . "', ";
    if($password_sent){
      $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "',";
    }
    $sql .= "user_name='" . db_escape($db, $user['user_name']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_user($user) {
    global $db;

    $sql = "DELETE FROM user ";
    $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

?>
