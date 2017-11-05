<?php
echo "<script>console.log("."'"."log:: touch common.php"."'".");</script>";
?>
<?php
include_once 'class.common.user.php';


/*All the common Model classes are listed here*/
class PermissionXML{
    var $id;  // id of permission
    var $name;    // name of permission
    var $category;  // category of permission
    
    //map the tag, value pair with the members serially
    //used in xml to permission mapping
    function __construct ($row) {

        //todo: check for the exception situation

        foreach ($row as $k=>$v)
            $this->$k = $row[$k];

    }

}

class MenuXML{
    private $_ParentTitle;
    public $_Child;
    private $_Title;
    private $_Permissions;
    private $_Link;
    private $_Visible=0; // by default every menu is in visible

    public function getTitle(){
        return $this->_Title;
    }

    public function setTitle($Title){
        $this->_Title = $Title;
    }


    public function getParentTitle(){
        return $this->_ParentTitle;
    }

    public function setParentTitle($ParentTitle){
        $this->_ParentTitle = $ParentTitle; 
    }

    public function getPermissions(){
        return $this->_Permissions;
    }

    public function setPermissions($Permissions){
        $this->_Permissions = $Permissions;
    }

    public function getLink(){
        return $this->_Link;
    }

    public function setLink($Link){
        $this->_Link = $Link;
    }

    public function setVisible($Visible){
        $this->_Visible = $Visible;
    }

    public function isVisible(){

        return $this->_Visible;
    }

}


class Result{

    private $_IsSuccess=0;
    private $_ResultObject;

    public function setIsSuccess($IsSuccess){
        $this->_IsSuccess = $IsSuccess;
    }

    public function getIsSuccess(){

        return $this->_IsSuccess;
    }

    public function setResultObject($ResultObject){
        $this->_ResultObject = $ResultObject;
    }

    public function getResultObject(){

        return $this->_ResultObject;
    }

}



class PermissionUtil{



    public static $DISCUSSION_C='DISCUSSION_C';
    public static $DISCUSSION_R='DISCUSSION_R';
    public static $DISCUSSION_U='DISCUSSION_U';
    public static $DISCUSSION_D='DISCUSSION_D';

    public static $DISCUSSION_CAT_C='DISCUSSION_CAT_C';
    public static $DISCUSSION_CAT_R='DISCUSSION_CAT_R';
    public static $DISCUSSION_CAT_U='DISCUSSION_CAT_U';
    public static $DISCUSSION_CAT_D='DISCUSSION_CAT_D';

    public static $DISCUSSION_COMMENT_C='DISCUSSION_COMMENT_C';
    public static $DISCUSSION_COMMENT_R='DISCUSSION_COMMENT_R';
    public static $DISCUSSION_COMMENT_U='DISCUSSION_COMMENT_U';
    public static $DISCUSSION_COMMENT_D='DISCUSSION_COMMENT_D';


    public static $HALL_C='HALL_C';
    public static $HALL_R='HALL_R';
    public static $HALL_U='HALL_U';
    public static $HALL_D='HALL_D';




    public static $MEDICAL_DOCTOR_C='MEDICAL_DOCTOR_C';
    public static $MEDICAL_DOCTOR_R='MEDICAL_DOCTOR_R';
    public static $MEDICAL_DOCTOR_U='MEDICAL_DOCTOR_U';
    public static $MEDICAL_DOCTOR_D='MEDICAL_DOCTOR_D';

    public static $MEDICAL_PATIENT_C='MEDICAL_PATIENT_C';
    public static $MEDICAL_PATIENT_R='MEDICAL_PATIENT_R';
    public static $MEDICAL_PATIENT_U='MEDICAL_PATIENT_U';
    public static $MEDICAL_PATIENT_D='MEDICAL_PATIENT_D';

    public static $MEDICAL_NURSE_C='MEDICAL_NURSE_C';
    public static $MEDICAL_NURSE_R='MEDICAL_NURSE_R';
    public static $MEDICAL_NURSE_U='MEDICAL_NURSE_U';
    public static $MEDICAL_NURSE_D='MEDICAL_NURSE_D';

