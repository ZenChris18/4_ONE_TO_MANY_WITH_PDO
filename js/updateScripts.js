function showOtherTechStack(select) {
    var otherField = document.getElementById('otherTechStackField');
    if (select.value === 'Other') {
        otherField.style.display = 'block';
    } else {
        otherField.style.display = 'none';
    }
}

window.onload = function() {
    if (document.getElementById('TechStack').value === 'Other') {
        document.getElementById('otherTechStackField').style.display = 'block';
    } else {
        document.getElementById('otherTechStackField').style.display = 'none';
    }
};
