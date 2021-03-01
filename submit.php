
<?php
       if(isset($_GET['FirstName']))
       {
        $f= fopen("temp.text", "r");

        $data =fread($f,filesize("temp.text"));
        $data_filter = explode("\n", $data);
        echo$data_filter[0];
        echo "<br>";
        echo$data_filter[1];
      

      for($i =0; $i < count($data_filter); $i++ )
      {
        echo $data_filter[$i];
        echo "<br>";
      }

       }
       
     ?>