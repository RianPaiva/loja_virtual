<?php
require "../../../vendor/autoload.php";
use MelhorEnvio\Shipment;
use MelhorEnvio\Resources\Shipment\product;
use MelhorEnvio\Enums\Service;
use MelhorEnvio\Enums\Environment;

$client = new GuzzleHttp\Client([
    'verify' => false,
]);


$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTYiLCJqdGkiOiIyNjViZmFkYjgzYmY0MDJlZDNiYjZiNTc1ODU1ODA5ODVlMTAzZGM2NDhmNzk1YTdlNWZmYzRmYmMxNzk5NjA5NjdhZWIwMWVmMTc4ZDVmNSIsImlhdCI6MTcwMTEzNDIyOC4wMDczMzMsIm5iZiI6MTcwMTEzNDIyOC4wMDczMzYsImV4cCI6MTczMjc1NjYyNy45ODcxMTksInN1YiI6IjlhYjc5ZDZjLTU4MDUtNDdiZC04OTQ4LTI2YTk2YTIzODQwOSIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIiwid2ViaG9va3MtZGVsZXRlIiwidGRlYWxlci13ZWJob29rIl19.X21SueYZ6o5JI573EnUR1_9gUHzZVukny8p6SIyq4iZrVJCBSN_gV2lUEwGeK5yD13YCgovK260z-1z2wBfgYoq0nnmes1VadBQQfh26MifbDLQbbDGI3jwiVRwRqeFBxfXGecOfeI6wVEwm3ZpQhQsi9IWOzD2FA4ktWJI1jUDyY6-vKSfXVA7-Vzo_GgAwmH4Ny4-hfXqZbR8sNHiVFKwuHXsuSRMRswN97Emp6IHB8S3VCsaQ1OsWHwH1bX875Oysa5_40wsipImyklGhxLoKv-cXaUSluPczOeUcJCTHuJU7sKO4LmcIT194EUmKIQ0JzWuHcV5aisXtvcErDm29f9F82w8Zn5Nm3P5Dax4GCLxPa8yimhRV8r4iDe561OzafRRbgiAvDbplBA2kOb6-0Qc9i5L_LnLd2CP5kqTg3rMyWhqJb0zyCvdFBHFtI8BnauJ-HoE5qIQsOCau1s0fTVtTSfrKus1RQ8L1lph6xiy50qwNSozJb9TOgOeg9XmNKCu92VZZzhu2BWlQoM-8dFduzfL69spzvXCnEXLBR9dde7_IubtjNyeOK3C-DBVwtBghzT71Wnv7xUDdiOmKpyuLStLF38i-asNaZsqJns9W35_qDIsLp2OwAx5oTiSpOLaCtp0mjgjsDYuwNro6DxEtAyHcYXpPX1_H_Z8';



// Create Shipment Instance
$shipment = new Shipment($token, Environment::SANDBOX);

// Create Calculator Instance
$calculator = $shipment->calculator();
$calculator->postalCode('07987160', '08830420');

$calculator->addProducts(
    new Product(uniqid(), 40, 30, 50, 10.00, 100.0, 1),
    new Product(uniqid(), 5, 1, 10, 0.1, 50.0, 1)
);

$calculator->addServices(
    Service::CORREIOS_PAC, 
    Service::CORREIOS_SEDEX,
    Service::CORREIOS_MINI,
    Service::JADLOG_PACKAGE, 
    Service::JADLOG_COM, 
    Service::AZULCARGO_AMANHA,
    Service::AZULCARGO_ECOMMERCE,
    Service::LATAMCARGO_JUNTOS,
    Service::VIABRASIL_RODOVIARIO
);

$calculator->setOwnHand();
$calculator->setReceipt();
$calculator->setCollect();

$quotations = $calculator->calculate();
echo $quotations;