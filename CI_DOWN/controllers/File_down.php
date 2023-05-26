<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_down extends CI_Controller {
	function __construct(){
		parent:: __construct();
			$this -> load -> helper('download');
			$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('file');
	}

	//첨부파일 다운로드
	public function file_down(){
		$data = file_get_contents( './file/goods.zip' ); //다운받을 파일 이름 (경로 꼭 확인하자 !!!!! 가장 기본파일 index.php를 기준으로 경로적기)
		$name = 'goods.zip'; //다운받을 때 파일 이름
		force_download( $name, $data);
		
	}

	//이미지 다운로드
	public function image_down(){

		$name = $this->input->get_post('name');

		if($name === 1){
			if(file_exists('./file/1png.png')){
				$data = file_get_contents( './file/1png.png' ); //다운받을 파일 이름
				$file = '쿠로미.png'; //다운받을 때 파일 이름
				force_download( $file, $data);
			}else{
				echo "<script> alert('다운로드 실패 ㅠㅠ'); history.back(); </script>";
				// redirect("/file_down");
			}
		}else if($name === 2){
			if(file_exists('./file/2png.png')){
				$data = file_get_contents( './file/2png.png' ); //다운받을 파일 이름
				$file = '마이멜로디.png'; //다운받을 때 파일 이름
				force_download( $file, $data);
			}else{
				echo "<script> alert('다운로드 실패 ㅠㅠ'); history.back(); </script>";
				// redirect("/file_down");
			}
		}else if($name = 3){
			if(file_exists('./file/1png.png')){
				$data = file_get_contents( './file/1png.png' ); //다운받을 파일 이름
				$file = '쿠로미.png'; //다운받을 때 파일 이름
				force_download( $file, $data);
			}else{
				echo "<script> alert('다운로드 실패 ㅠㅠ'); history.back(); </script>";
				// redirect("/file_down");
			}
		}else{
			if(file_exists('./file/1png.png')){
				$data = file_get_contents( './file/1png.png' ); //다운받을 파일 이름
				$file = '쿠로미.png'; //다운받을 때 파일 이름
				force_download( $file, $data);
			}else{
				echo "<script> alert('다운로드 실패 ㅠㅠ'); history.back(); </script>";
				// redirect("/file_down");
			}
		}
		
	}
	
}
