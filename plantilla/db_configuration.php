<?php
  include_once('configuration_instalacion.php');
  //Checking if we are into the OpenShift Ap
  if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
    $db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME']; //Openshift db name OPENSHIFT_MYSQL_DB_USERNAME
    $db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST']; //Openshift db host OPENSHIFT_MYSQL_DB_HOST
    $db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']; //Openshift db password OPENSHIFT_MYSQL_DB_PASSWORD
    $db_name=$database; //Openshift db name
  } else {
    $db_user=$username; //my db user
    $db_host=$localhost; //my db host
    $db_password=$password; //my db password ORIGINAL
    $db_name=$database; //my db name
  }
?>
