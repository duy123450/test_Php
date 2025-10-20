<pre>
    <?php
    $filename = $_FILES['hinh']['name'];
    $tempname = $_FILES['hinh']['tmp_name'];
    $fileSave = "img/$filename";
    move_uploaded_file($tempname, $fileSave);
    echo "<img src='$fileSave' width='50%' height='50%'><br>";