<?php
require '../vendor/autoload.php';
date_default_timezone_set('PRC');

$config = \Kafka\ConsumerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('localhost:9092');
$config->setGroupId('test');
$config->setBrokerVersion('1.0.0');
$config->setTopics(['test']);
//$config->setOffsetReset('earliest');
$consumer = new \Kafka\Consumer();


$consumer->start(function($topic, $part, $message) {
	echo "<pre>";
	print_r($message);
});