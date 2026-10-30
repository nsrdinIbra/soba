<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

$action = $_GET['action'] ?? '';

// 1. تسجيل الدخول أو إنشاء حساب جديد
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // دعم استقبال البيانات سواء أُرسلت كـ JSON أو Form-Data
    $input = json_decode(file_get_contents('php://input'), true);
    $name = trim($input['name'] ?? $_POST['name'] ?? '');
    $contact = trim($input['contact'] ?? $_POST['contact'] ?? '');

    if (!empty($name) && !empty($contact)) {
        // التحقق مما إذا كان المستخدم موجوداً مسبقاً عبر الإيميل أو الهاتف
        $stmt = $conn->prepare("SELECT id, name, contact FROM users WHERE contact = ?");
        $stmt->bind_param("s", $contact);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
        } else {
            // تسجيل مستخدم جديد كلياً
            $stmt_insert = $conn->prepare("INSERT INTO users (name, contact) VALUES (?, ?)");
            $stmt_insert->bind_param("ss", $name, $contact);
            $stmt_insert->execute();
            $_SESSION['user_id'] = $stmt_insert->insert_id;
            $_SESSION['user_name'] = $name;
        }

        echo json_encode(['status' => 'success', 'user_id' => $_SESSION['user_id'], 'name' => $_SESSION['user_name']]);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'الاسم وبيانات التواصل مطلوبة']);
        exit;
    }
}

// 2. حفظ البيانات أو الملاحظات الخاصة بالمستخدم
if ($action === 'save' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $input = json_decode(file_get_contents('php://input'), true);
        $data = $input['user_data'] ?? $_POST['user_data'] ?? '';
        $stmt = $conn->prepare("UPDATE users SET user_data = ? WHERE id = ?");
        $stmt->bind_param("si", $data, $_SESSION['user_id']);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
            exit;
        }
    }
    echo json_encode(['status' => 'error', 'message' => 'غير مصرح']);
    exit;
}

// 3. تسجيل الخروج وإنهاء الجلسة
if ($action === 'logout') {
    session_destroy();
    echo json_encode(['status' => 'success']);
    exit;
}

// 4. التحقق من حالة الدخول وجلب بيانات المستخدم الحالية
if ($action === 'check') {
    if (isset($_SESSION['user_id'])) {
        $stmt = $conn->prepare("SELECT name, user_data FROM users WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        echo json_encode([
            'logged_in' => true, 
            'name' => $user['name'], 
            'data' => $user['user_data'] ?? ''
        ]);
    } else {
        echo json_encode(['logged_in' => false]);
    }
    exit;
}

// =========================================================
// 5. جلب كل المقالات مع عدد التعليقات لكل مقال (جديد)
// =========================================================
if ($action === 'get_articles') {
    $sql = "SELECT a.*, COUNT(c.id) as comments_count 
            FROM articles a 
            LEFT JOIN comments c ON a.id = c.article_id 
            GROUP BY a.id 
            ORDER BY a.id DESC";
    $result = $conn->query($sql);
    $articles = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    }
    echo json_encode(['status' => 'success', 'articles' => $articles]);
    exit;
}

// =========================================================
// 6. جلب تعليقات مقال معين (جديد)
// =========================================================
if ($action === 'get_comments') {
    $article_id = intval($_GET['article_id'] ?? 0);
    $stmt = $conn->prepare("SELECT user_name, message, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') as created_at FROM comments WHERE article_id = ? ORDER BY id DESC");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
    echo json_encode(['status' => 'success', 'comments' => $comments]);
    exit;
}

// =========================================================
// 7. إضافة تعليق جديد لمقال معين (جديد)
// =========================================================
if ($action === 'add_comment' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    $article_id = intval($input['article_id'] ?? $_POST['article_id'] ?? 0);
    $message = trim($input['message'] ?? $_POST['message'] ?? '');
    
    // أخذ الاسم من الجلسة إن كان مسجلاً، أو من البيانات المرسلة
    $name = $_SESSION['user_name'] ?? trim($input['name'] ?? $_POST['name'] ?? '');
    $contact = trim($input['contact'] ?? $_POST['contact'] ?? '');

    if ($article_id <= 0 || empty($name) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'يرجى تسجيل بياناتك وكتابة التعليق أولاً']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO comments (article_id, user_name, user_contact, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $article_id, $name, $contact, $message);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'تم حفظ التعليق بنجاح']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء إرسال التعليق']);
    }
    $stmt->close();
    exit;
}
?>