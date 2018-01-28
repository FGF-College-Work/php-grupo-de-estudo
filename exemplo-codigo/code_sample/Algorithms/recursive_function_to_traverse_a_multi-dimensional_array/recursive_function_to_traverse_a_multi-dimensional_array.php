<? 
#   A recursive function to traverse a multi-dimensional array 
#   where the dimensions are not known 
# 

function get_array_elems($arrResult, $where="array"){ 
           while(list($key,$value)=each($arrResult)){ 
                 if (is_array($value)){ 
                    get_array_elems($value, $where."[$key]"); 
                 } 
                 else { 
                       for ($i=0; $i<count($value);$i++){ 
                             echo $where."[$key]=".$value."<BR>\n"; 
                       } 
                 } 
           } 
  } 

  get_array_elems($arrResult); 

?> 
