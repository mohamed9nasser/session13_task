<?php
session_start();

// تدمير السيشن (تسجيل الخروج)
session_destroy();

// إعادة توجيه المستخدم لصفحة تسجيل الدخول
header("Location: ../views/landing.php");
exit;
