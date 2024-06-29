
var selectedValues = []; // Array to store selected values

var selectBox = document.getElementById('currently_registered');
    var inputBox = document.getElementById('curent_university');
    var selectedValues = []; // Array to store selected values
    selectBox.addEventListener('change', function() {
      if (selectBox.value === "1") {
          //inputBox.readOnly = false;
          inputBox.style.display="block";
      } else {
          //inputBox.readOnly = true;
          inputBox.style.display="none";
      }
});


function toggleOptions(deciderNumber) {
    var deciderSelect = document.getElementById('Decider' + deciderNumber + '_NMU');
    var selectedValue = deciderSelect.value;

    // Store the selected value in the array
    selectedValues[deciderNumber - 1] = selectedValue;

    // Loop through all select boxes
    for (var i = 1; i <= 5; i++) {
        var otherSelectBox = document.getElementById('Decider' + i + '_NMU');

        if (!deciderSelect || !otherSelectBox) {
            return;
        }

        var otherOptions = otherSelectBox.options;

        // Loop through the options and hide/show based on the selected value in the current select box
        for (var j = 1; j < otherOptions.length; j++) {
            var optionValue = otherOptions[j].value;

            if (selectedValues.includes(optionValue)) {
                otherOptions[j].style.display = 'none';
            } else {
                otherOptions[j].style.display = 'block';
            }
        }
    }

}




  function moveToNext(currentDivId) {
    var currentDiv = document.getElementById(currentDivId);
    currentDiv.style.display = 'none';

    var nextDivId = getNextDivId(currentDivId);
    var nextDiv = document.getElementById(nextDivId);
    nextDiv.style.display = 'block';
  }

  function getNextDivId(currentDivId) {
    var divIndex = parseInt(currentDivId.replace('main', ''));
    var nextDivIndex = (divIndex % 4) + 1;
    return 'main' + nextDivIndex;
  }


  // Function to show/hide Division options based on High School selection
function updateDivisionOptions() {
    var highSchoolSelect = document.getElementsByName("high_school")[0];
    var divisionSelect = document.getElementsByName("Division")[0];
    var highSchoolValue = highSchoolSelect.value;

    if (highSchoolValue === "1") { // If High School is الثانوية العامة
        divisionSelect.querySelectorAll("option").forEach(function(option) {
            var value = option.getAttribute("value");
            if (value === "1" || value === "2" || value === "4") {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    } else if (highSchoolValue === "2") { // If High School is الثانوية الازهرية
        divisionSelect.querySelectorAll("option").forEach(function(option) {
            var value = option.getAttribute("value");
            if (value === "3" || value === "4") {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    } else if (highSchoolValue === "3") { // If High School is الثانوية الازهرية
            divisionSelect.querySelectorAll("option").forEach(function(option) {
                var value = option.getAttribute("value");
                if (value === "3") {
                    option.style.display = "block";
                } else {
                    option.style.display = "none";
                }
            });}
    else {
        // Reset Division options if High School is not الثانوية العامة or الثانوية الازهرية
        divisionSelect.querySelectorAll("option").forEach(function(option) {
            option.style.display = "none";
        });
    }
}

// Attach event listener to High School select box
document.getElementsByName("high_school")[0].addEventListener("change", updateDivisionOptions);

// Initially hide Division options if High School is not الثانوية العامة or الثانوية الازهرية
updateDivisionOptions();
