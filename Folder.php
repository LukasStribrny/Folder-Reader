<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Folder {
	
	/*
	1. set the path of a dir
	$this->folder->where($directory);
	
	2. You can set extension : if extension not set -> by default you will see all files
	$this->folder->extension(array('html'));
	
	3. You can set limit to read files as much as you want
	$this->folder->limit(10);
	
	or you can set it to no limit to read all files in folder -> by default the limit is set to 1 file
	$this->folder->no_limit();
	
	4. You have to use this function to read the folder
	$this->folder->read();
	
	5. You can check the folder if is not empty -> if not empty return true
	if($this->folder->not_empty()){
	
	6. You can get the files by using this function -> by default is always returning array
		$this->folder->get_files();
	}
	
	7. example 1 :
	$this->folder->where($directory);
	$this->folder->limit(10);
	$this->folder->read();
	$this->folder->get_files();
	
	8. example 2 :
	$this->folder->where($directory);
	$this->folder->read();
	$this->folder->not_empty();
	
	9. example 3 :
	$this->folder->where($directory);
	$this->folder->extension(array('html'));
	$this->folder->read();
	$this->folder->not_empty();
	
	*/
	
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