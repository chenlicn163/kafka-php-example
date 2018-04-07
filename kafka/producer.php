<?php
require '../vendor/autoload.php';
date_default_timezone_set('PRC');


$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('localhost:9092');
$config->setBrokerVersion('1.0.0');
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(500);
$producer = new \Kafka\Producer(
    function() {
        return [
            [
                'topic' => 'test',
                'value' =>  json_encode(['this is a test info']),
                'partId' => 0,
            ],
        ];
    }
);
$producer->send(true);