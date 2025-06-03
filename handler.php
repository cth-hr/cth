<?php
header('Content-Type: application/json');

// Получаем данные из POST и обрезаем пробелы
$name = trim($_POST['name'] ?? '');
$country = trim($_POST['counrty'] ?? '');
$tel = trim($_POST['tel'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');



// Формируем тело письма
$email_subject = "Новое сообщение с сайта от $name";
$email_body = "Имя: $name\n";
$email_body .= "Страна: $country\n";	
$email_body .= "Телефон: $tel\n";
$email_body .= "Email: $email\n";
$email_body .= "Сообщение: " . ($message ? $message : 'Отсутствует') . "\n";

// Кому отправляем — укажи свой email
$to = "info@cth-hr.com";
$noreply = "no-reply@cth-hr.com";

// Заголовки письма
$headers = "From: $noreply\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Отправка письма
$mail_sent = mail($to, $email_subject, $email_body, $headers);

if ($mail_sent) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Ошибка при отправке письма']);
}
