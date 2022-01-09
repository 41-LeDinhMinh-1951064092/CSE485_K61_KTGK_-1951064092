<div style="color: red">
    <?php echo $error; ?>
</div>

<h1>
    Sửa nhân viên
</h1>

<form action="" method="post">
    Họ và tên:
    <input type="text"
           name="hovaten"
           value="<?php
           echo isset($_POST['hovaten']) ? $_POST['hovaten'] : $teacher['hovaten']?>"
    />
    <br />

    Chức vụ :
    <input type="text"
           name="chucvu"
           value="<?php
           echo isset($_POST['chucvu']) ? $_POST['chucvu'] : $teacher['chucvu']?>"
    />
    <br />

    Phòng ban:
    <input type="text"
           name="phongban"
           value="<?php
           echo isset($_POST['phongban']) ? $_POST['phongban'] : $teacher['phongban']?>"
    />
    <br />
    
    Lương: 
    <input type="text"
           name="luong"
           value="<?php
           echo isset($_POST['luong']) ? $_POST['luong'] : $teacher['luong']?>"
    />
    <br />

    Ngày vào làm :
    <input type="text"
           name="ngayvaolam"
           value="<?php
           echo isset($_POST['ngayvaolam']) ? $_POST['ngayvaolam'] : $teacher['ngayvaolam']?>"
    />
    <br />

    <input type="submit" name="submit" value="Update" />
</form>