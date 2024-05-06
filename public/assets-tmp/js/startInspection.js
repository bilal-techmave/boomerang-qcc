// wizard js
let currentStep = 1;
const totalSteps = 3;

function showStep(step) {
    document.querySelectorAll('.step').forEach((s) => s.style.display = 'none');
    document.getElementById(`step${step}`).style.display = 'block';
}

function updateDropdown() {
    const dropdown = document.getElementById('stepDropdown');
    const dropdownContent = dropdown.querySelector('.dropdown-content');
    dropdownContent.innerHTML = '';
    for (let i = 1; i <= totalSteps; i++) {
        const stepTitle = document.getElementById(`step${i}`).querySelector('h2').textContent;
        const link = document.createElement('a');
        link.href = '#';
        link.textContent = stepTitle;
        link.onclick = function () {
            changeStep(i);
        };
        dropdownContent.appendChild(link);
    }
    dropdown.querySelector('span').innerText = `Page ${currentStep} of ${totalSteps}`;
}

function changeStep(step) {
    currentStep = step;
    showStep(currentStep);
    updateDropdown();
}

function nextStep(step) {
    if (step < totalSteps) {
        currentStep = step + 1;
        showStep(currentStep);
        updateDropdown();
    }
}

function prevStep(step) {
    if (step > 1) {
        currentStep = step - 1;
        showStep(currentStep);
        updateDropdown();
    }
}
showStep(currentStep);
updateDropdown();

// wizard end  -------------------------------------------------------------------------------------




// <!-- show hide fields js  -->
function showNoteForm(sectionId) {
    // Hide other forms if needed
    hideOtherForms(sectionId);
    // Show the note form
    document.getElementById('noteForm_' + sectionId).classList.remove('hidden');
    // Hide the note display
    document.getElementById('noteDisplay_' + sectionId).classList.add('hidden');
    // Reset the textarea and disable the save button
    document.getElementById('noteTextarea_' + sectionId).value = '';
    toggleSaveButton(sectionId);
}

function addMedia(sectionId) {
    // Trigger the click event of the file input to open the file dialog
    document.getElementById('mediaInput_' + sectionId).click();
}

function createAction() {
    // Implement logic for Create Action button here
    console.log('Create Action clicked');
}

function cancelNote(sectionId) {
    // Hide the note form on cancel
    document.getElementById('noteForm_' + sectionId).classList.add('hidden');
    // Clear the textarea
    document.getElementById('noteTextarea_' + sectionId).value = '';
    // Disable the save button
    document.getElementById('saveButton_' + sectionId).disabled = true;
}

function toggleSaveButton(sectionId) {
    
    // Enable the save button if there is text in the textarea, otherwise disable it
    var textarea = document.getElementById('noteTextarea_' + sectionId);
    
    if (textarea) {
        var saveButton = document.getElementById('saveButton_' + sectionId);
        if (saveButton) {
            saveButton.disabled = !textarea.value.trim();
        } else {
            console.error('Save button not found for section ID:', sectionId);
        }
    } else {
        console.error('Textarea element not found for section ID:', sectionId);
    }
}


function saveNote(sectionId) {
    // Get the note text from the textarea
    var noteText = document.getElementById('noteTextarea_' + sectionId).value;
    // Hide the note form
    document.getElementById('noteForm_' + sectionId).classList.add('hidden');
    // Display the note text
    var noteTextDisplay = document.getElementById('noteText_' + sectionId);
    noteTextDisplay.innerHTML = noteText;
    // Show the note display
    document.getElementById('noteDisplay_' + sectionId).classList.remove('hidden');
}

function displaySelectedImage(sectionId) {
    var mediaInput = document.getElementById('mediaInput_' + sectionId);
    var mediaDisplay = document.getElementById('mediaDisplay_' + sectionId);
    var selectedImageContainer = document.getElementById('selectedImageContainer_' + sectionId);
    var deleteMediaButton = document.getElementById('deleteMedia_' + sectionId);
    // Check if a file is selected
    if (mediaInput.files.length > 0) {
        // Display the selected image
        var reader = new FileReader();
        reader.onload = function (e) {
            selectedImageContainer.innerHTML = '<img src="' + e.target.result + '" alt="Selected Image">';
            // Show the media display and delete button
            mediaDisplay.classList.remove('hidden');
            deleteMediaButton.classList.remove('hidden');
        };
        reader.readAsDataURL(mediaInput.files[0]);
    } else {
        // Hide the media display and delete button if no file is selected
        selectedImageContainer.innerHTML = '';
        mediaDisplay.classList.add('hidden');
        deleteMediaButton.classList.add('hidden');
    }
}

function deleteMedia(sectionId) {
    // Clear the media input and display
    document.getElementById('mediaInput_' + sectionId).value = '';
    document.getElementById('selectedImageContainer_' + sectionId).innerHTML = '';
    // Hide the media display and delete button
    document.getElementById('mediaDisplay_' + sectionId).classList.add('hidden');
    document.getElementById('deleteMedia_' + sectionId).classList.add('hidden');
}

function editNote(sectionId) {
    // Hide the note display
    document.getElementById('noteDisplay_' + sectionId).classList.add('hidden');
    // Show the note form
    document.getElementById('noteForm_' + sectionId).classList.remove('hidden');
    // Populate the textarea with the existing note text
    var noteText = document.getElementById('noteText_' + sectionId).innerHTML;
    document.getElementById('noteTextarea_' + sectionId).value = noteText;
    // Enable the save button
    document.getElementById('saveButton_' + sectionId).disabled = false;
}
// Helper function to hide other forms
function hideOtherForms(sectionId) {
    // Hide the note form
    document.getElementById('noteForm_' + sectionId).classList.add('hidden');
    // Hide the media display
    document.getElementById('mediaDisplay_' + sectionId).classList;
    // Add logic to hide other forms if needed
}
// note form fields hide show end -------------------------------------------------------------------------------------


// edit title and description start -------------------------------------------------------------------------------------
var defaultTitle = "Your Title";
var titleContainer = $('.editable-title');
var titleElement = $('.title');
var editIcon = $('.edit-icon');
// Set the default title
titleElement.text(defaultTitle);
editIcon.click(function () {
    // Get the current title text
    var currentTitle = titleElement.text();
    // If the current title is the default title, clear it for editing
    if (currentTitle === defaultTitle) {
        titleElement.text('');
    }
    titleContainer.addClass('editing_title');
    titleElement.addClass('editing_title');
    titleElement.attr('contenteditable', true);
    titleElement.focus();
    editIcon.hide();
});
// When the title loses focus, check if it's empty and set it to default if needed
titleElement.blur(function () {
    var currentTitle = titleElement.text().trim();
    if (currentTitle === '') {
        titleElement.text(defaultTitle);
    }
    titleContainer.removeClass('editing_title');
    titleElement.removeClass('editing_title');
    titleElement.removeAttr('contenteditable');
    editIcon.show();
});
// Hide edit icon and remove editing classes when clicking outside the title box
$(document).on('click', function (event) {
    if (!$(event.target).closest('.editable-title').length) {
        titleContainer.removeClass('editing_title');
        titleElement.removeClass('editing_title');
        titleElement.removeAttr('contenteditable');
        editIcon.show();
    }
});

// edit title and description end -------------------------------------------------------------------------------------



