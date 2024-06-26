<?php

class CompetitionModels {
    private $conn;

    public function __construct($conn) {
        $this->link = $conn;
    }

    public function getAllProv() {
        $sql = "select * from provinces";
        $results = $this->link->query($sql);
        $data = [];
        if($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function addComps($name, $slug, $max_teams, $banner) {
        $sql = "insert into competitions values(NULL,'$name','$slug','$max_teams','$banner')";
        $result = $this->link->query($sql);
        if($result) {
            return mysqli_insert_id($this->link);
        }else {
            return false;
        }
    }

    public function addAllowedProv($CompId, $ProvId) {
        $sql = "insert into allowed_provinces values(NULL,'$CompId','$ProvId')";
        $result = $this->link->query($sql);
        if($result) {
            return true;
        }else {
            return false;
        }
    }

    public function getCompsList() {
        $sql = "select c.*,count(ap.province_id) as count_province
                from competitions c
                left join allowed_provinces ap on c.id = ap.competition_id
                group by c.id
                order by c.id desc";
        $results = $this->link->query($sql);
        $data = [];
        if($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getCompSlug() {
        $slug = $_GET['competition_slug'];

        $sql = "select c.*,count(ap.province_id) as count_province
                from competitions c
                left join allowed_provinces ap on c.id = ap.competition_id
                where c.slug = '$slug'";
        $results = $this->link->query($sql);
        $data = [];
        if($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getCompId($CompId) {
        $sql = "select * from allowed_provinces ap
                left join provinces p on ap.province_id = p.id
                where ap.competition_id = '$CompId'";
        $results = $this->link->query($sql);
        $data = [];
        if($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function addTeam($team_name, $team_province, $team_logo) {
        $sql = "insert into teams values(NULL,'$team_name','$team_province','$team_logo')";
        $result = $this->link->query($sql);
        if($result) {
            return true;
        }else {
            return false;
        }
    }
}

?>