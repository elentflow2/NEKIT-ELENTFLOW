<?php
$id = isset($_GET['del']) ? (int)$_GET['del'] : 0;

if ($id) {
    if (!$news->deleteNews($id)) {
        $errMsg = "Произошла ошибка при удалении новости";
    } else {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
} else {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>