CREATE TABLE `Company` (
    `cid` VARCHAR(10) NOT NULL,
    `cname` VARCHAR(45) NOT NULL,
    `clocation` VARCHAR(45) NOT NULL,
    `cphone` VARCHAR(12) NOT NULL,
    `cindusty` VARCHAR(45) NULL,
    `cdescription` VARCHAR(200) NULL,
    PRIMARY KEY (`cid`)
);

CREATE TABLE `Student` (
    `sid` VARCHAR(10) NOT NULL,
    `skey` VARCHAR(16) NOT NULL,
    `sphone` VARCHAR(12) NOT NULL,
    `sfirstname` VARCHAR(20) NOT NULL,
    `slastname` VARCHAR(20) NOT NULL,
    `semail` VARCHAR(40)  NULL,
    `suniv` VARCHAR(40)  NULL,
    `smajor` VARCHAR(5)  NULL,
    `sgpa` VARCHAR(5)  NULL,
    `sresume` VARCHAR(40)  NULL,
    PRIMARY KEY (`sid`)
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
    `cid` VARCHAR(10) NOT NULL,
    `jid` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`cid`,`jid`),
    FOREIGN KEY (`cid`)
        REFERENCES `Company`(`cid`),
    FOREIGN KEY (`jid`)
        REFERENCES `JobAnnouncement`(`jid`)   
);

CREATE TABLE `StudentFollowCompany` (
    `sid` VARCHAR(10) NOT NULL,
    `cid` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`sid`,`cid`),
    FOREIGN key (`sid`)
    	REFERENCES `Student` (`sid`),
    FOREIGN KEY (`cid`)
        REFERENCES `Company`(`cid`)
);


CREATE TABLE `StudentApplyJob` (
    `sid` VARCHAR(10) NOT NULL,
    `jid` VARCHAR(10) NOT NULL,
    `cid` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`sid`,`jid`,`cid`),
    FOREIGN key (`sid`)
        REFERENCES `Student` (`sid`),
    FOREIGN KEY (`cid`)
        REFERENCES `Company`(`cid`),
    FOREIGN KEY (`jid`)
        REFERENCES `JobAnnouncement`(`jid`)
);

CREATE TABLE `StudentFriends` (
    `sidsend` VARCHAR(10) NOT NULL,
    `sidreceive` VARCHAR(10) NOT NULL,
    `status` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`sidsend`,`sidreceive`),
    FOREIGN key (`sidsend`)
        REFERENCES `Student` (`sid`),
    FOREIGN key (`sidreceive`)
        REFERENCES `Student` (`sid`)
);



