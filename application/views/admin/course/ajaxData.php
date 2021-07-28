<?php if(!empty($_POST["quality_name"])){
    //Fetch all state data
    $query = $db->query("SELECT * FROM tbl_quality WHERE quality_name = ".$_POST['quality_name']." AND status = 1 ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select type</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['quality_type'].'">'.$row['quality_type'].'</option>';
        }
    }else{
        echo '<option value="">Quality Type Not available</option>';
    }
}elseif(!empty($_POST["quality_type"])){
    //Fetch all city data
    $query = $db->query("SELECT * FROM tbl_quality WHERE quality_type = ".$_POST['quality_type']." AND status = 1 ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select Quality VALUE</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['quality_value'].'">'.$row['quality_value'].'</option>';
        }
    }else{
        echo '<option value="">Value not available</option>';
    }
}