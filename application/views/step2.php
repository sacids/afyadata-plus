<style>

    /* Style the input fields */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }

</style>



<?php


$form 	= array(
    'meta'	=> array(),
    'data'	=> array(),
    'bind'	=> array(),
    'translations' 	=> array(),
);

$trs 	= array();
$meta	= array(
    'name'			=> 'Sample Name',
    'form_id'		=> 'form_12',
    'description'	=> 'Description of the form',
    'version'		=> '1.1',
    'language'		=> 'en',

);
$form['meta']	= $meta;



$tmp	= array(
    'id'			=> 0,
    'type'			=> 'Group',
    'data_name'		=> 'general',
    'label'			=> 'General',
    'child'			=> array()
);
$tmp_child	= array(
    'id'			=> 1,
    'order'			=> 0,
    'type'			=> 'number',
    'data_name'		=> 'age',
    'label'			=> 'Age',
    'hint'			=> 'Please write your age'
);
$tmp['child'][1]	= $tmp_child;
$trs['sw'][1]['label']	= 'Umri';
$trs['sw'][1]['hint']	= 'Tafadhali andika umri wako';

$tmp_child	= array(
    'id'			=> 7,
    'order'			=> 0,
    'type'			=> 'location',
    'data_name'		=> 'location',
    'label'			=> 'GPS Location',
    'hint'			=> 'Please click to get location'
);
$tmp['child'][7]	= $tmp_child;
$trs['sw'][7]['label']	= 'GPS';
$trs['sw'][7]['hint']	= 'Bonyeza kupata GPS';

$tmp_child	= array(
    'id'			=> 2,
    'order'			=> 0,
    'type'			=> 'text',
    'data_name'		=> 'Name',
    'label'			=> 'Full Name',
    'hint'			=> 'Some Kind of Hint for full name'
);
$tmp['child'][2]	= $tmp_child;
$trs['sw'][2]['label']	= 'Jina Kamili';
$trs['sw'][2]['hint']	= 'Tafadhali andika Jina Kamili';
$form['data'][0]	= $tmp;


$tmp	= array(
    'id'			=> 3,
    'type'			=> 'Group',
    'data_name'		=> 'details',
    'label'			=> 'Details',
    'child'			=> array()
);
$tmp_child	= array(
    'id'			=> 4,
    'order'			=> 0,
    'type'			=> 'select1',
    'data_name'		=> 'sex',
    'label'			=> 'Sex',
    'options'		=> array(
        'M'	=> 'Male',
        'F'	=> 'Female'
    ),
    'hint'			=> 'Some Kind of Hint'
);
$tmp['child'][4]	= $tmp_child;
$trs['sw'][4]['label']	= 'Jinsia';
$trs['sw'][4]['hint']	= 'Tafadhali chagua jinsia';
$trs['sw'][4]['options']['M'] = 'Mwanaume';
$trs['sw'][4]['options']['F'] = 'Mwanamke';

$tmp_child	= array(
    'id'			=> 6,
    'order'			=> 0,
    'type'			=> 'textarea',
    'data_name'		=> 'address',
    'label'			=> 'Address',
    'hint'			=> 'Some Kind of Hint'
);
$tmp['child'][6]	= $tmp_child;
$trs['sw'][6]['label']	= 'Anuani';
$trs['sw'][6]['hint']	= 'Tafadhali andika anuani';

$tmp_child	= array(
    'id'			=> 5,
    'order'			=> 0,
    'type'			=> 'select',
    'data_name'		=> 'symptoms',
    'label'			=> 'Symptoms',
    'options'			=> array(
        'fever'		=> 'Feaver',
        'vomitting'	=> 'Vomitting',
        'skin_rash'	=> 'Skin Rash',
        'dead'		=> 'Dead',
    ),
    'hint'			=> 'Please select all symptoms that apply'
);
$tmp['child'][5]	= $tmp_child;
$trs['sw'][5]['label']	= 'Dalili';
$trs['sw'][5]['hint']	= 'Naomba chagua Dalili zote unazyoziona';
$trs['sw'][5]['options']['fever']	= 'Homa';
$trs['sw'][5]['options']['vomitting']	= 'Kutapika';
$trs['sw'][5]['options']['skin_rash']	= 'Vipele';
$trs['sw'][5]['options']['dead']	= 'kufariki';
$form['data'][3]	= $tmp;




