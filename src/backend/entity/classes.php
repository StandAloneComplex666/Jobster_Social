<?php
class job_info{
	public $jid;
	public $jtitle;
	public $jsalary;
	public $jreq_diploma;
	public $jreq_experience;
	public $jreq_skills;
	public $jlocation;
	public $jdescription;
	function Build_Job_Info($row)
	{
    $jobInfo = new job_info();
    $jobInfo->jid = $row['jid'];
    $jobInfo->jtitle = $row['jtitle'];
    $jobInfo->jsalary = $row['jsalary'];
    $jobInfo->jreq_diploma = $row['jreq_diploma'];
    $jobInfo->jreq_skills = $row['jreq_skills'];
    $jobInfo->jreq_experience = $row['jreq_experience'];
    $jobInfo->jdescription = $row['jdescription'];
    $jobInfo->jlocation = $row['jlocation'];
    return $jobInfo;
	}
}

class personal_info{
    public $semail;
    public $skey;
    public $sphone;
    public $sfirstname;
    public $slastname;
    public $suniversity;
    public $smajor;
    public $sgpa;
    public $sresume;
    function Build_personal_Info($row)
    {
        $personalInfo = new personal_info();
        $personalInfo->semail = $row['semail'];
        $personalInfo->skey = $row['skey'];
        $personalInfo->sphone = $row['sphone'];
        $personalInfo->sfirstname = $row['sfirstname'];
        $personalInfo->slastname = $row['slastname'];
        $personalInfo->suniversity = $row['suniversity'];
        $personalInfo->smajor = $row['smajor'];
        $personalInfo->sgpa = $row['sgpa'];
        $personalInfo->sresume = $row['sresume'];
        return $personalInfo;
    }
}

class company_info{
    public $cname;
    public $ckey;
    public $cphone;
    public $cemail;
    public $cindustry;
    public $clocation;
    public $cdescription;
    function Build_Company_Info($row)
    {
        $companyInfo = new company_info();
        $companyInfo->ceamil = $row['cemail'];
        $companyInfo->ckey = $row['ckey'];
        $companyInfo->cphone = $row['cphone'];
        $companyInfo->cname = $row['cname'];
        $companyInfo->cindustry = $row['cindustry'];
        $companyInfo->clocation = $row['clocation'];
        $companyInfo->cdescription = $row['cdescription'];
        return $companyInfo;
    }
}



class notification_info
{
    public $nid;
    public $companysend;
    public $semailsend;
    public $semailreceive;
    public $jid;
    public $pushtime;
    public $status;
    function Build_Notification_Info($row)
    {
        $notificationInfo = new notification_info();
        $notificationInfo ->nid = $row['nid'];
        $notificationInfo ->companysend = $row['companysend'];
        $notificationInfo ->semailsend = $row['semailsend'];
        $notificationInfo ->semailreceive = $row['semailreceive'];
        $notificationInfo ->jid = $row['jid'];
        $notificationInfo ->pushtime = $row['pushtime'];
        $notificationInfo ->status = $row['status'];
        return $notificationInfo;
    }
}



class friend{
    public $semailsend;
    public $semailreceive;
    public $status;
    public $sendtime;
}

function Build_friend_request_Info($row){
    $friendRequestInfo = new friend();
    $friendRequestInfo->semailsend = $row['semailsend'];
    $friendRequestInfo->semailreceive = $row['semailreceive'];
    $friendRequestInfo->status = $row['status'];
    $friendRequestInfo->sendtime =$row['sendtime'];
    return $friendRequestInfo;
}

?>