<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $age = htmlspecialchars($_POST["age"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $subjects = isset($_POST["subjects"]) ? implode(", ", $_POST["subjects"]) : "Không có";
    $notes = htmlspecialchars($_POST["notes"]);

    $to = "kinokosuzuki161009@gmail.com";  // ✉️ Thay bằng email nhận
    $subject = "Đăng ký học từ $name";
    $message = "
        <h2>Thông tin đăng ký</h2>
        <p><strong>Tên:</strong> $name</p>
        <p><strong>Tuổi:</strong> $age</p>
        <p><strong>Số điện thoại:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Môn học muốn học:</strong> $subjects</p>
        <p><strong>Ghi chú:</strong> $notes</p>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "✅ Đăng ký thành công! Email đã được gửi.";
    } else {
        echo "❌ Lỗi: Không thể gửi email.";
    }
} else {
    echo "❌ Truy cập không hợp lệ!";
}
?>
