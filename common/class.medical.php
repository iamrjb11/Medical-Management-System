<?php 


class Medical{
    private $_ID;
    private $_DoctorEmail;
    private $_PatientEmail;
    private $_Age;
    private $_Sex;
    private $_Password;
    private $_DoctorFirstName;
    private $_DoctorLastName;

    private $_PatientFirstName;
    private $_PatientLastName;

    private $_DoctorDegrees;
    private $_DoctorSpecialist;
    private $_DoctorWorkAddress;
    private $_DoctorTime;
    private $_DoctorDay;
    private $_Date;

    public function setID ( $ID ) {
        $this->_ID = $ID;
    }

    public function getID () {
        return $this->_ID;
    }

    public function setAge ( $Age ) {
        $this->_Age = $Age;
    }

    public function getAge () {
        return $this->_Age;
    }
    public function setSex ( $Sex ) {
        $this->_Sex = $Sex;
    }

    public function getSex () {
        return $this->_Sex;
    }
    public function setDoctorEmail ( $doctorEmail ) {
        $this->_DoctorEmail = $doctorEmail;
    }

    public function getDoctorEmail () {
        return $this->_DoctorEmail;
    }
    public function setPatientEmail ( $PatientEmail ) {
        $this->_PatientEmail = $PatientEmail;
    }

    public function getPatientEmail () {
        return $this->_PatientEmail;
    }
    public function setDoctorFirstName ( $DoctorFirstName ) {
        $this->_DoctorFirstName = $DoctorFirstName;
    }

    public function getDoctorFirstName () {
        return $this->_DoctorFirstName;
    }

    public function setDoctorLastName ( $DoctorLastName ) {
        $this->_DoctorLastName = $DoctorLastName;
    }

    public function getDoctorLastName () {
        return $this->_DoctorLastName;
    }
    public function setPatientFirstName ( $PatientFirstName ) {
        $this->_PatientFirstName = $PatientFirstName;
    }

    public function getPatientFirstName () {
        return $this->_PatientFirstName;
    }

    public function setPatientLastName ( $PatientLastName ) {
        $this->_PatientLastName = $PatientLastName;
    }
    public function getPatientLastName () {
        return $this->_PatientLastName;
    }
    public function setDoctorDegrees ( $DoctorDegrees ) {
        $this->_DoctorDegrees = $DoctorDegrees;
    }

    public function getDoctorDegrees () {
        return $this->_DoctorDegrees;
    }
    public function setDoctorSpecialist ( $DoctorSpecialist ) {
        $this->_DoctorSpecialist = $DoctorSpecialist;
    }

    public function getDoctorSpecialist () {
        return $this->_DoctorSpecialist;
    }
    public function setDoctorWorkAddress ( $DoctorWorkAddress ) {
        $this->_DoctorWorkAddress = $DoctorWorkAddress;
    }

    public function getDoctorWorkAddress () {
        return $this->_DoctorWorkAddress;
    }
    public function setDoctorDayShedule ( $DoctorDay ) {
        $this->_DoctorDay = $DoctorDay;
    }

    public function getDoctorDayShedule () {
        return $this->_DoctorDay;
    }
    public function setDoctorTimeShedule ( $DoctorTime ) {
        $this->_DoctorTime = $DoctorTime;
    }

    public function getDoctorTimeShedule () {
        return $this->_DoctorTime;
    }
    public function setDate($Date){
        $this->_Date=$Date;
    }
    public function getDate(){
        return $this->_Date;
    }
    public function genFileName($pid,$test)
    {
        $filename = $pid.'+'.$test."+"."1";
        $path = __DIR__."/../uploadFiles/";
        $filenameFull = $path.$filename;
        // while(file_exists($filenameFull))
        // {
        //     $tokens = explode("+",$filename);
        //     $number = $tokens[2];
        //     $number = (int)$number + 1;
        //     $filename =$tokens[0]."+".$tokens[1]."+".$number;
        // }
        $ret = array();
        $ret[] = $path.$filename; 
        $ret[] = $filename; 
        return $ret;
    }
    public function getFileLink($pid,$test)
    {
        $filename = $pid.'+'.$test."+"."1";
        $path = __DIR__."/../uploadFiles/";
        $filenameFull = $path.$filename;
        if(file_exists($filenameFull))
        {
            return $filenameFull;
        }
        return "Not Included";
        
    }
}

class SerialList{
    private $_DoctorID;
    private $_PatientID;
    private $_DayShedule;
    private $_Date;

    public function setDoctorID ( $DoctorID ) {
        $this->_DoctorID = $DoctorID;
    }

