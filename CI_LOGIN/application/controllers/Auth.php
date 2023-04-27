<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

        public function __construct(){ //부모클래스 생성자 호출
                parent::__construct();
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->model('Users_model');
        }

	public function index()
	{   
                $this->login();
	}

        public function login(){

                //로그인 실패시 사용할 메세지
                $msg = "";

                if($this->input->post('password'))
                {
                //로그인 체크
                $stat = $this->check_login();
                $msg = $stat['msg']; //로그인 오류가 있으면 표시함

                        if($stat['result']=='ok') //로그인성공(관리자/일반사용자인지 확인)
                        {
                                if($this->session->userdata('role')=='admin_user')
                                redirect('Auth/admin_main_menu');
                        else
                                redirect('Auth/user_main_menu');

                        return;
                        }
                }
                else
                {
                $this->session->sess_destroy();//세션을 삭제하고 사용자에게 다시 정보요구
                }

                $view_setup['msg']=$msg;//모델로부터 얻은 msg정보를 뷰의 view_setup 변수로 넘겨준다.
                $this->load->view('login.php',$view_setup);//로그인뷰를 사용자에게 보여줌
        }

        public function check_login(){
                $user_name = $this->input->post('user_name');
                $password = $this->input->post('password');

                $ret = array();
                // 로그인이 정상인지 확인하고 $row를 가져옴
                $user_record=$this->Users_model->check_login($user_name,$password);

                if($user_record){
                $this->session->set_userdata('user_id', $user_record->id);
                $this->session->set_userdata('user_name', $user_record->user_name);
                $this->session->set_userdata('role',$user_record->role);

                $ret['result']='ok';
                $ret['msg']='로그인 성공!';
                }
                else{
                //로그인실패
                $ret['result']='notok';

                //사용자에게 로그인 실패알림
                $ret['msg']='로그인 실패';
                }

                return $ret;
                }

        public function logout(){
                $this->session->sess_destroy();
                redirect('Auth');
        }

        public function admin_main_menu(){
                $view_setup['uid']=$this->session->userdata('user_id');
                $view_setup['user_name']=$this->session->userdata('user_name');
                $view_setup['role']=$this->session->userdata('role');
                
                $view_setup['menu']="사용자 추가/사용자 수정/사용자 삭제";
                $this->load->view('login_in.php',$view_setup);
        }

        public function user_main_menu(){
                $view_setup['uid']=$this->session->userdata('user_id');
                $view_setup['user_name']=$this->session->userdata('user_name');
                $view_setup['role']=$this->session->userdata('role');
                
                $view_setup['menu']="콘텐츠보기/계정 수정/로그아웃";
                $this->load->view('login_in.php',$view_setup);
        }
}
/*
ci헬퍼로 로그인 폼을 만들고 동작.
사용자 정보를 인증하기위해 users_model을 로딩함
정보가 올바흐면 사용자기록을 세션에 기록, 모델이 리턴하는 사용자의 역할에 따라 관리자/사용자메소드 호출

*/