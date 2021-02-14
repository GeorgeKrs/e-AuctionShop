<?php 

if ($pageno == 1) {
    echo "<li class='page-item'><a class='page-link disabled-link' href='?pageno=$previous_page'><i class='fas fa-angle-left'></i></a></li>";
}else{
    echo "<li class='page-item'><a class='page-link' href='?pageno=$previous_page'><i class='fas fa-angle-left'></i></a></li>";
}

if ($total_pages <=7){
    for ($counter = 1; $counter <= $total_pages; $counter++){
        if ($counter==$pageno){
            echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
        }else{
            echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>"; 
        }
    }

}elseif ($total_pages > 7){
    if ($pageno <= 4) {
        for($counter = 1; $counter < 8; $counter++){
            if ($counter == $pageno){
                echo "<li class='page-item active'><a class='page-link active'>$counter</a></li>"; 
            }else{
                echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
            }
        }

        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?pageno=$second_last'>$second_last</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?pageno=$total_pages'>$total_pages</a></li>";

    }elseif ($total_pages  > 4 && $pageno < $total_pages - 4){
        echo "<li class='page-item'><a class='page-link' href='?pageno=1'>1</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?pageno=2'>2</a></li>";
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        for (
            $counter = $pageno - $adjacents;
            $counter <= $pageno + $adjacents;
            $counter++ 
            ) {  
            if ($counter == $pageno) {
                echo "<li class='page-item active'><a class='page-link active'>$counter</a></li>"; 
            }else{
                echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                }                  
            }
        echo "<li class='page-item'><a class='page-link'>...</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?pageno=$second_last'>$second_last</a></li>";
        echo "<li class='page-item'><a class='page-link' href='?pageno=$total_pages'>$total_pages</a></li>";


    }else {
            echo "<li class='page-item'><a class='page-link' href='?pageno=1'>1</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?pageno=2'>2</a></li>";
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            for (
                $counter = $total_pages - 4;
                $counter <= $total_pages;
                $counter++
                ) 
                {
                if ($counter == $pageno) {
                    echo "<li class='page-item active'><a class='page-link active'>$counter</a></li>"; 
                }else{
                    echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
            }                   
        }

    } 
}

if ($pageno == $total_pages) {
    echo "<li class='page-item'><a class='page-link disabled-link' href='?pageno=$next_page'><i class='fas fa-angle-right'></i></a></li>";
}else{
    echo "<li class='page-item'><a class='page-link' href='?pageno=$next_page'><i class='fas fa-angle-right'></i></a></li>";
}
?>