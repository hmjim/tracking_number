<?php

use Class\AbstractOrder\Order;

require_once (__DIR__ . '/class/Order.php');
$id = 0;
$order = new Order($id);
$order->load();
$tracking_number = $this->data;
