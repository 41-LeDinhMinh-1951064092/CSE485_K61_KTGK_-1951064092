<?php
require_once 'models/Teacher.php'; // lấy dữ liệu từ model và trả về viewbook, đứng giữa trung gian!
// -- cung cấp các hàm tương ứng hành động mình muốn thực hiện 

class TeacherController { // ----

    // la nhung action
    public function index() {   // ok
        echo "<h1>Trang liệt kê danh sách các nhân viên!</h1>";
        //gọi view để hiển thị dữ liệu
        //gọi view thực chất là nhúng file view vào
        //gọi file luôn phải nhớ là đứng tại
//        vị trí file index gốc của ứng dụng
        $teacher = new Teacher(); // tu model
        $teachers = $teacher->index(); // truyen sang view index trang chu
//        print_r($books);
        require_once 'views/teachers/index.php';
    }

    public function add() { // okokokokok
        $error = '';
        //xử lý submit form
        if (isset($_POST['submit'])) {

            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];

            //gọi model để insert dữ liệu vào database
            $teacher = new Teacher();
            //gọi phương thức để insert dữ liệu
            //nên tạo 1 mảng tạm để lưu thông tin của
//                đối tượng dựa theo cấu trúc bảng
            $teacherArr = [
                'hovaten' => $hovaten,
                'chucvu' => $chucvu,
                'phongban' => $phongban,
                'luong' => $luong,
                'ngayvaolam' => $ngayvaolam
            ];
            $isInsert = $teacher->insert($teacherArr);
            if ($isInsert) {
                $_SESSION['success'] = "Thêm mới thành công";
            }
            else {
                $_SESSION['error'] = "Thêm mới thất bại";
            }
            header("Location: index.php?controller=teacher&action=index");
            exit();

        }
        //gọi view
        require_once 'views/teachers/add.php';
    }
    public function detail() { // ok
        $teacher = new Teacher(); // tu model
        $teachers = $teacher->index(); // truyen sang view index trang chu
        require_once 'views/teachers/detail.php';
    }
    public function edit() {
        //lấy ra thông tin sách dựa theo id đã gắn trên url
        //xử lý validate cho trường hợp id truyền lên không hợp lệ
        if (!isset($_GET['maNhanVien'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=teacher&action=index");
            return;
        }
        if (!is_numeric($_GET['maNhanVien'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=teacher&action=index");
            return;
        }
        $magv = $_GET['maNhanVien']; // lay ma gv 2
        //gọi model để lấy ra đối tượng sách theo id
        $teacherModel = new Teacher();
        $teacher = $teacherModel->getTeacherById($magv); // lay sach theo id nhan duoc tu GET

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];
            
            //xử lý update dữ liệu vào hệ thống
            $teacherModel = new Teacher();
            $teacherArr = [
                'hovaten' => $hovaten,
                'chucvu' => $chucvu,
                'phongban' => $phongban,
                'luong' => $luong,
                'ngayvaolam' => $ngayvaolam
            ];
            $isUpdate = $teacherModel->update($teacherArr); // sai
            if ($isUpdate) {
                $_SESSION['success'] = "Update bản ghi #$manv thành công";
            }
            else { // nhay vao day
                $_SESSION['error'] = "Update bản ghi #$manv thất bại";
            }
            header("Location: index.php?controller=teacher&action=index");
            exit();
        }
        //truyền ra view
        require_once 'views/teachers/edit.php';
    }

    public function delete() {
        //url trên trình dueyjet sẽ có dạng
//        ?controller=book&action=delete&id=1
        //bắt id từ trình duyêtj
        $magv = $_GET['maNhanVien'];
        if (!is_numeric($manv)) {
            header("Location: index.php?controller=teacher&action=index");
            exit();
        }

        $book = new Teacher();
        $isDelete = $book->delete($manv);

        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $_SESSION['success'] = "Xóa bản ghi #$manv thành công";
        }
        else {
            //báo lỗi
            $_SESSION['error'] = "Xóa bản ghi #$manv thất bại";
        }
        header("Location: index.php?controller=teacher&action=index");
        exit();
    }
}
?>