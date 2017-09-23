<?php

$email = input($_POST['email'], 1);

$password = md5(input($_POST['password']));

$numrow = GetNumRow('username,email', 'user', "email ='$email' and status > -1");

if ($numrow > 0) {
    ?>
    <script>

        alert('Email này đã có người đăng ký. Vui lòng chọn email khác.');

        history.go(-1);

    </script>
    <?php

} else {
    $select_danhxung = "0";

    $phone = "";

    $sql = "INSERT INTO user(password,
                                     email,
                                     date,
                                     status,
                                     GroupMember)
                    VALUES ('" . $password . "','"
            . $email . "',"
            . time()
            . ",0,'"
            . "Chưa là thành viên" . "')";

    $mysql->setQuery($sql);

    if ($mysql->query()) {
        $lastId = mysql_insert_id();

        $image = renameFile($_FILES["avatar"]["name"], 'avatar' . '-' . $lastId);

        //Resize 	
        if (move_uploaded_file($_FILES ["avatar"]["tmp_name"], '../upload/avatar/' . $image)) {
            @imagejpeg(resize('../upload/avatar/' . $image, 300, 320), '../upload/avatar/' . $image);

            $sql = "UPDATE user SET avarta ='" . $image . "' where id = " . $lastId;

            $mysql->setQuery($sql);

            $mysql->query();
        }
    }
    ?>
    <script>
        alert('Đăng ký thành công');
        window.location = 'dang-nhap';
    </script>
    <?php

}?>