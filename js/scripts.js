function showOtherTechStack(select) {
    var otherField = document.getElementById('otherTechStackField');
    if (select.value === 'Other') {
        otherField.style.display = 'block';
    } else {
        otherField.style.display = 'none';
    }
}
