<?php
include("clean_string.php");
$qtd_prod = $_POST["qtd_prod"];
$cep = cleanNumber($_POST["cep"]);

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTYiLCJqdGkiOiIyNjViZmFkYjgzYmY0MDJlZDNiYjZiNTc1ODU1ODA5ODVlMTAzZGM2NDhmNzk1YTdlNWZmYzRmYmMxNzk5NjA5NjdhZWIwMWVmMTc4ZDVmNSIsImlhdCI6MTcwMTEzNDIyOC4wMDczMzMsIm5iZiI6MTcwMTEzNDIyOC4wMDczMzYsImV4cCI6MTczMjc1NjYyNy45ODcxMTksInN1YiI6IjlhYjc5ZDZjLTU4MDUtNDdiZC04OTQ4LTI2YTk2YTIzODQwOSIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIiwid2ViaG9va3MtZGVsZXRlIiwidGRlYWxlci13ZWJob29rIl19.X21SueYZ6o5JI573EnUR1_9gUHzZVukny8p6SIyq4iZrVJCBSN_gV2lUEwGeK5yD13YCgovK260z-1z2wBfgYoq0nnmes1VadBQQfh26MifbDLQbbDGI3jwiVRwRqeFBxfXGecOfeI6wVEwm3ZpQhQsi9IWOzD2FA4ktWJI1jUDyY6-vKSfXVA7-Vzo_GgAwmH4Ny4-hfXqZbR8sNHiVFKwuHXsuSRMRswN97Emp6IHB8S3VCsaQ1OsWHwH1bX875Oysa5_40wsipImyklGhxLoKv-cXaUSluPczOeUcJCTHuJU7sKO4LmcIT194EUmKIQ0JzWuHcV5aisXtvcErDm29f9F82w8Zn5Nm3P5Dax4GCLxPa8yimhRV8r4iDe561OzafRRbgiAvDbplBA2kOb6-0Qc9i5L_LnLd2CP5kqTg3rMyWhqJb0zyCvdFBHFtI8BnauJ-HoE5qIQsOCau1s0fTVtTSfrKus1RQ8L1lph6xiy50qwNSozJb9TOgOeg9XmNKCu92VZZzhu2BWlQoM-8dFduzfL69spzvXCnEXLBR9dde7_IubtjNyeOK3C-DBVwtBghzT71Wnv7xUDdiOmKpyuLStLF38i-asNaZsqJns9W35_qDIsLp2OwAx5oTiSpOLaCtp0mjgjsDYuwNro6DxEtAyHcYXpPX1_H_Z8';
if (isset($_POST["cep"])){
    $curl = curl_init();

    $data = [
        "from" => [
            "postal_code" => "07987160"
        ],
        "to" => [
            "postal_code" => $cep
        ],
        "products" => [
            [
                "id" => "x",
                "width" => 11,
                "height" => 17,
                "length" => 11,
                "weight" => 0.3,
                "insurance_value" => 10.1,
                "quantity" => $qtd_prod
            ]
        ],
        "services" => "2"
    ];

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://sandbox.melhorenvio.com.br/api/v2/me/shipment/calculate",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Bearer " . $token,
            "Content-Type: application/json",
            "User-Agent: Aplicação (email para contato técnico)"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Decodificar a resposta JSON em um array associativo
        $responseData = json_decode($response, true);

        // Verificar se a decodificação foi bem-sucedida
        if ($responseData !== null) {
            // Acessar os valores desejados
            $price = $responseData['price'];
            $deliveryTime = $responseData['delivery_time'];

            // Imprimir os valore
            echo "Sucesso" . "##";
            echo "R$ " . number_format($price, 2, ',', '.') . "##";

           
        } else {
            echo "Erro ao decodificar a resposta JSON.";
        }
    }
}else{
    echo "Informe um CEP Válido";
}
