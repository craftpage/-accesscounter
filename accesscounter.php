<html>
<body>
  <?php
//file open
    $filename = "counter.txt";
    try {
      $fileObj = new SplFileObject($filename, 'c+b');
    } catch (Exception $e) {
      echo '<span>ERROR</span>';
      exit();
    }

//file read
    $fileread = $fileObj->fread($fileObj->getSize());
    if($fileread === FALSE){
      echo '<span>Read error</span>';
      $filewrite = $fileObj->fwrite(0);
      if($filewrite == FALSE){
        echo '<span>Write error</span>';
      }
    } else {
      echo "{$fileread}番目のアクセスです。";
    }

//file Write
    try {
      $fileObj = new SplFileObject($filename, 'wb');
    } catch (Exception $e) {
      echo '<span>ERROR</span>';
      exit();
    }
    $counter = 0;
    $counter = (int)$fileread + 1;
    $filewrite = $fileObj->fwrite((int)$counter);
    if($filewrite == FALSE){
      echo '<span>Write error</span>';
    }
  ?>
</body>
</html>
