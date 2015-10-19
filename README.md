# Guide of Folder-Reader
Read files from folder with/without limitation of files and file extension
# You can use it in codeigniter
 by adding to library and call it by :
 
 $this->load->library('Folder');
 
 $this->folder->the_function_you_want_to_use();
 
	1. set the path of a dir
	$this->folder->where($folder);
	
	2. You can set extension : if extension not set -> by default you will see all files
	$this->folder->extension(array('html'));
	
	3. You can set limit to read files as much as you want
	$this->folder->limit(10);
	
	or you can set it to no limit to read all files in folder -> by default the limit is set to 1 file
	$this->folder->no_limit();
	
	4. You have to use this function to read the folder
	$this->folder->read();
	
	5. You can check the folder if is not empty -> if not empty return true
	$this->folder->not_empty()
	
	6. You can get the files by using this function -> by default is always returning array
		$this->folder->get_files();
	after using get_files() you can use functions like print_r(),foreach(),for() or something
	similar to proccess the files


# Check the examples to understand how to use it
#	example 1 :
	$this->folder->where($folder);
	$this->folder->limit(10);
	$this->folder->read();
	$this->folder->get_files();
	
#	example 2 :
	$this->folder->where($folder);
	$this->folder->read();
	if($this->folder->not_empty()){
	  $this->folder->limit(60);
	  $this->folder->read();
		$this->folder->get_files();
	}
	
#	example 3 :
	$this->folder->where($folder);
	$this->folder->extension(array('html'));
	$this->folder->read();
	if($this->folder->not_empty()){
	  $this->folder->no_limit();
	  $this->folder->read();
		$this->folder->get_files();
	}
	
#	example 4 :
	$this->folder->where($folder);
	$this->folder->read();
	if($this->folder->not_empty()){
	  $this->folder->no_limit();
	  $this->folder->read();
		$this->folder->get_files();
	}

 
