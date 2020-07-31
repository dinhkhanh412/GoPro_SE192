<<<<<<< HEAD
﻿<link rel="stylesheet" href="/GoPro_SE192/assets/css/style.css" />
<?php
include "../controller/testController.php";
class testForm {
    public $ctrl;
    public $listKey=array(0);

    public function __construct() {
        $this->ctrl = new testController($_GET['testID']);
    }
    public function onOpen() {
        $jsonData = $this->ctrl->getInfoOfExam();
        $json = json_decode($jsonData, true);
        $this->listKey=array(0);
        echo "<form id='form'  action='' method='post'>";
            foreach($json['exam'] as $exam) {
                echo "<div class='question'";
                echo  "<h3>Câu".$exam['question']."</h3>
                <h4>".$exam['content']."</h4>
                <input class='answer' type='radio' value ='A' name = '".$exam['question']."'>".' '.$exam['answerA'].
                "<br><input class='answer' type='radio' value ='B' name = '".$exam['question']."'>".' '.$exam['answerB'].
                "<br><input class='answer' type='radio' value ='C' name = '".$exam['question']."'>".' '.$exam['answerC'].
                "<br><input class='answer' type='radio' value ='D' name = '".$exam['question']."'>".' '.$exam['answerD'].
                "</div>";
                $this->listKey[] = $exam['key'];
            }
        echo "<br>";
        echo "
        <div id='submitDiv'>
        <input id='submitBtn' type='submit' name='submit' value='Nộp bài'/>
        </div>";
        echo "</form>";
        echo "
        <div id='clockdivTest'>
            <h3>Thời gian còn lại</h3>
            <div><span class='minutes'></span>
            <div class='smalltext'>Phút</div>
            <span class='seconds'></span>
            <div class='smalltext'>Giây</div>
            </div>
        </div>";

    }
   
}
$viewExam = new testForm();
$viewExam->onOpen();
if (isset($_POST['submit'])) {
    include "resultForm.php";
    
}
?>
<script src="/GoPro_SE192/assets/js/countdownClockTest.js">
        var deadline = new Date(Date.parse(new Date()) + 15*24*60*60*1000);
        initializeClock('clockdiv', deadline);
</script>
=======
﻿<link rel="stylesheet" href="/GoPro_SE192/assets/css/style.css" />
<?php
include "../controller/testController.php";
class testForm {
    public $ctrl;
    public $listKey=array(0);

    public function __construct() {
        $this->ctrl = new testController($_GET['testID']);
    }
    public function onOpen() {
        $jsonData = $this->ctrl->getInfoOfExam();
        $json = json_decode($jsonData, true);
        $this->listKey=array(0);
        echo "<form id='form'  action='' method='post'>";
            foreach($json['exam'] as $exam) {
                echo "<div class='question'";
                echo  "<h3>Câu ".$exam['question']."</h3>
                <h4>".$exam['content']."</h4>";
                echo "<input class='answer' type='radio' value ='A' name ='".$exam['question']."'";
                if (isset($_POST[$exam['question']]) && $_POST[$exam['question']] =='A') echo " checked";
                echo "><p style='display:inline'>".$exam['answerA']."</p>";
                echo "<br>";
                echo "<input class='answer' type='radio' value ='B' name ='".$exam['question']."'";
                if (isset($_POST[$exam['question']]) && $_POST[$exam['question']] =='B') echo " checked";
                echo "><p style='display:inline'>".$exam['answerB']."</p>";
                echo "<br>";
                echo "<input class='answer' type='radio' value ='C' name ='".$exam['question']."'";
                if (isset($_POST[$exam['question']]) && $_POST[$exam['question']] =='C') echo " checked";
                echo "><p style='display:inline'>".$exam['answerC']."</p>";
                echo "<br>";
                echo "<input class='answer' type='radio' value ='D' name ='".$exam['question']."'";
                if (isset($_POST[$exam['question']]) && $_POST[$exam['question']] =='D') echo " checked";
                echo "><p style='display:inline'>".$exam['answerD']."</p>";
                echo "<br>";
                echo "</div>";
                $this->listKey[] = $exam['key'];
            }
        echo "<br>";
        echo "<input id='submitBtn' type='submit' name='submit' value='Nộp bài'>";      
        echo "</form>";     

    }
   
}
$viewExam = new testForm();
$viewExam->onOpen();
if (isset($_POST['submit'])) {
    include "resultForm.php";
}
?>          
>>>>>>> acadb6d1d5b1ae81a61342fa555b4fd2af5f27f4