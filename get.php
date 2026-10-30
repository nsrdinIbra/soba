<?php
// إظهار الأخطاء للتشخيص
error_reporting(E_ALL);
ini_set('display_errors', 1);

// استدعاء ملف الاتصال بقاعدة البيانات
include 'db.php';

// استعلام لجلب المقالات من جدول articles
$sql = "SELECT * FROM articles ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    echo "خطأ في الاستعلام: " . $conn->error;
    exit;
}

// التحقق من وجود مقالات وعرضها
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px;">';
        // تأكد أن 'title' و 'content' هي نفس أسماء الأعمدة لديك في قاعدة البيانات
        echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
        echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
        echo '</div>';
    }
} else {
    echo "لا توجد مقالات مضافة حالياً.";
}
?>