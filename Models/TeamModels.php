<?php

class TeamModels {
    private $conn;

    public function __construct($conn) {
        $this->link = $conn;
    }

    public function getAllTeams() {
        $sql = "select * from teams";
        $results = $this->link->query($sql);
        $data = [];
        if($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function joinTeam($competition_slug, $team_id) {

        // get competitoin_id 
        $get_competition_id = "select id , max_teams from competitions where slug = '$competition_slug'";
        $competition = $this->link->query($get_competition_id)->fetch_assoc();
        $competition_id = $competition['id'];
        
        // check team is not allowed 
        $checkTeamAllwed = "SELECT team_id from teams t
        left join allowed_provinces ap on t.team_province_id = ap.province_id
        left join competition_registered_teams crt on crt.competition_id = ap.competition_id
        where t.id = '$team_id'
        ";
        $checkTeam = $this->link->query($checkTeamAllwed)->fetch_assoc();
  
        if($checkTeam['team_id'] == null){
            return "team is not allowed";
        }

        // check team aleady join 
        $checkAleadyJoin = "SELECT id from competition_registered_teams 
        where competition_id = '$competition_id'
        and team_id = '$team_id'
        ";

        $check = $this->link->query($checkAleadyJoin)->fetch_assoc();
        if($check){
            return "team aleady join";
        }


        // check aleady full 
        $checkAleadyFull = "SELECT count(competition_id) as max_teams from competition_registered_teams 
        where competition_id = '$competition_id'
        ";

        $checkAleadyFull = $this->link->query($checkAleadyFull)->fetch_assoc();
        $max_teams = $competition['max_teams'];
        if($checkAleadyFull['max_teams'] >= $max_teams){
            return "team aleady full";
        }

        // regsiter competition
        $sql = "INSERT INTO `competition_registered_teams` (`id`, `competition_id`, `team_id`) 
        VALUES (NULL, '$competition_id', '$team_id');";

        // query
        $result = $this->link->query($sql);
        if($result) {
            // ส่ง competition_slug กลับไปหน้าเดิม
            return $competition_slug;
        }else {
            return false;
        }
    }
}

?>