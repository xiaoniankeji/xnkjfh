<?php
// 目标 URL
$targetUrl = 'https://fhjk.xnkeji.top/api-list.json';

// 初始化 cURL
$ch = curl_init();

// 设置 cURL 选项
curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// 执行 cURL 请求
$response = curl_exec($ch);

// 检查是否有错误
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// 关闭 cURL
curl_close($ch);

// 过滤掉关闭状态的接口
$interfaces = json_decode($response, true);
$activeInterfaces = array_filter($interfaces, function($interface) {
    return $interface['interface_status'] === 1;
});

// 重新编码为 JSON
$filteredResponse = json_encode($activeInterfaces);

// 设置响应头
header('Content-Type: application/json');

// 输出响应
echo $filteredResponse;
?>
