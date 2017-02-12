<?php
require_once('../../../private/initialize.php');

$errors = array();
$territory = array(
  'name' => '',
  'state_id' => '',
  'position' => ''
);

if(is_post_request()) {

  if(isset($_POST['name'])) { $territory['name'] = $_POST['name']; }
  if(isset($_POST['state_id'])) { $territory['state_id'] = $_POST['state_id']; }
  if(isset($_POST['position'])) { $territory['position'] = $_POST['position']; }

  $result = insert_territory($territory);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New Territory'; echo territory;?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="<?php echo "../state/show.php?id=" . $_GET['id']; ?>">Back to State Details</a><br />

  <h1>New Territory</h1>

  <!-- TODO add form -->
  <?php echo display_errors($errors); ?>

  <form action="new.php" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
    Code:<br />
    <input type="text" name="code" value="<?php echo $territory['code']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
