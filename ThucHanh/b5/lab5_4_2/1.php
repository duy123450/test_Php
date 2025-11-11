<form action="./2.php" method="get">
    Nhap ten sp: <input type="text" name="pro_name" id=""><br>
    
    Cach tim: <br>
    <input type="radio" name="tim" value="gan_dung" id="gan_dung"> 
    <label for="gan_dung">Gan dung</label> <br> 
    
    <input type="radio" name="tim" value="chinh_xac" id="chinh_xac"> 
    <label for="chinh_xac">Chinh xac</label> <br> 

    Loai sp:
    <select name="pro_select[]" id="pro_select" multiple size="4">
        <option value="" disabled selected>-- Chon loai sp --</option>
        <option value="all">Tat ca</option> 
        <option value="Loai 1">Loai 1</option> 
        <option value="Loai 2">Loai 2</option>
        <option value="Loai 3">Loai 3</option>
    </select> <br>
    
    <input type="submit" value="Submit">
</form>