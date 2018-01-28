<? 

class  c_HiddenVars  { 

        function  display($a)  { 
                $c  =  Count($a); 
                for  ($i  =  0,  Reset($a);  $i  <  $c;  $i++,  Next($a))  { 
                        $k  =  Key($a);  $v  =  $a[$k]; 
                        if  (is_array($v))  { 
                                $vc  =  Count($v); 
                                for  (Reset($v),  $vi  =  0;  $vi  <  $vc; $vi++,  Next($v))  { 
                                        $vk  =  Key($v); 
                                        echo  "<input  type=hidden  name=\"$k\[$vk\]\"  value=\"".htmlspecialchars($v 
[$vk]). "\">\n"; 
                                } 
                        }  else  { 
                                echo  "<input  type=hidden  name=\"$k\"  value=\"".htmlspecialchars($v). "\">\n"; 
                        } 
                } 
        } 

        function  get()  { 
                global  $HTTP_GET_VARS; 
                if  (is_array($HTTP_GET_VARS))    {  $this->display 
($HTTP_GET_VARS);  } 
        } 

        function  post()  { 
                global  $HTTP_POST_VARS; 
                if  (is_array($HTTP_POST_VARS))  {  $this->display 
($HTTP_POST_VARS);  } 
        } 
         
        function  all()  { 
                $this->get(); 
                $this->post(); 
        } 
}; 

?> 