$form['translations'] = $trs;

//echo sizeof($form['data']);
//echo '<pre>'; print_r($form); echo '</pre>';
//return;

echo '<!-- Circles which indicates the steps of the form: -->';
echo '<div style="text-align:center;margin-top:40px;">';
for($i = 0; $i < sizeof($form['data']); $i++){
    echo '<span class="step"></span>';
}
echo '</div>';


echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'" id="'.$form['meta']['form_id'].'">';
iterate_form($form['data'],true);
echo '
		<div style="overflow:auto;">
		  <div style="float:right;">
		    <button type="button" id="prevBtn" onclick="nextPrev(\''.$form['meta']['form_id'].'\',-1)">Previous</button>
		    <button type="button" id="nextBtn" onclick="nextPrev(\''.$form['meta']['form_id'].'\',1)">Next</button>
		  </div>
		</div>';
echo '</form>';



echo '<pre>';print_r($_POST);echo '</pre>';

function iterate_form($branch){

    foreach($branch as $key => $element){

        display_element($element);

    }
}

function display_element($element){

    foreach($element as $key => $value){
        $key 		= ($key == 'data_name' ? 'name' : $key);
        $key 		= ($key == 'datetime' ? 'datetime-local' : $key);
        ${$key} 	= $value;
    }

    $multiple 	= '';

    switch(strtoupper($type)){

        case 'GROUP':
            echo "<div id='$id' class='tab'>$label";
            $branch 	= $element['child'];
            iterate_form($branch);
            echo "</div>";
            break;
        case 'NUMBER':
        case 'TEXT':
        case 'DATE':
        case 'DATETIME-LOCAL':
        case 'COLOR':
        case 'FILE':
        case 'TIME':
        case 'URL':
        case 'EMAIL':
            echo "<div>";
            echo "<label for='$id'>$label</label>";
            echo "<input id='$id' type='$type' name='$name'>";
            echo "</div>";
            break;
        case 'SELECT':
            echo "<div>$label</div>";
            foreach($element['options'] as $k => $v){
                echo "<div><input type='checkbox' name='".$name."[]' value='$k' id='".$name."_".$k."'><label for='".$name."_".$k."'>$v</label></div>";
            }
            break;
        case 'SELECT1':
            echo "<div>";
            echo "<label for='$id'>$label</label>";
            echo "<select id='$id' name='$name' $multiple>";
            foreach($element['options'] as $k => $v){
                echo "<option value='$k'>$v</option>";
            }
            echo "</select>";
            echo "</div>";
            break;
        case 'TEXTAREA':
            echo "<div>";
            echo "<label for='$id'>$label</label>";
            echo "<textarea id='$id' rows='4' cols'50' name='$name'></textarea>";
            echo "</div>";
            break;
        case 'LOCATION':
            echo "<div>";
            echo "<label for='$id'>$label</label>";
            echo "<div id='$id'></div>";
            echo "<input type='hidden' name='$name' value='' id='hidden_$id'>";
            echo "<button type='button' onclick='showPosition($id);'>$label</button>";
            echo "</div>";
            break;
    }

}



//echo '<pre>'; print_r($form); echo '</pre>';

?>

<script>

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(form_id,n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById(form_id).submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }

    function showPosition(id) {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                document.getElementById(id).innerHTML = positionInfo;
                document.getElementById("hidden_"+id).value = position.coords.latitude + ", " + position.coords.longitude + ", " + position.coords.accuracy;
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }

</script>


