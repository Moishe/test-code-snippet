<?php

// this is a stand-in for the code you'd use to write to your own database
function subscribeUser($id) {}
function unsubscribeUser($id) {}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $type = $_POST['type'];
  $id = $_POST['data']['id'];

  if ($type === 'subscribe') {
    subscribeUser($id);
  } else if ($type === 'unsubscribe') {
    unsubscribeUser($id);
  }
}