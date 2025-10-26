<?php
 include('includes/header.php');
 include('includes/navbar.php');
 include('connection.php');

 $select = "SELECT * FROM state_name";
 $query = mysqli_query($conn, $select);


 $sql = "SELECT id, marquee_name, post_url FROM marquee_data";
 $result = $conn->query($sql);
 $marqueeData = null;
 
 // Check if there are results
 if ($result->num_rows > 0) {
     // Initialize an array to store marquee data
     $marqueeData = array();
 
     // Fetch each row and store it in the array
     while ($row = $result->fetch_assoc()) {
         $marqueeData[] = $row;
     }
 }

 $sql2 = "SELECT id, headline, headline_url FROM headline_data";
 $result2 = $conn->query($sql2);
 
 // Check if there are results
 if ($result2->num_rows > 0) {
     // Initialize an array to store marquee data
     $headlineData = array();
 
     // Fetch each row and store it in the array
     while ($row2 = $result2->fetch_assoc()) {
         $headlineData[] = $row2;
     }
 }

 ?>

<div class="container main-section">
    <p class="heading-part text-center my-3">Think Govt Jobs: ThinkGovtJobs.Com Sarkari Naukri Sarkari Jobs Latest Jobs
        Online Form at Think Govt Jobs 2023</p>
    <p class="heading-part-2 text-center">Welcome to India's No 1 Education Portal Sarkari Result</p>
    <div align="center" class="fl-html">
        <div id="marquee0" align="center">
            <a href="https://play.google.com/store/apps/details?id=com.app.app14f269771c01" target="_blank"><b>
                    <font size="4">Sarkari Result Android Apps</font>
                </b></a> <span> || </span>
            <a href="https://www.youtube.com/c/SarkariResultOfficial" target="_blank"><b>
                    <font size="4">Sarkari Result Youtube Channel</font>
                </b></a> <span> || </span> <a
                href="https://itunes.apple.com/us/app/sarkari-result/id1051363935?ls=1&amp;mt=8" target="_blank"><b>
                    <font size="4">Sarkari Result Apple / IOS Apps</font>
                </b></a> <span> || </span> <a href="https://www.instagram.com/sarkariresult.comofficial/"
                target="_blank"><b>
                    <font size="4">Follow Instagram</font>
                </b></a>
        </div>
        <div id="marquee1" align="center">
            <marquee behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();"><a
                    href="<?= $marqueeData[0]['post_url'] ?? '' ?>" target="_blank"><b>
                        <font size="4" style="color: #0000A0;"><?= $marqueeData[0]['marquee_name'] ?? '' ?></font>
                    </b></a> <span> || </span> <a href="<?= $marqueeData[1]['post_url'] ?? '' ?>"
                    target="_blank"><b>
                        <font size="4" style="color: #0fa208;"><?= $marqueeData[1]['marquee_name'] ?? '' ?></font>
                    </b></a> <span> || </span> <a href="<?= $marqueeData[2]['post_url'] ?? '' ?>"
                    target="_blank"><b>
                        <font size="4" style="color: #E517DF;"><?= $marqueeData[2]['marquee_name'] ?? '' ?></font>
                    </b></a></marquee>
        </div>
        <div id="marquee2" align="center">
            <marquee behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();"><a
                    href="<?= $marqueeData[3]['post_url'] ?? '' ?>" target="_blank"><b>
                        <font size="4" style="color:#7916dd;"><?= $marqueeData[3]['marquee_name'] ?? '' ?></font>
                    </b></a> <span> || </span> <a
                    href="<?= $marqueeData[4]['post_url'] ?? '' ?>" target="_blank"><b>
                        <font size="4" style="color: #e2329a;"><?= $marqueeData[4]['marquee_name'] ?? '' ?></font>
                    </b></a> <span> || </span> <a href="<?= $marqueeData[5]['post_url'] ?>"
                    target="_blank"><b>
                        <font size="4" style="color: #b51;"><?= $marqueeData[5]['marquee_name'] ?? '' ?></font>
                    </b></a></marquee>
        </div>
        <div id="marquee3" align="center">
            <marquee behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();"><a
                    href="https://www.sarkariresult.com/bihar/bpsc-school-teacher-26-2023/" target="_blank"><b>
                        <font size="4" style="color: #ff0000;">BPSC School Teacher TRE Result 2023</font>
                    </b></a> <span> || </span> <a href="https://www.sarkariresult.com/upsssc/upsssc-pet-2023/"
                    target="_blank"><b>
                        <font size="4">UPSSSC PET 2023 Admit Card</font>
                    </b></a> <span> || </span> <a href="https://www.sarkariresult.com/2023/uppsc-ro-aro-oct23/"
                    target="_blank"><b>
                        <font size="4" style="color: #099542;">UPPSC RO ARO Online Form 2023</font>
                    </b></a></marquee>
        </div>
    </div>

    <div class="hr-line"></div>
    <div class="elementor-element elementor-element-247c7fff elementor-hidden-mobile elementor-widget elementor-widget-html"
        data-id="247c7fff" data-element_type="widget" data-widget_type="html.default">
        <div class="elementor-widget-container">
            <div style="text-align: center;">
                <a href="https://www.sarkariindiajobs.com/" target="_blank" rel="noopener">
                    <img decoding="async" src="https://www.sarkariindiajobs.com/wp-content/uploads/2023/02/live-2.webp"
                        alt="Live on Sarkari India Jobs" loading="lazy">
                </a>
            </div>
        </div>
    </div>
    <div class="content-part">
        <div class="state-name">
            <ul>
                <?php 
        $stateCount = 0;
        while ($state = mysqli_fetch_assoc($query)) {
            $stateCount++;
    ?>
                <li>
                    <a href="state_related_contentjob?state_name=<?= $state['state_name']?>">
                        <i class="bi bi-geo-alt-fill"></i>
                        <?= $state['state_name']?>
                    </a>
                </li>
                <?php 
            // If 10 states have been displayed, close the current list and start a new one
            echo '</ul><ul>';
            // if ($stateCount % 10 === 0) {
            // }
        }
    ?>
            </ul>

        </div>
    </div>
    <section class="block-sec">
        <div class="container">
            <div class="block-grid">
                <a href="<?= $headlineData[0]['headline_url'] ?>" class="block w-inline-block">
                    <div>
                        RPSC JLO Admit Card 2023
                    </div>
                </a>
                <a href="<?= $marqueeData[1]['post_url'] ?>" class="block _2 w-inline-block">
                    <div>
                        UPPSC APS Online Form 2023
                    </div>
                </a>
                <a href="https://thinkgovtjobs.com/answerkey-allnews?answerkey_id=5" class="block _3 w-inline-block">
                    <div>
                        UPSSSC VDO 2018 Revised Answer Key
                    </div>
                </a>
                <a href="https://thinkgovtjobs.com/admission-allnews?admission_id=4" class="block _4 w-inline-block">
                    <div>
                        UP Scholarship Online Form 2023
                    </div>
                </a>
                <a href="https://thinkgovtjobs.com/latest-job-allnews?latestjob_id=3" class="block _5 w-inline-block">
                    <div>
                        UPPSC APS Online Form 2023
                    </div>
                </a>
                <a href="https://thinkgovtjobs.com/latest-job-allnews?latestjob_id=3" class="block _6 w-inline-block">
                    <div>
                        UPPSC APS Online Form 2023
                    </div>
                </a>
                <a href="https://thinkgovtjobs.com/latest-job-allnews?latestjob_id=3" class="block _7 w-inline-block">
                    <div>
                        UPPSC APS Online Form 2023
                    </div>
                </a>
                <a href="https://thinkgovtjobs.com/latest-job-allnews?latestjob_id=3" class="block _8 w-inline-block">
                    <div>
                        UPPSC APS Online Form 2023
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="links-sec">
        <div class="padding">
            <div class="container">
                <div class="links-grid-wrapper">
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Result</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                            $sql = "SELECT * FROM result_data ORDER BY created_at DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $result_title = $row['result_title'];
                                        $result_id = $row['result_id'];
                                        echo "<ul><li><a class='list_link' target='_blank' href='result-allnews?result_id={$result_id}'>{$result_title}</a></li></ul>";
                                            }
                                    } else {
                                        echo "<p>No results found.</p>";
                                         }
                            ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Admit Card</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                                $sql = "SELECT * FROM admitcard_data ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $admitcard_title = $row['admitcard_title'];
                                        $admitcard_id = $row['admitcard_id'];
                                        echo "<ul><li><a class='list_link' target='_blank' href='admit-card-allnews?admitcard_id={$admitcard_id}'>{$admitcard_title}</a></li></ul>";
                                    }
                                } else {
                                    echo "<p>No results found.</p>";
                                }
                                                ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Latest Job</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                                $sql = "SELECT * FROM latestjob_data ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $latestjob_title = $row['latestjob_title'];
                                        $latestjob_id = $row['latestjob_id'];
                                        echo "<ul><li><a class='list_link' target='_blank' href='latest-job-allnews?latestjob_id={$latestjob_id}'>{$latestjob_title}</a></li></ul>";
                                    }
                                } else {
                                    echo "<p>No results found.</p>";
                                }
                            ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Answer Key</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                                $sql = "SELECT * FROM answerkey_data ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $answerkey_title = $row['answerkey_title'];
                                        $answerkey_id = $row['answerkey_id'];
                                        $limitedTitle = (strlen($answerkey_title) > 20) ? substr($answerkey_title, 0, 20) . '...' : $latestjob_title;
                                        echo "<ul><li><a class='list_link' target='_blank' href='answerkey-allnews?answerkey_id={$answerkey_id}'>{$answerkey_title}</a></li></ul>";
                                    }
                                } else {
                                    echo "<p>No results found.</p>";
                                }
                            ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Syllabus</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                                $sql = "SELECT * FROM syllabus_data ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $syllabus_title = $row['syllabus_title'];
                                        $syllabus_id = $row['syllabus_id'];
                                        echo "<ul><li><a class='list_link' target='_blank' href='syllabus-allnews?syllabus_id={$syllabus_id}'>{$syllabus_title}</a></li></ul>";
                                    }
                                } else {
                                    echo "<p>No results found.</p>";
                                }
                            ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Admission</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
