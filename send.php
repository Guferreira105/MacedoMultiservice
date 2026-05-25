<?php
// ============================================================
// CONFIGURAÇÃO
// ============================================================
$owner_email   = 'macedo@macedomultiservices.com'; // Email do dono
$owner_name    = 'Macedo Multiservices';
$site_name     = 'Macedo Multiservices';
$subject_new   = 'Novo Pedido de Orçamento';
$subject_conf  = 'Recebemos seu Pedido de Orçamento';

// ============================================================
// Recebe os dados
// ============================================================
$input = json_decode(file_get_contents('php://input'), true);

if (!$input || empty($input['name']) || empty($input['email'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Dados inválidos']);
    exit;
}

$name    = htmlspecialchars($input['name']);
$email   = htmlspecialchars($input['email']);
$phone   = htmlspecialchars($input['phone'] ?? '');
$service = htmlspecialchars($input['service'] ?? '');
$message = htmlspecialchars($input['message'] ?? '');

// ============================================================
// Headers comuns
// ============================================================
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: $site_name <$owner_email>\r\n";

// ============================================================
// 1) Email para o dono (aviso de novo lead)
// ============================================================
$body_owner = <<<HTML
<h2>Novo Pedido de Orçamento</h2>
<table style="border-collapse:collapse;width:100%;max-width:600px">
  <tr><td style="padding:8px;border:1px solid #ddd;font-weight:bold">Nome</td><td style="padding:8px;border:1px solid #ddd">$name</td></tr>
  <tr><td style="padding:8px;border:1px solid #ddd;font-weight:bold">Email</td><td style="padding:8px;border:1px solid #ddd">$email</td></tr>
  <tr><td style="padding:8px;border:1px solid #ddd;font-weight:bold">Telefone</td><td style="padding:8px;border:1px solid #ddd">$phone</td></tr>
  <tr><td style="padding:8px;border:1px solid #ddd;font-weight:bold">Serviço</td><td style="padding:8px;border:1px solid #ddd">$service</td></tr>
  <tr><td style="padding:8px;border:1px solid #ddd;font-weight:bold">Mensagem</td><td style="padding:8px;border:1px solid #ddd">$message</td></tr>
</table>
HTML;

mail($owner_email, $subject_new, $body_owner, $headers);

// ============================================================
// 2) Email para o cliente (confirmação)
// ============================================================
$body_client = <<<HTML
<h2>Recebemos seu Pedido de Orçamento</h2>
<p>Olá <strong>$name</strong>,</p>
<p>Recebemos seu pedido de orçamento para <strong>$service</strong>.</p>
<p>Entraremos em contato em até 24 horas pelo telefone <strong>$phone</strong> ou email <strong>$email</strong>.</p>
<hr>
<p><strong>Resumo do seu pedido:</strong></p>
<p>$message</p>
<hr>
<p>Atenciosamente,<br><strong>$owner_name</strong></p>
HTML;

mail($email, $subject_conf, $body_client, $headers);

// ============================================================
// Resposta
// ============================================================
echo json_encode(['success' => true, 'message' => 'Email enviado com sucesso']);
