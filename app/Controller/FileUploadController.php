<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));		

		if ($this->request->is('post')) {
			$fileobject = $this->data[FileUpload]['file'];			
			$fileName = $fileobject['name'];
			$uploadFolder = '../webroot/files/';
			$destination = $uploadFolder.$fileName;		
			if(!file_exists($uploadFolder)){
				mkdir($uploadFolder);
			}
			if(move_uploaded_file($fileobject['tmp_name'], $destination)){				
				$this->FileUpload->create();								
				$this->FileUpload->name = $fileName;
				$this->FileUpload->path = $destination;
				$this->FileUpload->created = date('Y-m-d H:i:s');

				if($this->FileUpload->save($this->FileUpload)){
					$this->setFlash('File upload successed.');
				}
				else{
					$this->setFlash('Unable to upload file, please try again.');
				}				
			}          
		 }
		 
		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}
}