$sql = "SELECT * FROM admission_data ORDER BY created_at DESC";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admissionName = $row['admission_name'];
        $admissionId = $row['admission_name']; // Assuming 'admission_name' is the unique identifier

        // Encode the admission name for URL
        $encodedAdmissionName = urlencode($admissionName);

        echo "<ul><li><a class='list_link' target='_blank' href='admission-allnews?admission_name={$encodedAdmissionName}'>{$admissionName}</a></li></ul>";
    }
} else {
    echo "<p>No results found.</p>";
}
?>
                            <div class="vm-link-wrap">
                                <a href="admission.php" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>New Update</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                                $sql = "SELECT * FROM newupdate_data ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $newupdate_title = $row['newupdate_title'];
                                        $newupdate_id = $row['id'];
                                        echo "<ul><li><a class='list_link' target='_blank' href='newupdate-allnews?newupdate_id={$newupdate_id}'>{$newupdate_title}</a></li></ul>";
                                    }
                                } else {
                                    echo "<p>No results found.</p>";
                                }
                            ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Upcoming Jobs</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                                $sql = "SELECT * FROM upcomingjob_data ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $upcoming_title = $row['upcoming_title'];
                                        $upcoming_id = $row['id'];
                                        echo "<ul><li><a class='list_link' target='_blank' href='upcoming-allnews?admission_id={$upcoming_id}'>{$upcoming_title}</a></li></ul>";
                                    }
                                } else {
                                    echo "<p>No results found.</p>";
                                }
                            ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="links-box">
                        <div class="links-header">
                            <h2>Scholarship</h2>
                        </div>
                        <div class="links-wrap">
                            <?php
                                $sql = "SELECT * FROM scholarship_data ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $scholarship_title = $row['scholarship_title'];
                                        $scholarship_id = $row['id'];
                                        echo "<ul><li><a class='list_link' target='_blank' href='scholarship-allnews?scholarship_id={$scholarship_id}'>{$scholarship_title}</a></li></ul>";
                                    }
                                } else {
                                    echo "<p>No results found.</p>";
                                }
                            ?>
                            <div class="vm-link-wrap">
                                <a href="" class="view-more-link">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="blog-content-section mb-4">
            <div class="container">
                <div class="card" style="padding: 0px;">
                    <div class="card-header text-center text-light">
                        Think Govt Jobs: Indians Get Government Jobs (Sarkari Job) Information
                    </div>
                    <div class="card-body text-center" style="background: antiquewhite;">
                        <p class="h5 para">
                            Everyone Needs Certainty in their lives for a future life and in today's era, we can only
                            get
                            this by getting a good government job.
                            <br>
                            <br>
                            Government jobs give you a good reputation and a secure life future for your family.
                            <br>
                            <br>
                            Are you in search for good Government jobs?
                            <br>
                            <br>
                            Do you also want to remain updated with the notification of government jobs?
                            <br>
                            <br>
                            Do you find trouble in visiting different sites?
                            <br>
                            Do your Parents ask You for easy steps to get updates about exams?
                            <br>
                            <br>
                            Think govt jobs Yes this is the place where You Can easily find all your solutions for
                            Government jobs.
                            <br>
                            <br>
                            Think Govt jobs Gives you the best and easiest or the one-step solution to get modified
                            about
                            your future examination.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content-section mb-4">
            <div class="container">
                <div class="card" style="padding: 0px;">
                    <div class="card-header text-center text-light">
                        Why prefer government jobs?
                    </div>
                    <div class="card-body text-center" style="background: antiquewhite;">
                        <p class="h5 para">
                            When we compare government jobs and Private job government jobs comes in the preferences
                            list
                            the basic reason behind this is that government jobs gives you future security it gives the
                            freedom to enjoy your holiday without bothering about the money.
                            <br>
                            <br>
                            We recently had to face covid pandemic in 2019 which showed us the value of life and money.
                            people had faced financial issues many private employees were removed from their jobs. but
                            as
                            the government people were enjoying their salary by providing their service in online mode.
                            <br><br>
                            Government jobs give you and your family financial Security. If by Worst condition you do
                            Not
                            exit With Your Family And Government Your side Approach financially.

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content-section mb-4">
            <div class="container">
                <div class="card" style="padding: 0px;">
                    <div class="card-header text-center text-light">
                        What Are the various government jobs? Which I Can Get.
                    </div>
                    <div class="card-body text-center" style="background: antiquewhite;">
                        <p class="h5 para">
                            Different states have different government jobs and they are also represented by different
                            abbreviations according to the name of the states Whereas The Central Government has its Own
                            Posts or vacancies. <br>
                            <br>
                            Government jobs can be given to the basically educated Person as many vacancies for the
                            person
                            having the eligibility for Matriculation. It also contains the toughest exam in the country
                            which is the IAS Or the Indian Administrative Service the toughest of all exams and many
                            others
                            You can apply for the State PSC Which is the State Public Service Commission or SSC. Staff
                            Selection Commission or in the Defence ServicesSuch As CDS, NDA, And Many More.
                            <br>
                            <br>
                            Our Website that is Think Govt Jobs gives you a broad description of the Notification One
                            Top on
                            the Job Notification will Display a detailed discussion of the notification and the official
                            website.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content-section mb-4">
            <div class="container">
                <div class="card" style="padding: 0px;">
                    <div class="card-header text-center text-light">
                        How Think Govt Jobs Works?
                    </div>
                    <div class="card-body text-center" style="background: antiquewhite;">
                        <p class="h5 para">
                            Think Govt Jobs Is a website that works for the student preparing for the govt jobs it Helps
                            The
                            Student to remain Updated with the latest government jobs Students don’t need to move from
                            one
                            website to another in search of updates on the job. <br>
                            Think Govt Job Notify You About the Date of the form fillup release of the Admit card And
                            Publish of the result in the easy sequence. <br>
                            <br>
                            It Gives Easy Access to the WhatsApp group so that your parent can also get information
                            about
                            the latest govt jobs.
                            <br>
                            <br>
                            Think Govt Job is only named as they think.
                            <br>
                            But It Does’nt give You a Chance to Think About it.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content-section mb-4">
            <div class="container">
                <div class="card" style="padding: 0px;">
                    <div class="card-header text-center text-light">
                        Why does trust Think Govt Jobs?
                    </div>
                    <div class="card-body text-center" style="background: antiquewhite;">
                        <p class="h5 para">
                            You Don’t Need to Trust without using and Experiencing it as it provides you the free
                            service
                            and we trust you that you Guys are eligible to apply for the Government job And Think Govt
                            jobs
                            wish you all the best for your Government Exam and hope That you Use The Website For Your
                            Result
                            And Come up With A Big Smile.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content-section mb-4">
            <div class="container">
                <div class="card" style="padding: 0px;">
                    <div class="card-header text-center text-light">
                        Why to Prefer ThinkGovtJobs Website Only?
                    </div>
                    <div class="card-body" style="background: antiquewhite;">
                        <p class="h5 para">
                            Yes You Are Right Having Soo many Options then Why Think Govt Jobs Soo Let Me Tell you Why
                            You
                            Should Choose To Think of Govt Jobs.
                        </p>
                        <ul>
                            <li>ThinkGovtJobs gives you easy access.</li>
                            <li>Thinkgovtjobs provides you with WhatsApp and Telegram groups which are managed By
                                professionals.</li>
                            <li>Thinkgovtjobs provides you with a platform where you can easily get all your
                                Notifications.
                            </li>
                            <li>Thinkgovtjobs provided you with one easy-to-access assess in Google.</li>
                            <li>Thinkgovtjobs can be searched in English as well as Hindi language.</li>
                            <li>It never disappoints you with the fake Notification.</li>
                            <li>It saves you from the trap of fraudulent websites.</li>
                        </ul>
                        <br>
                        <p class="h5 para">
                            Top Sarkari job Notification 2023: ThinkGovtJobs.Com Sarkari Jobs Notification,
                            SarkariResult,
                            Sarkari Result Notification, Free Job Alert, Sarkari Result 2023, SakariResul, Sarkari Jobs,
                            Sarkari
                            Exam, Fast Job Searchers, Sarkari Jobs Find, Bharat Result, Latest Job Alert.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content-section mb-4">
            <div class="container">
                <div class="card" style="padding: 0px;">
                    <div class="card-header text-center text-light">
                        Disclaimer
                    </div>
                    <div class="card-body" style="background: antiquewhite;">
                        <p class="h5 para">
                            The Examination Results / Marks published in this Website is only for the immediate
                            Information
                            to the Examinees an does not to be a constitute to be a Legal Document. While all efforts
                            have
                            been made to make the Information available on this Website as Authentic as possible. We are
                            not
                            responsible for any Inadvertent Error that may have crept in the Examination Results / Marks
                            being published in this Website for any loss to anybody or anything caused by any
                            Shortcoming,
                            Defect or Inaccuracy of the Information on this Website. Our effort and intention are to
                            provide
                            correct details as much as possible, before taking any action please look into recruitment
                            notifications or advertisements, or portals. “I Hope You Will Understand Our Word”.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
function adjustScrollAmount() {
    const marquees = document.querySelectorAll('marquee');

    marquees.forEach(marquee => {
        if (window.innerWidth > 991) {
            marquee.setAttribute('scrollamount', '5');
        } else if (window.innerWidth < 767) {
            marquee.setAttribute('scrollamount', '2');
        }
    });
}

// Run on page load
adjustScrollAmount();

// Adjust when the window is resized
window.addEventListener('resize', adjustScrollAmount);
</script>
<?php include('includes/footer.php')?>