<?php// 执行 cURL 请求
$response = curl_exec($ch)or: ' . curl_error($ch);
// 过滤掉关闭状态的接口
$interfaces = json_decode($response, true);erface_status'] === 1;
});

// 重新编码为 JSON
$filteredResponse = json_encode($activeInterfaces);

// 设置响应头
header('Content-Type: application/json');

// 输出响应
echo $filteredResponse;
?>
