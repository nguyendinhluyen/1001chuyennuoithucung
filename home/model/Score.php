<?php

class ScoreModel {

    public static function saveScore($user, $score) {

        global $mysql;

        $sql = "insert into scores (user,score) values ('" . $user . "','" . $score . "')";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    public static function getScoreByUser($user) {
        $score = GetOneRow('user,score', 'scores', "user = '" . $user . "'");

        return $score['score'];
    }

    public static function getAwardScoreByUser($user) {
        $score = GetOneRow('user,scoreaward', 'scores', "user = '" . $user . "'");

        return $score['scoreaward'];
    }

    public static function getLevelByUser($user) {
        $GroupMember = GetOneRow("GroupMember", "user", "email = '" . $user . "'");

        if ($GroupMember['GroupMember'] == "Chưa là thành viên") {
            $honor = GetOneRow('user,honors', 'scores', "user = '" . $user . "'");

            return $honor['honors'];
        }
        return $GroupMember['GroupMember'];
    }

    public static function updateScore($user, $score) {

        global $mysql;

        $sql = "update scores set score =" . $score . "  where user = '" . $user . "'";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    public function calculatorPetPawFromScore($score) {

        if ($score == '') {

            $score = 0;
        }

        $arr = explode(".", $score / 100);

        $petpaw = $arr[0];

        return $petpaw;
    }

    public function calculatorUsertypeFromScore($score) {

        $pet_paw = $this->calculatorPetPawFromScore($score);

        $pet_type = 'Normal';

        if ($pet_paw >= 5 && $pet_paw < 15) {

            $pet_type = 'Petinfatuation';
        }

        if ($pet_paw >= 15 && $pet_paw < 30) {

            $pet_type = 'Petlover';
        }

        if ($pet_paw >= 30 && $pet_paw < 20) {

            $pet_type = 'Petadorer';
        }

        if ($pet_paw >= 50) {

            $pet_type = 'Petaholic';
        }

        return $pet_type;
    }

    public function calculatorPromotionFromScore($score) {

        $promontion = 0;

        $ustype = $this->calculatorUsertypeFromScore($score);

        if ($ustype === 'Petlover') {

            $promontion = 3;
        }

        if ($ustype === 'Petadorer') {

            $promontion = 5;
        }

        if ($ustype === 'Petaholic') {

            $promontion = 7;
        }

        return $promontion;
    }

    public function updateScoreNewYear($user, $pet_paw) {

        global $mysql;

        $score = 0;

        if ($pet_paw == 1) {

            $score = 10;
        }

        if ($pet_paw == 2) {

            $score = 20;
        }

        if ($pet_paw == 3) {

            $score = 30;
        }

        if ($pet_paw >= 4) {

            $score = 40;
        }

        $score += 30;

        $sql = "update scores set score =" . $score . "  where user = '" . $user . "'";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    public function updateScoreNanaPetBirthday($user) {

        global $mysql;

        $score = 0;

        $score = GetOneRow('user,score', 'scores', "user = '" . $user . "'");

        $score = $score['score'];

        $score +=30;

        $sql = "update scores set score =" . $score . "  where user = '" . $user . "'";

        $mysql->setQuery($sql);

        $mysql->query();
    }

    function updateScoreUser($user, $action, $score, $comment) {

        $usrScore = GetOneRow("score", "scores", "user = '" . $user . "'");

        $arrIns = array("user" => $user,
            "action" => $action,
            "score" => $score,
            "action_date" => time(),
            "comment" => $comment
        );

        if (empty($usrScore)) {

            $arrInsNew = array("user" => $user, "score" => $score);

            insert("scores", $arrIns);

            insert("tbl_history_score", $arrIns);
        } else {

            $arrUp = array("score" => ($score + $usrScore["score"]), "user" => $user);

            update("scores", $arrUp, "user='" . $user . "'");

            insert("tbl_history_score", $arrIns);
        }
    }

    function resetScore($user) {

        $usrScore = GetOneRow("score", "scores", "user = '" . $user . "'");

        $pet_paw = $this->calculatorPetPawFromScore($usrScore['score']);

        $scoreUp = 0;

        if ($pet_paw == 1) {

            $scoreUp = 10;
        }

        if ($pet_paw == 2) {

            $scoreUp = 20;
        }

        if ($pet_paw == 3) {

            $scoreUp = 30;
        }

        if ($pet_paw >= 4) {

            $scoreUp = 40;
        }

        $arrData = array("score" => $scoreUp);

        update("scores", $arrData, "user = '" . $user . "'");
    }

}

?>