<?php

/*
| Larave's cache system which we use for storing the encrypted text doesn't have a cleanup method.
| So here we'll manually find all the files and clean up. Note, that this only currently supports
| the file system cache driver. 
*/
class Clean_Task {

    public function run()
    {
    	// Find all files in the cache storage directory
		$items = new FilesystemIterator(path('storage').'cache'.DS, FilesystemIterator::SKIP_DOTS);

		// Spin through them and use the cache system to check and clear expired ones
		foreach ($items as $item)
		{
			// Some systems appear to not honor the FilesystemIterator::SKIP_DOTS constant so we'll manually check
			$filename = $item->getFilename();

			if($filename{0} != '.')
			{
				Cache::has($filename);
				echo $filename."\n";
			}
		}   	
    }

}