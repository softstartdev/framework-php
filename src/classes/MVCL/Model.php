<?php

namespace MxSoftstart\FrameworkPhp\classes\MVCL;

abstract class Model {
    
    private	$code	= "";
    private	$name	= "";
    private	$module = "";
    
    public function __construct() {
        /*
        if(getDatabaseName() == "" || getDatabaseUser() == ""){
            echo "BD_HOST o BD_NAME o BD_USER o BD_PASSWORD no estan definidos.";
            exit();
        }
        */
    }
    
    //getters ---------------
    
    public function getCode() {
        return $this->code;
    }
    
    public function setCode($code) {
        $this->code = $code;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getModule() {
        return $this->module;
    }
    
    public function setModule($module) {
        $this->module = $module;
    }
    
    /*
        public function getOnlyUserDatas($params) {
    
            $datas = array();
            $datas["appProfiles_Id"]             = $params['appProfiles_Id'];
            $datas["appUsers_NameFirst"]         = $params['appUsers_NameFirst'];
            $datas["appUsers_NameLast"]          = $params['appUsers_NameLast'];
            $datas["appUsers_Workstation"]       = $params['appUsers_Workstation'];
            $datas["appUsers_Code"]              = $params['appUsers_Code'];
            $datas["appUsers_User"]              = $params['appUsers_User'];
            if (isset($params['appUsers_Password'])) {
                $datas['appUsers_Password'] = md5($params['appUsers_Password']);
            }
            $datas["appUsers_Email"]             = $params['appUsers_Email'];
            $datas["appUsers_TelephoneWork"]     = $params['appUsers_TelephoneWork'];
            $datas["appUsers_TelephonePersonal"] = $params['appUsers_TelephonePersonal'];
            $datas["appUsers_TelephoneHome"]     = $params['appUsers_TelephoneHome'];
            $datas["appUsers_Address"]           = $params['appUsers_Address'];
            //$datas["appUsers_IsActive"]      = $params['appUsers_IsActive'];
            $datas["appUsers_IsDeleted"]     = $params['appUsers_IsDeleted'];
            $datas["appUsers_Id_Added"]      = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]     = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]    = $params['appUsers_Id_Deleted'];
            $datas["appUsers_DateAdded"]     = $params['appUsers_DateAdded'];
            $datas["appUsers_DateEdited"]    = $params['appUsers_DateEdited'];
            $datas["appUsers_DateDeleted"]   = $params['appUsers_DateDeleted'];
    
            return $datas;
        }
        
        public function getOnlyProfileDatas($params) {
            
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empAdministrators_IsActive"]    = $params['empAdministrators_IsActive'];
            //$datas["appProfiles_IsActive"]        = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empAdministrators_DateAdded"]   = $params['empAdministrators_DateAdded'];
            $datas["empAdministrators_DateEdited"]  = $params['empAdministrators_DateEdited'];
            $datas["empAdministrators_DateDeleted"] = $params['empAdministrators_DateDeleted'];
            
            return $datas;
        }

        public function getOnlyProfileDatasCapturists($params) {
            
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empCapturists_IsActive"]        = $params['empCapturists_IsActive'];
            //$datas["appProfiles_IsActive"]          = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empCapturists_DateAdded"]       = $params['empCapturists_DateAdded'];
            $datas["empCapturists_DateEdited"]      = $params['empCapturists_DateEdited'];
            $datas["empCapturists_DateDeleted"]     = $params['empCapturists_DateDeleted'];
            
            return $datas;
        }
        
        public function getOnlyProfileDatasPreauthorizings($params) {
            
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empPreauthorizings_IsActive"]    = $params['empPreauthorizings_IsActive'];
            //$datas["appProfiles_IsActive"]        = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empPreauthorizings_DateAdded"]   = $params['empPreauthorizings_DateAdded'];
            $datas["empPreauthorizings_DateEdited"]  = $params['empPreauthorizings_DateEdited'];
            $datas["empPreauthorizings_DateDeleted"] = $params['empPreauthorizings_sDateDeleted'];
            
            return $datas;
        }
        
        public function getOnlyProfileDatasAuthorizings($params) {
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empAuthorizings_IsActive"]        = $params['empAuthorizings_IsActive'];
            //$datas["appProfiles_IsActive"]          = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empAuthorizings_DateAdded"]       = $params['empAuthorizings_DateAdded'];
            $datas["empAuthorizings_DateEdited"]      = $params['empAuthorizings_DateEdited'];
            $datas["empAuthorizings_DateDeleted"]     = $params['empAuthorizings_DateDeleted'];
            
            return $datas;
        }
        
        public function getOnlyProfileDatasTechnicians($params) {
            
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empTechnicians_IsActive"]    = $params['empTechnicians_IsActive'];
            //$datas["appProfiles_IsActive"]        = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empTechnicians_DateAdded"]   = $params['empTechnicians_DateAdded'];
            $datas["empTechnicians_DateEdited"]  = $params['empTechnicians_DateEdited'];
            $datas["empTechnicians_DateDeleted"] = $params['empTechnicians_DateDeleted'];
            
            return $datas;
        }
        
        public function getOnlyProfileDatasSupervisors($params) {
            
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empSupervisors_IsActive"]    = $params['empSupervisors_IsActive'];
            //$datas["appProfiles_IsActive"]        = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empSupervisors_DateAdded"]   = $params['empSupervisors_DateAdded'];
            $datas["empSupervisors_DateEdited"]  = $params['empSupervisors_DateEdited'];
            $datas["empSupervisors_DateDeleted"] = $params['empSupervisors_DateDeleted'];
            
            return $datas;
        }
        
        public function getOnlyProfileDatasReviewers($params) {
            
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empReviewers_IsActive"]    = $params['empReviewers_IsActive'];
            //$datas["appProfiles_IsActive"]        = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empReviewers_DateAdded"]   = $params['empReviewers_DateAdded'];
            $datas["empReviewers_DateEdited"]  = $params['empReviewers_DateEdited'];
            $datas["empReviewers_DateDeleted"] = $params['empReviewers_DateDeleted'];
            
            return $datas;
        }
        
        public function getOnlyProfileDatasDirectors($params) {
            
            $datas = array();
            $datas["appUsers_Id"]                   = $params['appUsers_Id'];
            $datas["appBusinesses_Id"]              = $params['appBusinesses_Id'];
            $datas["empDirectors_IsActive"]        = $params['empDirectors_IsActive'];
            //$datas["appProfiles_IsActive"]          = $params['appProfiles_IsActive'];
            //$datas["appProfiles_IsDeleted"]       = $params['appProfiles_IsDeleted'];
            $datas["appUsers_Id_Added"]             = $params['appUsers_Id_Added'];
            $datas["appUsers_Id_Edited"]            = $params['appUsers_Id_Edited'];
            $datas["appUsers_Id_Deleted"]           = $params['appUsers_Id_Deleted'];
            $datas["empDirectors_DateAdded"]       = $params['empDirectors_DateAdded'];
            $datas["empDirectors_DateEdited"]      = $params['empDirectors_DateEdited'];
            $datas["empDirectors_DateDeleted"]     = $params['empDirectors_DateDeleted'];
            
            return $datas;
        }
        
        public function getOnlyProfileDatasAppBusinesses($params) {
            
            $datas = array();
    
            $datas["appBusinesses_Id"]                =  $params["appBusinesses_Id"];
            $datas["appBusinesses_Name"]              =  $params["appBusinesses_Name"];
            $datas["appBusinesses_Code"]              =  $params["appBusinesses_Code"];
            $datas["appBusinessesTypes_Id"]           =  $params["appBusinessesTypes_Id"];
            $datas["appBusinesses_InstitutionalCode"] =  $params["appBusinesses_InstitutionalCode"];
            $datas["appBusinesses_SanitaryLicense"]   =  $params["appBusinesses_SanitaryLicense"];
            $datas["appBusinessesLevels_Id"]          =  $params["appBusinessesLevels_Id"];
            $datas["appBusinessesStatuses_Id"]           =  $params["appBusinessesStatuses_Id"];
            $datas["appBusinesses_Services"]          =  $params["appBusinesses_Services"];
            $datas["appBusinesses_Schedule"]          =  $params["appBusinesses_Schedule"];
            $datas["appBusinesses_ConsultingRooms"]   =  $params["appBusinesses_ConsultingRooms"];
            $datas["appBusinesses_Beds"]              =  $params["appBusinesses_Beds"];
            $datas["appRegions_Id"]                   =  $params["appRegions_Id"];
            $datas["appBusinesses_Address"]           =  $params["appBusinesses_Address"];
            $datas["appBusinesses_Postcode"]          =  $params["appBusinesses_Postcode"];
            $datas["appCities_Id"]                    =  $params["appCities_Id"];
            $datas["appLocations_Id"]                 =  $params["appLocations_Id"];
            $datas["appSettlements_Id"]               =  $params["appSettlements_Id"];
            $datas["appBusinesses_Longitude"]         =  $params["appBusinesses_Longitude"];
            $datas["appBusinesses_Latitude"]          =  $params["appBusinesses_Latitude"];
            $datas["appBusinesses_IsActive"]          =  $params["appBusinesses_IsActive"];
    
            return $datas;
        }
        
        public function getOnlyProfileDatasDefCategories($params) {
            
            $datas = array();
    
            $datas["defCategories_Id"]                =  $params["defCategories_Id"];
            $datas["defCategories_Name"]              =  $params["defCategories_Name"];
            $datas["defCategories_IsActive"]          =  $params["defCategories_IsActive"];
    
            return $datas;
        }
        
        public function  getOnlyProfileDatasDefArticles($params) {
            
            $datas = array();
    
            $datas["defArticles_Id"]                  =  $params["defArticles_Id"];
            $datas["defCategories_Id"]                =  $params["defCategories_Id"];
            $datas["defArticles_Name"]                =  $params["defArticles_Name"];
            $datas["defArticles_IsEMAT"]              =  $params["defArticles_IsEMAT"];
            $datas["defArticles_Code"]                =  $params["defArticles_Code"];
            $datas["defArticles_Description"]         =  $params["defArticles_Description"];
            $datas["defArticles_Comments"]          =  $params["defArticles_Comments"];
            $datas["defArticles_IsActive"]          =  $params["defArticles_IsActive"];
    
            return $datas;
        }
        
        public function  getOnlyProfileDatasPrvCategories($params) {
            
            $datas = array();
    
            $datas["prvCategories_Id"]                  =  $params["prvCategories_Id"];
            $datas["prvCategories_Name"]                =  $params["prvCategories_Name"];
            $datas["prvCategories_IsActive"]          =  $params["prvCategories_IsActive"];
    
            return $datas;
        }
        
        public function  getOnlyProfileDatasPrvBusinesses($params) {
            
            $datas = array();
    
            $datas["prvBusinesses_Id"]                  =  $params["prvBusinesses_Id"];
            $datas["prvCategories_Id"]                  =  $params["prvCategories_Id"];
            $datas["prvBusinesses_Name"]                =  $params["prvBusinesses_Name"];
            //$datas["prvBusinesses_IsEMAT"]              =  $params["prvBusinesses_IsEMAT"];
            $datas["prvBusinesses_Code"]                =  $params["prvBusinesses_Code"];
            $datas["prvBusinesses_Telephones"]         =  $params["prvBusinesses_Telephones"];
            $datas["prvBusinesses_Addresses"]         =  $params["prvBusinesses_Addresses"];
            $datas["prvBusinesses_Emails"]            =  $params["prvBusinesses_Emails"];
            $datas["prvBusinesses_IsActive"]            =  $params["prvBusinesses_IsActive"];
    
            return $datas;
        }
        
        public function  getOnlyProfileDatasPrvContacts($params) {
            
            $datas = array();
    
            $datas["prvContacts_Id"]                  =  $params["prvContacts_Id"];
            $datas["prvBusinesses_Id"]                =  $params["prvBusinesses_Id"];
            $datas["prvContacts_NameFirst"]           =  $params["prvContacts_NameFirst"];
            $datas["prvContacts_NameLast"]            =  $params["prvContacts_NameLast"];
            $datas["prvContacts_Workstation"]         =  $params["prvContacts_Workstation"];
            //$datas["prvContacts_IsEMAT"]             =  $params["prvContacts_IsEMAT"];
            $datas["prvContacts_Code"]                =  $params["prvContacts_Code"];
            $datas["prvContacts_Email"]               =  $params["prvContacts_Email"];
            $datas["prvContacts_TelephoneWork"]       =  $params["prvContacts_TelephoneWork"];
            $datas["prvContacts_TelephonePersonal"]   =  $params["prvContacts_TelephonePersonal"];
            $datas["prvContacts_TelephoneHome"]       =  $params["prvContacts_TelephoneHome"];
            $datas["prvContacts_Address"]             =  $params["prvContacts_Address"];
            $datas["prvContacts_IsActive"]            =  $params["prvContacts_IsActive"];
    
            return $datas;
        }
        
        public function  getOnlyProfileDatasDefArticlesPrvBusinesses($params) {
            
            $datas = array();
    
            $datas["defArticles_prvBusinesses_Id"]          =  $params["defArticles_prvBusinesses_Id"];
            $datas["defArticles_Id"]                        =  $params["defArticles_Id"];
            $datas["prvBusinesses_Id"]                      =  $params["prvBusinesses_Id"];
            $datas["defArticles_prvBusinesses_IsActive"]    =  $params["defArticles_prvBusinesses_IsActive"];
            
            return $datas;
        }
        
        public function  getOnlyProfileDatasAppBusinessesAreas($params) {
            
            $datas = array();
    
            $datas["appBusinessesAreas_Id"]                 =  $params["appBusinessesAreas_Id"];
            $datas["appBusinessesAreas_Id_Parent"]          =  $params["appBusinessesAreas_Id_Parent"];
            $datas["appBusinesses_Id"]                      =  $params["appBusinesses_Id"];
            $datas["appBusinessesAreas_Name"]               =  $params["appBusinessesAreas_Name"];
            $datas["appBusinessesAreas_IsActive"]           =  $params["appBusinessesAreas_IsActive"];
            
            return $datas;
        }
        
        public function  getOnlyProfileDatasProArticles($params) {
            
            $datas = array();
    
            $datas["proArticles_Id"]               = $params["proArticles_Id"];
            $datas["appBusinesses_Id"]             = $params["appBusinesses_Id"];
            //  $datas["_sClueNacional"]               = $params["_sClueNacional"];
            $datas["appBusinessesAreas_Id"]        = $params["appBusinessesAreas_Id"];
            $datas["defCategories_Id"]             = $params["defCategories_Id"];
            $datas["defCategories_Name"]           = $params["defCategories_Name"];
            // $datas["_sEquipo"]                     = $params["_sEquipo"];
            $datas["defArticles_Id"]               = $params["defArticles_Id"];
            $datas["defArticles_Name"]             = $params["defArticles_Name"];
            $datas["defArticles_Code"]             = $params["defArticles_Code"];
            $datas["defArticles_Description"]      = $params["defArticles_Description"];
            $datas["defArticles_Comments"]         = $params["defArticles_Comments"];
            $datas["proArticles_InventoryNumber"]  = $params["proArticles_InventoryNumber"];
            $datas["proArticles_Factory"]          = $params["proArticles_Factory"];
            $datas["proArticles_Model"]            = $params["proArticles_Model"];
            $datas["proArticles_Serie"]            = $params["proArticles_Serie"];
            $datas["proArticles_FactoryDate"]      = $params["proArticles_FactoryDate"];
            $datas["proArticles_ShoppingDate"]     = $params["proArticles_ShoppingDate"];
            $datas["proArticles_ReceptionDate"]    = $params["proArticles_ReceptionDate"];
            $datas["proArticles_InstallationDate"] = $params["proArticles_InstallationDate"];
            $datas["proArticles_StartDate"]        = $params["proArticles_StartDate"];
            $datas["proArticles_TrainingDate"]     = $params["proArticles_TrainingDate"];
            $datas["proArticles_UpdateDate"]       = $params["proArticles_UpdateDate"];
            //   $datas["_iUnidades"]                   = $params["_iUnidades"];
            $datas["prvBusinesses_Id"]             = $params["prvBusinesses_Id"];
            $datas["prvBusinesses_Name"]           = $params["prvBusinesses_Name"];
            //    $datas["_sContactoProveedor"]          = $params["_sContactoProveedor"];
            $datas["proArticles_Price"]            = $params["proArticles_Price"];
            $datas["proArticles_PaymentSource"]    = $params["proArticles_PaymentSource"];
            $datas["proArticles_WarrantyYears"]    = $params["proArticles_WarrantyYears"];
            $datas["proArticles_FunctionValue"]    = $params["proArticles_FunctionValue"];
            $datas["proArticles_RiskValue"]        = $params["proArticles_RiskValue"];
            $datas["proArticles_RequirementValue"] = $params["proArticles_RequirementValue"];
            $datas["proArticles_BackgroundValue"]  = $params["proArticles_BackgroundValue"];
            $datas["proArticles_OperableLevel"]    = $params["proArticles_OperableLevel"];
            $datas["proArticles_Comments"]         = $params["proArticles_Comments"];
            $datas["proArticles_IsActive"]         = $params["proArticles_IsActive"];
            //    $datas["_sEstatus"]                    = $params["_sEstatus"];
            $datas["proArticles_IsDeleted"]        = $params["proArticles_IsDeleted"];
            $datas["appUsers_Id_Added"]            = $params["appUsers_Id_Added"];
            //   $datas["_sUsuario"]                    = $params["_sUsuario"];
            $datas["appUsers_Id_Edited"]           = $params["appUsers_Id_Edited"];
            $datas["appUsers_Id_Deleted"]          = $params["appUsers_Id_Deleted"];
            $datas["proArticles_DateAdded"]        = $params["proArticles_DateAdded"];
            $datas["proArticles_DateEdited"]       = $params["proArticles_DateEdited"];
            $datas["proArticles_DateDeleted"]      = $params["proArticles_DateDeleted"];
            //$datas["_sUbicacion"]                  = $params["_sUbicacion"];
            //$datas["_sSubUbicacion"]               = $params["_sSubUbicacion"];
            //$datas["iMantenimiento"]               = $params["iMantenimiento"];
            //$datas["_iTiguedad"]                   = $params["_iTiguedad"];
            //$datas["_iECRI"]                       = $params["_iECRI"];
            //$datas["_sObservaciones"]              = $params["_sObservaciones"];
            //$datas["_sObserUbicacion"]             = $params["_sObserUbicacion"];
            //$datas["_sObserCondiciones"]           = $params["_sObserCondiciones"];
            //$datas["_sGarantiaVigente"]            = $params["_sGarantiaVigente"];  
            return $datas;
        }
        
        public function notGetAppUsers($params) {

            $appUsers = array();
            unset($params['fields']['appProfiles_Id']);
            unset($params['fields']['appUsers_NameFirst']);
            unset($params['fields']['appUsers_NameLast']);
            unset($params['fields']['appUsers_Workstation']);
            unset($params['fields']['appUsers_Code']);
            unset($params['fields']['appUsers_User']);
            unset($params['fields']['appUsers_Password']);
            unset($params['fields']['appUsers_Email']);
            unset($params['fields']['appUsers_TelephoneWork']);
            unset($params['fields']['appUsers_TelephonePersonal']);
            unset($params['fields']['appUsers_TelephoneHome']);
            unset($params['fields']['appUsers_Address']);
            unset($params['fields']['appUsers_IsActive']);
            unset($params['fields']['appUsers_IsDeleted']);
            unset($params['fields']['appUsers_Id_Added']);
            unset($params['fields']['appUsers_Id_Edited']);
            unset($params['fields']['appUsers_Id_Deleted']);
            unset($params['fields']['appUsers_DateAdded']);
            unset($params['fields']['appUsers_DateEdited']);
            unset($params['fields']['appUsers_DateDeleted']);
            
            return $params;
        }
    */
    
}

?>