    public function getDoctorID () {
        return $this->_DoctorID;
    }
    public function setPatientID ( $PatientID ) {
        $this->_PatientID = $PatientID;
    }

    public function getPatientID () {
        return $this->_PatientID;
    }

    public function setDayShedule ( $DayShedule ) {
        $this->_DayShedule = $DayShedule;
    }

    public function getDayShedule () {
        return $this->_DayShedule;
    }

    public function setDate ( $Date ) {
        $this->_Date = $Date;
    }

    public function getDate () {
        return $this->_Date;
    }



}
class Prescription{
    private $_PrescriptionID;
    private $_DoctorID;
    private $_PatientID;
    private $_NurseID;
    private $_MedicineName;
    private $_BeforeEatMorning;
    private $_AfterEatMorning;
    private $_BeforeEatDupur;
    private $_AfterEatDupur;
    private $_BeforeEatNight;
    private $_AfterEatNight;
    private $_Quantity;
    private $_GivenQuantity;
    private $_Day;
    private $_Date;

    private $_TestName;
    private $_FileName;
    private $_ReportLink;
    private $_SrlNo;

    public function setPrescriptionID ( $PrescriptionID ) {
        $this->_PrescriptionID = $PrescriptionID;
    }

    public function getPrescriptionID () {
        return $this->_PrescriptionID;
    }
    
    public function setDoctorID ( $DoctorID ) {
        $this->_DoctorID = $DoctorID;
    }

    public function getDoctorID () {
        return $this->_DoctorID;
    }
    public function setPatientID ( $PatientID ) {
        $this->_PatientID = $PatientID;
    }

    public function getPatientID () {
        return $this->_PatientID;
    }
    public function setNurseID ( $NurseID ) {
        $this->_NurseID = $NurseID;
    }

    public function getNurseID () {
        return $this->_NurseID;
    }
    public function setMedicineName ( $MedicineName ) {
        $this->_MedicineName = $MedicineName;
    }

    public function getMedicineName () {
        return $this->_MedicineName;
    }
    public function setBeforeEat ( $BeforeEat ) {
        $this->_BeforeEat = $BeforeEat;
    }

    public function getBeforeEat () {
        return $this->_BeforeEat;
    }
    public function setAfterEat ( $AfterEat ) {
        $this->_AfterEat = $AfterEat;
    }

    public function getAfterEat () {
        return $this->_AfterEat;
    }
   
    public function setQuantity ( $Quantity ) {
        $this->_Quantity = $Quantity;
    }

    public function getQuantity () {
        return $this->_Quantity;
    }
    public function setGivenQuantity ( $GivenQuantity ) {
        $this->_GivenQuantity = $GivenQuantity;
    }

    public function getGivenQuantity () {
        return $this->_GivenQuantity;
    }
    public function setDay ( $Day ) {
        $this->_Day = $Day;
    }

    public function getDay () {
        return $this->_Day;
    }
    public function setDate ( $Date ) {
        $this->_Date = $Date;
    }

    public function getDate () {
        return $this->_Date;
    }

    public function setTestName ( $TestName ) {
        $this->_TestName = $TestName;
    }

    public function getTestName () {
        return $this->_TestName;
    }

    
    public function setFileName ( $FileName ) {
        $this->_FileName = $FileName;
    }
    public function getFileName () {
        return $this->_FileName;
    }
    public function setReportLink ( $ReportLink ) {
        $this->_ReportLink = $ReportLink;
    }
    public function getReportLink () {
        return $this->_ReportLink;
    }

    
    //Akta page a 
    public function setSrlNo ( $srlno ) {
        $this->_SrlNo = $srlno;
    }

    public function getSrlNo () {
        return $this->_SrlNo;
    }
    
}
class MedicinesStock{
    private $_MedicineID;
    private $_MedicineName;
    private $_MedicineStock;

    public function setMedicineID ( $MedicineID ) {
        $this->_MedicineID = $MedicineID;
    }

    public function getMedicineID () {
        return $this->_MedicineID;
    }

    public function setMedicineName ( $MedicineName ) {
        $this->_MedicineName = $MedicineName;
    }

    public function getMedicineName () {
        return $this->_MedicineName;
    }
    public function setMedicineStock ( $MedicineStock ) {
        $this->_MedicineStock = $MedicineStock;
    }

    public function getMedicineStock () {
        return $this->_MedicineStock;
    }
}
function parseDate($date)
{
    $month = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
    $parts = explode($month,"/");
    
}
 ?>
 <?php
echo "<script>console.log("."'"."log:: touch medical.php"."'".");</script>";
?>