    public static $MEDICAL_STAFF_C='MEDICAL_STAFF_C';
    public static $MEDICAL_STAFF_R='MEDICAL_STAFF_R';
    public static $MEDICAL_STAFF_U='MEDICAL_STAFF_U';
    public static $MEDICAL_STAFF_D='MEDICAL_STAFF_D';





    public static $NEWS_TEACHER_C='NEWS_TEACHER_C';
    public static $NEWS_TEACHER_R='NEWS_TEACHER_R';
    public static $NEWS_TEACHER_U='NEWS_TEACHER_U';
    public static $NEWS_TEACHER_D='NEWS_TEACHER_D';


    public static $NEWS_STUDENT_CR_ACR_C='NEWS_STUDENT_CR_ACR_C';
    public static $NEWS_STUDENT_CR_ACR_R='NEWS_STUDENT_CR_ACR_R';
    public static $NEWS_STUDENT_CR_ACR_U='NEWS_STUDENT_CR_ACR_U';
    public static $NEWS_STUDENT_CR_ACR_D='NEWS_STUDENT_CR_ACR_D';

    public static $NEWS_STUDENT_C='NEWS_STUDENT_C';
    public static $NEWS_STUDENT_R='NEWS_STUDENT_R';
    public static $NEWS_STUDENT_U='NEWS_STUDENT_U';
    public static $NEWS_STUDENT_D='NEWS_STUDENT_D';




    public static $POSITION_C='POSITION_C';
    public static $POSITION_R='POSITION_R';
    public static $POSITION_U='POSITION_U';
    public static $POSITION_D='POSITION_D';

    public static $ROLE_C='ROLE_C';
    public static $ROLE_R='ROLE_R';
    public static $ROLE_U='ROLE_U';
    public static $ROLE_D='ROLE_D';

    public static $SCHOOL_C='SCHOOL_C';
    public static $SCHOOL_R='SCHOOL_R';
    public static $SCHOOL_U='SCHOOL_U';
    public static $SCHOOL_D='SCHOOL_D';


    public static $USER_C='USER_C';
    public static $USER_R='USER_R';
    public static $USER_U='USER_U';
    public static $USER_D='USER_D';

    public static $DISCIPLINE_C='DISCIPLINE_C';
    public static $DISCIPLINE_R='DISCIPLINE_R';
    public static $DISCIPLINE_U='DISCIPLINE_U';
    public static $DISCIPLINE_D='DISCIPLINE_D';
   
    public static $PERMISSION_C='PERMISSION_C';
    public static $PERMISSION_R='PERMISSION_R';
    public static $PERMISSION_U='PERMISSION_U';
    public static $PERMISSION_D='PERMISSION_D';


}

class PageUtil{
    //Medical Service
    public static $MEDICAL_P_SEE_DOCTORS_LIST='med_doctors_list.php';
    public static $MEDICAL_P_SEE_PRESCRIPTION = 'med_p_prescription.php';
    public static $MEDICAL_CREATE_PRESCRIPTION = 'med_create_prescription.php';
    public static $MEDICAL_PRESCRIPTION_HISTORY = 'med_prescription_history.php';
    public static $MEDICAL_SERIAL_LIST = 'med_serial_list.php';
    public static $MEDICAL_MEDICINE_STOCK = 'med_medicine_stock.php';
    public static $MEDICAL_GIVE_MEDICINES = 'med_give_medicines.php';
    public static $MEDICAL_SERIALS = 'med_serials.php';


    //News Events
    public static $NEWS_HOME = 'news_home.php';



    public static $DISCUSSION_CAT='discussion_category.php';
    public static $DISCUSSION='discussion.php';
    public static $DISCUSSION_COMMENT='discussion_comment.php';
    public static $DISCUSSION_SEARCH='discussion_search.php';
    public static $DISCUSSION_ANSWERED='discussion_answered.php';
    public static $DISCUSSION_UNANSWERED='discussion_unanswered.php';
    public static $DISCUSSION_LIST='discussion_list.php';
    public static $DISCUSSION_RECENT='discussion_recent.php';

    public static $HALL='hall.php';

    public static $ERROR='error.php';
    public static $HOME='home.php'; 
    public static $LOGIN='login.php';
    public static $UPLOAD = 'upload.php';

    
    public static $PERMISSION='permission.php';
    public static $ROLE='role.php';
  
