<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mylibrary
{

	var $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->library("email");
	}

	function sendMail($config)
	{
		$this->ci->email->clear(TRUE);

		if (empty($config)) {
			echo "config is missing";
			return false;
		} else {
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.mailgun.org';
			$config['smtp_port'] = '465';
			$config['smtp_user'] = SMTP_USER;
			$config['smtp_pass'] = SMTP_PASS;

			$config['SMTPSecure'] = 'SSL';
			$config['SMTPAuth'] = TRUE;

			$config['smtp_timeout'] = '4';
			$config['crlf'] = '\n';
			$config['newline'] = '\r\n';
			$this->ci->email->initialize($config);

			$config['from'] = empty($config['from']) ? 'hello@prosapient.com' : $config['from'];
			$config['from_name'] = ($config['from_name'] != '') ? FROM_NAME : PROJECT_NAME;

			$this->ci->email->set_header('Sender', $config['from']);

			foreach ($config['headers'] as $key => $value) {
				$this->ci->email->set_header($key, $value);
			}

			for ($i = 0; $i < count($config['buffer_attachment']); $i++) {
				$this->ci->email->attach($config['buffer_attachment'][$i]['file'], $config['buffer_attachment'][$i]['disposition'], $config['buffer_attachment'][$i]['newname'], $config['buffer_attachment'][$i]['mime']);
			}

			$this->ci->email->set_mailtype("html");
			$this->ci->email->from($config['from'], $config['from_name']);
			$this->ci->email->to($config['to']);
			if ($config['cc'] != '') {
				$this->ci->email->cc($config['cc']);
			}
			if ($config['bcc'] != '') {
				$this->ci->email->bcc($config['bcc']);
			}
			if ($config['reply_to'] != '') {
				$this->ci->email->reply_to($config['reply_to']);
			}
			$this->ci->email->subject($config['subject']);
			$this->ci->email->message($config['mail_body']);
			if ($this->ci->email->send()) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function calculateResizeImage($width, $height, $thumb_width, $thumb_height)
	{
		$image_height = floor(($height / $width) * $thumb_width);
		$image_width = $thumb_width;

		if ($image_height > $thumb_height) {
			$image_width = floor(($width / $height) * $thumb_height);
			$image_height = $thumb_height;
		}
		$resultArray = array('width' => $image_width, 'height' => $image_height);

		return $resultArray;
	}

	public function upload_image($array)
	{
		$this->ci->load->helper('form');
		$config['upload_path'] = $array['path'];
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|JPG';
		$config['file_name'] = $array['image_name'];

		makeDirectoryWritable($config['upload_path']);

		$this->ci->load->library('upload', $config);

		$this->ci->upload->initialize($config);
		$this->ci->upload->set_allowed_types('gif|jpg|png|jpeg|JPEG|PNG|JPG');
		if (!$this->ci->upload->do_upload($array['image_pet_name'])) {
			$data = array('msg' => $this->ci->upload->display_errors());
			return FALSE;
		} else {
			return $this->ci->upload->data();
		}
	}

	public function upload_image_pdf($array)
	{
		//print_r($array);exit;
		$this->ci->load->helper('form');
		$config['upload_path'] = $array['path'];
		$config['allowed_types'] = 'pdf';
		$config['file_name'] = $array['image_name'];

		makeDirectoryWritable($config['upload_path']);

		$this->ci->load->library('upload', $config);

		$this->ci->upload->initialize($config);
		$this->ci->upload->set_allowed_types('pdf');
		if (!$this->ci->upload->do_upload($array['image_pet_name'])) {
			$data = array('msg' => $this->ci->upload->display_errors());
			return FALSE;
		} else {
			return $this->ci->upload->data();
		}
	}

	public function create_thumb($array)
	{
		$imageinfo = getimagesize($array['full_path']);
		$thumbSize = $this->calculateResizeImage($imageinfo[0], $imageinfo[1], $array['width'], $array['height']);
		$check_thumb = '';
		if ($array['table'] == 'kg_artist_has_image') {
			$check_thumb = $this->checkThumb($array['id'], 'fk_artist', $array['table'], $thumbSize['width'], $thumbSize['height']);
		} else if ($array['table'] == 'kg_artwork_has_image') {
			$check_thumb = $this->checkThumb($array['id'], 'fk_artwork', $array['table'], $thumbSize['width'], $thumbSize['height']);
		} else if ($array['table'] == 'kg_banners_has_image') {
			$check_thumb = $this->checkThumb($array['id'], 'fk_banner', $array['table'], $thumbSize['width'], $thumbSize['height']);
		}
		if (is_array($check_thumb)) {
			return $check_thumb;
		}
		$this->ci->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = $array['config']['source_image'];
		$config['create_thumb'] = $array['config']['create_thumb'];
		$config['maintain_ratio'] = $array['config']['maintain_ratio'];
		$config['new_image'] = $array['config']['new_image'];
		$config['thumb_marker'] = $array['config']['thumb_marker'] ? '_' . $thumbSize['width'] . 'x' . $thumbSize['height'] : "_thumb";
		$config['width'] = $thumbSize['width'];
		$config['height'] = $thumbSize['height'];
		$this->ci->image_lib->clear();
		$this->ci->image_lib->initialize($config);
		if (!$this->ci->image_lib->resize()) {
//            echo $this->ci->image_lib->display_errors('<p>', '</p>');
			return FALSE;
		} else {
			$full_dst_path = explode('/', $this->ci->image_lib->full_dst_path);
			return array('width' => $config['width'], 'height' => $config['height'], 'image_name' => $full_dst_path[count($full_dst_path) - 1]);
		}
	}

	public function checkThumb($id, $field, $table, $width, $height)
	{
		$check_sql = $this->ci->db->where(array(
			$field => $id,
			'var_width' => $width,
			'var_height' => $height
		))
			->from($table)
			->get();
		if ($check_sql->num_rows() > 0) {
			return array('width' => $width, 'height' => $height, 'image_name' => $check_sql->row()->var_image);
		} else {
			return FALSE;
		}
	}

	public function copyFile($array)
	{
//        print_r($array);exit;
		$filename = $array['image_name'];
		$filenameexp = explode('.', $filename);
		$filename = $array['reson_type'] . time() . '.' . $filenameexp[1];
		$file = PATHFORUPLOADFOLDER . $array['source_path'] . $array['image_name'];
		$filenew = PATHFORUPLOADFOLDER . $array['dest_path'] . $filename;
		//print_r($filenew);exit;
		if (!copy($file, $filenew)) {
			return FALSE;
		} else {
			$filenamenew = explode('.', $filename);
			$arraynew['image_name'] = $filenamenew[0];
			$arraynew['path'] = $array['dest_path'];
			$arraynew['extension'] = $filenamenew[1];
			$arraynew['reson'] = $array['reson'];
			$thumb = $this->create_thumb($arraynew);
			if ($thumb) {
				return $filename;
			} else {
				return FALSE;
			}
		}
	}

	public function pageNotFound()
	{
		$data['var_meta_title'] = '404 Page Not Found';
		$data['page'] = 'front/pagenotfound';
		$this->ci->output->set_status_header('404'); // setting header to 404
		$this->ci->load->view(FRONT_LAYOUT, $data); //loading view
	}

}

/* End of file Someclass.php */
