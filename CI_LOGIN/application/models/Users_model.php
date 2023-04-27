<?php

class Users_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function check_login($user, $pass)
    {
        $ci = &get_instance();
        $md5_pass = md5($pass);
    
        $ci->db->start_cache();
        $sql = "SELECT *
                from users
                where user_name = '$user'
                and password = '$md5_pass'";

        $q = $ci -> db -> query($sql);
        $ci->db->flush_cache();

        if($q->num_rows())
        {
            foreach($q->result() as $row)
            return $row;
        }
            return NULL;
    }


}

// reg_user
// 111111111

// admin_user
// 222222222

/*
컨트롤러가 사용자 정보를 users테이블의 정보와 비교하는데사용. 
검증에 성공하면, 모델은 users테이블의 레코드를 반환한다.
모델이 리턴한 사용자의 역할에 따라 관리자/사용자 메뉴를 호출.
로그아웃을 클릭하면 Auth/logout을 호출해 세션을 삭제하고 로그인폼 페이지로 재지향.
*/