    public static $DISCIPLINE='discipline.php';
    public static $SCHOOL='school.php';
    public static $POSITION='position.php';



    public static $USER='user.php';
    public static $USER_NEW='user_new.php';
    public static $USER_DETAILS='user_details.php';
    public static $USER_SEARCH='user_search.php';
    public static $USER_FORGOT_PASSWORD='forgot_password.php';

    
   
}

class RouteUtil{

    private static $s_Routes; //The single instance
    private static $s_instance; //The single instance


    private function __construct(){
        
        self::$s_Routes = array();

        //add new page and routing address here always

        //Medical Service
        self::$s_Routes[PageUtil::$MEDICAL_P_SEE_DOCTORS_LIST]  = "modules/medical/ui/view.med_doctors_list.php";

        self::$s_Routes[PageUtil::$MEDICAL_P_SEE_PRESCRIPTION]  = "modules/medical/ui/view.med_p_prescription.php";
        // self::$s_Routes[PageUtil::$UPLOAD]  = "modules/medical/ui/upload.php";
        self::$s_Routes[PageUtil::$MEDICAL_CREATE_PRESCRIPTION]  = "modules/medical/ui/view.med_create_prescription.php";

        self::$s_Routes[PageUtil::$MEDICAL_PRESCRIPTION_HISTORY]  = "modules/medical/ui/view.med_prescription_history.php";
        self::$s_Routes[PageUtil::$MEDICAL_SERIAL_LIST]  = "modules/medical/ui/view.med_serial_list.php";
        self::$s_Routes[PageUtil::$MEDICAL_MEDICINE_STOCK]  = "modules/medical/ui/view.med_medicine_stock.php";
        self::$s_Routes[PageUtil::$MEDICAL_GIVE_MEDICINES]  = "modules/medical/ui/view.med_give_medicines.php";
        self::$s_Routes[PageUtil::$MEDICAL_SERIALS]  = "modules/medical/ui/view.med_serials.php";
        self::$s_Routes[PageUtil::$UPLOAD]  = "modules/medical/ui/view.upload.php";

        //News Events
        self::$s_Routes[PageUtil::$NEWS_HOME]  = "modules/newsevents/ui/view.news_home.php";





        self::$s_Routes[PageUtil::$DISCUSSION_CAT]  =  "modules/forum/ui/view.discussionCategory.php";
        self::$s_Routes[PageUtil::$DISCUSSION]      =  "modules/forum/ui/view.discussion.php";
        self::$s_Routes[PageUtil::$DISCUSSION_COMMENT] = "modules/forum/ui/view.comment.php";
        self::$s_Routes[PageUtil::$DISCUSSION_LIST]   = "modules/forum/ui/view.discussionList.php";
        self::$s_Routes[PageUtil::$DISCUSSION_SEARCH]   = "modules/forum/ui/view.searchDiscussion.php";
        self::$s_Routes[PageUtil::$DISCUSSION_RECENT]  = "modules/forum/ui/view.mostRecent.php";
        self::$s_Routes[PageUtil::$DISCUSSION_ANSWERED]  = "modules/forum/ui/view.answered.php";
        self::$s_Routes[PageUtil::$DISCUSSION_UNANSWERED]  = "modules/forum/ui/view.unanswered.php";




         self::$s_Routes[PageUtil::$HALL]  = "modules/hall/ui/view.hall.php";



         self::$s_Routes[PageUtil::$HOME]             =   "modules/dashboard/ui/view.home.php";
         self::$s_Routes[PageUtil::$LOGIN]            =   "modules/dashboard/ui/view.login.php";

         self::$s_Routes[PageUtil::$ROLE]   =   "modules/user/ui/view.role.php";
         self::$s_Routes[PageUtil::$DISCIPLINE]       =   "modules/user/ui/view.discipline.php";  
         self::$s_Routes[PageUtil::$PERMISSION]       =   "modules/user/ui/view.permission.php";
         self::$s_Routes[PageUtil::$POSITION]         =   "modules/user/ui/view.position.php";
         self::$s_Routes[PageUtil::$SCHOOL]           =   "modules/user/ui/view.school.php";



         self::$s_Routes[PageUtil::$USER] =   "modules/user/ui/view.user.php";
         self::$s_Routes[PageUtil::$USER_DETAILS] =   "modules/user/ui/view.user_details.php";
         self::$s_Routes[PageUtil::$USER_NEW] =   "modules/user/ui/view.user_new.php";
         self::$s_Routes[PageUtil::$USER_SEARCH] =   "modules/user/ui/view.user_search.php";
         self::$s_Routes[PageUtil::$USER_FORGOT_PASSWORD] =   "modules/user/ui/view.forgot_password.php";

 

        //the page not found will redirect to error page
         self::$s_Routes[PageUtil::$ERROR] = "modules/dashboard/ui/view.error.php";

      
    }

