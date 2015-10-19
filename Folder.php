<?php
class Folder {
	
	public $file_limit = 1;
	public $array_extension = array();
	public $files = array();
	public $read_folder;
	
	public function __construct(){
		set_time_limit(0);
	}
	
	public function where($folder){
		$this->read_folder = $folder;
	}
	
	public function get_files(){
		return $this->files;
	}
	
	public function not_empty(){
		return ( count ( $this->files ) > 0 ) ? TRUE : FALSE;
	}
	
	public function limit($limit=false){
		if($limit==true){
			$this->file_limit = $limit;
		}else{
			die('You must set the limit of files!');
		}
	}
	
	public function no_limit(){
		$this->file_limit = 0;
	}
	
	public function extension($extension){
		if(is_array($extension)){
			$this->array_extension = $extension;
		}else{
			die('The extension for files must be in array!');
		}
		
	}
	
	public function read(){
			// Open a directory, and read its contents
			$thisFile = 1;
			$dir = realpath($this->read_folder);
			if (is_dir($dir)){
			  if ($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false){
					if(!in_array($file,array('.','..'))){
						if(!empty($this->array_extension)){
							$separate = explode('.',$file);
							if(in_array(end($separate),$this->array_extension)){
								if($this->file_limit==true){
									if($thisFile<=$this->file_limit){
										$this->files[$thisFile++] = $dir.'/'.$file;
									}else{
										break;
									}
								}else{
										$this->files[$thisFile++] = $dir.'/'.$file;
								}
							}
						}else{
								if($this->file_limit==true){
									if($thisFile<=$this->file_limit){
										$this->files[$thisFile++] = $dir.'/'.$file;
									}else{
										break;
									}
								}else{
										$this->files[$thisFile++] = $dir.'/'.$file;
								}
						}
					}
				}
				closedir($dh);
			  }
			}else{
				die('The path is not a folder,please set the correct path!');
			}
	}
}
?>
