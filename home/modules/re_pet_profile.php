<?php
$finish = input($_GET['finish']);

if (($_SESSION['username'] == '')) {
    header('Location: ' . $linkS . 'dang-nhap');
}

$name = input($_POST['name']);

$birthday = input($_POST['birthday']);

$species = input($_POST['species']);

$mausac = input($_POST['mausac']);

$chieucao = input($_POST['chieucao']);

$cannang = input($_POST['cannang']);

$sex = input($_POST['sex']);

$User = new User();

$us = $User->getUserInfo($_SESSION['username']);

$pet['id_user'] = $us['id'];

$pet['name'] = $name;

$pet['birthday'] = strtotime($birthday);

$pet['species'] = $species;

$pet['sex'] = $sex;

$pet['height'] = $chieucao;

$pet['image'] = '';

$pet['weight'] = $cannang;

$pet['color'] = $mausac;

$Pet = new Pet();

$score = new ScoreModel();

if (isset($_POST['submit'])) {

    if ($name == "" || $birthday == "" || $species == "" || $mausac == "" || $chieucao == "" || $cannang == "") {
        ?>
        <script>
            alert("Chưa điền đầy đủ thông tin!")
        </script>
        <?php
    } else {

        $usrPet = GetOneRow("id", "user", "email = '" . $_SESSION['username'] . "'");

        $ls_pet = GetRows("id", "pet_profile", "id_user = " . $usrPet["id"]);

        $id_pet = $Pet->savePet($pet);

        $image = renameFile($_FILES["petimage"]["name"], 'pet' . '-' . $id_pet);

        if (move_uploaded_file($_FILES ["petimage"]["tmp_name"], '../upload/avatar/' . $image)) {

            @imagejpeg(resize('../upload/avatar/' . $image, 400, 420), '../upload/avatar/' . $image);

            $sql = "UPDATE pet_profile SET image ='" . $image . "' WHERE id = " . $id_pet;

            $mysql->setQuery($sql);

            $mysql->query();
        }
        ?>
        <script>
            window.location = "<?php echo $linkS . 'thu-cung-cua-toi'; ?>";
        </script>
        <?php
    }
}

$re_pet_profile = $xtemplate->load('re_pet_profile_bootstrap');

$breadcrumbs_path .= '<a href="{linkS}">'.$pageName.'</a>';

$breadcrumbs_path .= ' &raquo; ' . 'Đăng ký thú cưng';

$title_page = 'Đăng ký thú cưng';

$user = $_SESSION['username'];

$row_ac = GetOneRow('email,'
        . 'avarta'
        , 'user', "email = '$user' AND status >-1");

$re_pet_profile = $xtemplate->replace($re_pet_profile, array(
    'name' => $name,
    'birthday' => $birthday,
    'species' => $species,
    'mausac' => $mausac,
    'chieucao' => $chieucao,
    'cannang' => $cannang,
    'sex' => $sex,
    'img_pet' => (!empty($img_pet)) ? $img_pet : 'default.png',
    'avatar' => ($row_ac['avarta'] != '') ? $row_ac['avarta'] : 'default.png',
        ));

$content = $re_pet_profile;
?>