    public static function getInstance() {
        if(!self::$s_instance) { // If no instance then make one
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

    public static function get($Page){

        $Page = strtolower(trim($Page)); 

        if(array_key_exists($Page, self::$s_Routes)){
        
            return self::$s_Routes[$Page];
        }
        else{
        
            return self::$s_Routes[PageUtil::$ERROR]; 
        }
    }

}

class MiddlewareUtil{

    private static $s_Routes; //The single instance
    private static $s_instance; //The single instance


    private function __construct(){
        
         self::$s_Routes = array();

        //add which page should be successfully logged before getting to this page
        //example: login.php should be successfully logged in to get to home.php
         self::$s_Routes[PageUtil::$HOME]   =  PageUtil::$LOGIN ;

   
         self::$s_Routes[PageUtil::$USER]   =  PageUtil::$LOGIN ;
         self::$s_Routes[PageUtil::$USER_DETAILS]   =  PageUtil::$LOGIN ;



         self::$s_Routes[PageUtil::$HALL]   =  PageUtil::$LOGIN ;




         self::$s_Routes[PageUtil::$ROLE]   =  PageUtil::$LOGIN ;
         self::$s_Routes[PageUtil::$PERMISSION]   =  PageUtil::$LOGIN ;
         self::$s_Routes[PageUtil::$MEDICAL_P_SEE_DOCTORS_LIST] = PageUtil::$LOGIN;

         self::$s_Routes[PageUtil::$DISCIPLINE]   =  PageUtil::$LOGIN ;
   
    }

    public static function getInstance() {
        if(!self::$s_instance) { // If no instance then make one
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

    private static function isAvailable($Page){

        $Page = strtolower(trim($Page)); 

        //if the page is refereneced in the middleware
        if(array_key_exists($Page, self::$s_Routes)){
            
            return true;
        }
        else{
        
            return false; 
        }
    }

    public static function get($Page){


        //if page is referenced
        if(self::isAvailable($Page)){
            //start session and check whether the middleware is successfully crossed
            // echo "in if";
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // other send initial page: example if logged out then go to login.php page
            return isset($_SESSION[self::$s_Routes[$Page]])? $Page: self::$s_Routes[$Page]; 

        }else{
            // if no middleware then just go on with the current request
            // echo "in else";
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            return $Page;
        }
    }

}

//finding different partse of an url
    function unparse_url($parsed_url) { 
        $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : ''; 
        $host     = isset($parsed_url['host']) ? $parsed_url['host'] : ''; 
        $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : ''; 
        $user     = isset($parsed_url['user']) ? $parsed_url['user'] : ''; 
        $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : ''; 
        $pass     = ($user || $pass) ? "$pass@" : ''; 
        $path     = isset($parsed_url['path']) ? $parsed_url['path'] : ''; 
        $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : ''; 
        $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : ''; 

        //extracting the page name such as user.php from the url
        $page = substr($path, strrpos($path,'/')+1,strrpos($path,'.php')-strrpos($path,'/')+strlen('.php'));

        return $page;
        //return "$scheme$user$pass$host$port$path$query$fragment";     
} 


//applying middleware such as login.php comes before home.php
    function apply_middleware($page) { 
        // echo "apply middleware ".$page."<br>";
        // checking whtether there is any middleware     
        $page=MiddlewareUtil::get($page);   
        // echo "returned ".$page."<br>";
        return $page;
         
    }

//finding different partse of an url
    function apply_routing(&$page) { 
        // echo $page."<br>";
        //looking for the extracted page in the route list
        $page=RouteUtil::get($page);

        // echo $page."<br>";

        return true;
    }




MiddlewareUtil::getInstance();
RouteUtil::getInstance();

?>