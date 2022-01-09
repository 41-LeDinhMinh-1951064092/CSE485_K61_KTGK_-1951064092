<?php
//file hiển thị thông báo lỗi
require_once 'views/commons/error.php';
?>

<h1>HIỂN THỊ CHI TIẾT DANH SÁCH NHÂN VIÊN</h1>
<br>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Mã nhân viên</th>
        <th>Họ và tên</th>
        <th>Chức vụ</th>
        <th>Phòng ban</th>
        <th>Lương</th>
        <th>Ngày vào làm</th>

    </tr>
    <?php if (!empty($teachers)): ?>      
        <?php foreach ($teachers AS $teacher) : ?>
            <tr>
                <td><?php echo $teacher['maNhanVien'] ?></td>
                <td><?php echo $teacher['hovaten'] ?></td>
                <td><?php echo $teacher['chucvu'] ?></td>
                <td><?php echo $teacher['phongban'] ?></td>
                <td><?php echo $teacher['luong'] ?></td>
                <td><?php echo $teacher['ngayvaolam'] ?></td>
                
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Không có dữ liệu</td>
        </tr>
    <?php endif; ?>
</table>