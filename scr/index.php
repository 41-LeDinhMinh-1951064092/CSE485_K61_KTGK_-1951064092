<?php // trang mặc định chạy đầu tiên
session_start();

$controller = isset($_GET['controller'])
    ? $_GET['controller'] : 'teacher';
//lấy ra action
$action = isset($_GET['action']) ? $_GET['action'] :
    'index';

$controller = ucfirst($controller);

$fileController = $controller . "Controller.php";

$pathController = "controllers/$fileController";


// ----------
if (!file_exists($pathController)) {
    die("Trang bạn tìm không tồn tại"); // ----- nếu đoạn này xảy ra, chương trình dừng thực hiện
}
require_once "$pathController"; /// --- nếu tồn tại tệp, nhúng file thành công và có thể sử dụng

// --------- xác định tên class bên trong controller đang định nghĩa
$classController = $controller."Controller";

// -------- tạo ra đối tượng tương ứng với Class vừa xác định ở trên
$object = new $classController();

// ------ kiểm tra action có tồn tại trong controller không
if (!method_exists($object, $action)) {
    die("Phương thức $action
     không tồn tại trong class $classController");
}

$object->$action();
?>