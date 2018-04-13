CREATE TABLE `Company` (
    `cname` VARCHAR(45) NOT NULL,
    `ckey` VARCHAR(45) NOT NULL,
    `cemail` VARCHAR(10) NOT NULL,
    `clocation` VARCHAR(45) NOT NULL,
    `cphone` VARCHAR(12) NOT NULL,
    `cindusty` VARCHAR(45) NULL,
    `cdescription` VARCHAR(200) NULL,
    PRIMARY KEY (`cname`)
);

CREATE TABLE `Student` (
    `semail` VARCHAR(20) NOT NULL,
    `skey` VARCHAR(16) NOT NULL,
    `sphone` VARCHAR(12) NOT NULL,
    `sfirstname` VARCHAR(20) NOT NULL,
    `slastname` VARCHAR(20) NOT NULL,
    `suniversity` VARCHAR(40)  NULL,
    `smajor` VARCHAR(5)  NULL,
    `sgpa` VARCHAR(5)  NULL,
    `sresume` VARCHAR(40)  NULL,
    PRIMARY KEY (`semail`)
);

CREATE TABLE `JobAnnouncement` (
    `jid` VARCHAR(10) NOT NULL,
    `jlocation` VARCHAR(45) NULL,
    `jtitle` VARCHAR(45) NULL,
    `jsalary` VARCHAR(45) NULL,
    `jreq_diploma` VARCHAR(45) NULL,
    `jreq_experience` VARCHAR(45) NULL,
    `jreq_skills` VARCHAR(90) NULL,
    `jdescription` VARCHAR(200),
    PRIMARY KEY (`jid`)
);

CREATE TABLE `CompanyPostJob` (
    `cname` VARCHAR(45) NOT NULL,
    `jid` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`cname`,`jid`),
    FOREIGN KEY (`cname`)
        REFERENCES `Company`(`cname`),
    FOREIGN KEY (`jid`)
        REFERENCES `JobAnnouncement`(`jid`)   
);

CREATE TABLE `StudentFollowCompany` (
    `semail` VARCHAR(20) NOT NULL,
    `cname` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`semail`,`cname`),
    FOREIGN key (`semail`)
    	REFERENCES `Student` (`semail`),
    FOREIGN KEY (`cname`)
        REFERENCES `Company`(`cname`)
);


CREATE TABLE `StudentApplyJob` (
    `semail` VARCHAR(20) NOT NULL,
    `jid` VARCHAR(10) NOT NULL,
    `cname` VARCHAR(45) NOT NULL,
    `status` VARCHAR(10) NULL,
    PRIMARY KEY (`semail`,`jid`,`cname`),
    FOREIGN key (`semail`)
        REFERENCES `Student` (`semail`),
    FOREIGN KEY (`cname`)
        REFERENCES `Company`(`cname`),
    FOREIGN KEY (`jid`)
        REFERENCES `JobAnnouncement`(`jid`)
);

CREATE TABLE `StudentFriends` (
    `semailsend` VARCHAR(20) NOT NULL,
    `semailreceive` VARCHAR(20) NOT NULL,
    `status` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`semailsend`,`semailreceive`),
    FOREIGN key (`semailsend`)
        REFERENCES `Student` (`semail`),
    FOREIGN key (`semailreceive`)
        REFERENCES `Student` (`semail`)
);

CREATE TABLE `Notification` (
    `companysend` VARCHAR(45) NOT NULL,
    `semailsend` VARCHAR(20) NOT NULL,
    `semailreceive` VARCHAR(20) NOT NULL,
    `jid` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`companysend`,`semailsend`,`semailreceive`,`jid`),
    FOREIGN key (`companysend`)
        REFERENCES `Company` (`cname`),
    FOREIGN key (`semailsend`,`semailreceive`)
        REFERENCES `Student` (`semail`),
    FOREIGN KEY (`jid`)
        REFERENCES `JobAnnouncement`(`jid`)
);

CREATE TABLE `Message` (
    `semailsend` VARCHAR(20) NOT NULL,
    `semailreceive` VARCHAR(20) NOT NULL,
    `content` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`semailsend`, `semailreceive`)
    FOREIGN KEY (`semailsend`, `semailreceive`)
        REFERENCES `Student` (`semail`)
);

